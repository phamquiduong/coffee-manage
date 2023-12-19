@extends('layouts.base')

@section('title')
Owner page
@endsection

@section('body')
@include('owner.layouts.navigation', ['page'=>'foods'])



@if ($errors->any())
<div class="alert alert-danger mt-2">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="POST">
    @csrf
    <input type="text" name="name" id="name" placeholder="Input name" required>
    <input type="number" name="money" id="money" placeholder="Input money" required>
    <select name="food_group">
        @foreach($food_groups as $food_group)
        <option value="{{$food_group->id}}">{{$food_group->name}}</option>
        @endforeach
    </select>
    <button type="submit">Add Food </button>
</form>

<table class="table">
    <thead>
        <th>Tên món </th>
        <th>Giá </th>
        <th>Trạng thái </th>
        <th>Loại </th>
        <th>Sửa</th>
        <th>Xóa</th>
    </thead>
    <tbody>
        @foreach ($foods as $food)
        <tr>
            <td> {{ $food->name }} </td>
            <td> {{ $food->money }} </td>
            <td> {{ $food->is_active }} </td>
            <td> {{ $food->group->name }} </td>
            <td>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#update_{{ $food->id }}">
                    Cập nhật
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
                                    <input type="text" placeholder="Tên mới" value="{{ $food->name }}" name="name" required>
                                    <input type="number" value="{{ $food->money }}" name="money" id="money" placeholder="Input money" required>
                                    <input type="checkbox" @if ($food->is_active) checked @endif name="is_active">
                                    <select name="food_group">
                                        @foreach($food_groups as $food_group)
                                        <option value="{{$food_group->id}}" {{$food_group->id == $food->group_id ? 'selected' : ''}}>{{$food_group->name}}</option>
                                        @endforeach
                                    </select>
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
                    Xóa
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
</form>
@endsection

@section('style')
@endsection

@section('script')
@endsection
