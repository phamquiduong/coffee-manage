@extends('layouts.base')

@section('title')
Owner page
@endsection

@section('body')
@include('owner.layouts.navigation', ['page'=>'staffs'])

<div class="container">
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

<div class="container">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mt-4 mb-4 float-end me-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Thêm nhân viên mới <i class="fa-solid fa-user-plus"></i>
    </button>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm nhân viên mới</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Số điện thoại</span>
                        <input type="tel" class="form-control text-center" pattern="^(\+84|0)\d{9}$" name="phone_number" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Họ và tên</span>
                        <input type="text" class="form-control text-center" name="full_name" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Mật khẩu</span>
                        <input type="password" class="form-control text-center" name="password" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary">Thêm nhân viên mới</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container">
    <table class="table table-hover">
        <thead>
            <th>Số điện thoại</th>
            <th>Họ và tên</th>
            <th style="width:90px"></th>
            <th style="width:90px"></th>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td> {{ $user->phone_number }} </td>
                <td> {{ $user->full_name }}</td>
                <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#update_{{ $user->phone_number }}">
                        Sửa <i class="fa-solid fa-pen-to-square"></i>
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="update_{{ $user->phone_number }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cập nhật nhân viên</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <form method="POST" action="/users/{{ $user->phone_number }}">
                                    <div class="modal-body">
                                        @csrf
                                        @method('PATCH')
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">Số điện thoại</span>
                                            <input type="tel" class="form-control text-center" pattern="^(\+84|0)\d{9}$" name="phone_number" value="{{$user->phone_number}}" required>
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">Họ và tên</span>
                                            <input type="text" class="form-control text-center" name="full_name" value="{{$user->full_name}}" required>
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
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_{{ $user->phone_number }}">
                        Xóa <i class="fa-solid fa-trash"></i>
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="delete_{{ $user->phone_number }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa nhân viên {{ $user->full_name? $user->full_name : $user->phone_number }}</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <form method="POST" action="/users/{{ $user->phone_number }}">
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
