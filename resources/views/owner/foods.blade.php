@extends('layouts.base')

@section('title')
Owner page
@endsection

@section('body')
@include('owner.layouts.navigation')
<form method="POST">
    @csrf
    <input type="text" name="name" id="name" placeholder="Input name" required>
    <input type="number" name="money" id="money" placeholder="Input money" required>
    <button type="submit">Add Food </button>
</form>
@if ($errors->any())
<div class="alert alert-danger mt-2">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<table class="table">
    <thead>
        <th>Tên món </th>
        <th>Giá </th>
        <th>Trạng thái </th>
        <th>Sửa </th>
    </thead>
    <tbody>
        @foreach ($foods as $food)
        <tr>
            <td> {{ $food->name }} </td>
            <td> {{ $food->money }} </td>
            <td> {{ $food->is_active }} </td>
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
            @endforeach
    </tbody>
</table>
</form>
@endsection

@section('style')
@endsection

@section('script')
@endsection