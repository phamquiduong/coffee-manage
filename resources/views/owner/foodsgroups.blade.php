@extends('layouts.base')

@section('title')
Owner page
@endsection

@section('body')
@include('owner.layouts.navigation', ['page'=>'foods'])

<div class="container ps-5 pe-5 pb-4">
    <a class="btn btn-secondary float-end mt-4 mb-4 me-4" href="/foods">
        <i class="fa-solid fa-backward"></i> Danh sách món ăn
    </a>
    <form method="POST">
        @csrf
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Loại món ăn</span>
            <input type="text" name="name" class="form-control text-center" required>
            <button class="btn btn-outline-primary" type="submit">
                Thêm <i class="fa-solid fa-plus"></i>
            </button>
        </div>
    </form>
</div>

<div class="container">
    <table class="table table-hover">
        <thead>
            <th>Tên nhóm </th>
            <th style="width:90px"></th>
            <th style="width:90px"></th>
        </thead>
        <tbody>
            @foreach ($foodgroups as $foodgroup)
            <tr>
                <td> {{ $foodgroup->name }} </td>
                <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#update_{{ $foodgroup->id }}">
                        Sửa <i class="fa-solid fa-pen-to-square"></i>
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="update_{{ $foodgroup->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cập nhật menu</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <form method="POST" action="/foods_groups/{{ $foodgroup->id }}">
                                    <div class="modal-body">
                                        @csrf
                                        @method('PATCH')
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">Tên món ăn</span>
                                            <input type="text" class="form-control text-center" value="{{ $foodgroup->name }}" name="name" required>
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
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_{{ $foodgroup->id }}">
                        Xóa <i class="fa-solid fa-trash"></i>
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="delete_{{ $foodgroup->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa món {{ $foodgroup->name}}</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <form method="POST" action="/foods_groups/{{ $foodgroup->id }}">
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
