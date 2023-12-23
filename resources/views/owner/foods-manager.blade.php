@extends('layouts.base')

@section('title')
Owner page
@endsection

@section('body')
@include('owner.layouts.navigation', ['page'=>'foods'])

<div class="container bg-body">
    @if ($errors->any())
    <div class="alert alert-danger mt-2">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>

<div class="container bg-body">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mt-4 mb-4 float-end me-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Thêm món ăn mới
    </button>
    <a class="btn btn-secondary float-end mt-4 mb-4 me-4" href="/foods_groups">
        Loại món ăn <i class="fa-solid fa-forward"></i>
    </a>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Tên món ăn</span>
                        <input type="text" name="name" class="form-control text-center" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Số tiền</span>
                        <input type="number" name="money" class="form-control text-center" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Loại món ăn</span>
                        <select name="food_group" class="form-select text-center">
                            @foreach($food_groups as $food_group)
                            <option value="{{$food_group->id}}">{{$food_group->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Thêm món ăn mới</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container bg-body">
    <table class="table table-hover">
        <thead>
            <th>Tên món </th>
            <th>Giá</th>
            <th class="text-center">Bật?</th>
            <th>Loại món ăn</th>
            <th style="width:90px"></th>
            <th style="width:90px"></th>
        </thead>
        <tbody>
            @foreach ($foods as $food)
            <tr>
                <td> {{ $food->name }} </td>
                <td> {{ $food->money }} </td>
                <td class="text-center">
                    <input class="form-check-input" type="checkbox" disabled @if ($food->is_active) checked @endif>
                </td>
                <td> {{ $food->group->name }} </td>
                <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#update_{{ $food->id }}">
                        Sửa <i class="fa-solid fa-pen-to-square"></i>
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="update_{{ $food->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cập nhật món</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <form method="POST" action="/foods/{{ $food->id }}">
                                    <div class="modal-body">
                                        @csrf
                                        @method('PATCH')
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">Tên món ăn</span>
                                            <input type="text" name="name" class="form-control text-center" value="{{ $food->name }}" required>
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">Số tiền</span>
                                            <input type="number" name="money" class="form-control text-center" value="{{ $food->money }}" required>
                                        </div>
                                        <div class="form-check form-switch mb-3">
                                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" @if ($food->is_active) checked @endif name="is_active">
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Có hoạt động không?</label>
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">Loại món ăn</span>
                                            <select name="food_group" class="form-select text-center">
                                                @foreach($food_groups as $food_group)
                                                <option value="{{$food_group->id}}" {{$food_group->id == $food->group_id ? 'selected' : ''}}>{{$food_group->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                        <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_{{ $food->id }}">
                        Xóa <i class="fa-solid fa-trash"></i>
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="delete_{{ $food->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa món {{ $food->name }}</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <form method="POST" action="/foods/{{ $food->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                        <button type="submit" class="btn btn-danger">Chắc chắn xóa</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
                @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('style')
<style>
    .input-group-text {
        width: 120px;
    }

    @keyframes fade-down {
        from {
            opacity: 0.55;
            transform: translateY(5px);
        }

        to {
            opacity: 1;
        }
    }

    td {
        animation: fade-down 0.25s ease;
    }
</style>
@endsection

@section('script')
@endsection
