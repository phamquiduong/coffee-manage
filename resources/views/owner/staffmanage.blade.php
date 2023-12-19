@extends('layouts.base')

@section('title')
    Owner page
@endsection

@section('body')
    @include('owner.layouts.navigation')
    <form method="POST">
        @csrf
        <input type="text" name="phone_number" id="phone number" placeholder="Input phone number">
        <input type="text" name="full_name" id="full_name" placeholder="Input your name">
        <input type="password" name="password" id="password" placeholder="Input password">
        <button type="submit">Add user</button>
    </form>
    <form>
        <table class="table">
            <thead>
                <th>Số điện thoại</th>
                <th>Họ và tên</th>
                <th>Chỉnh sửa</th>
                <th>Xóa nhân viên</th>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td> {{ $user->phone_number }} </td>
                        <td> {{ $user->full_name }}</td>
                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#update_{{ $user->phone_number }}">
                                Cập nhật
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="update_{{ $user->phone_number }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Cập nhật nhân viên</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form>
                                        <div class="modal-body">
                                            <input type="text" placeholder="Số điện thoại mới" value={{ $user->phone_number }}>
                                            <input type="text" placeholder="Tên mới" value={{ $user->full_name }}>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Đóng</button>
                                            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <form method="POST" action="{{  route('/users/{id,full_name}', [$user->phone_number, $user->full_name])}}>
                                @csrf
                                {{ method_field('DELETE') }}
                                {{-- <input type="hidden" value="{{ $user->phone_number }}" name="phone_number">
                                <input type="hidden" value="{{ $user->full_name }}" name="full_name"> --}}
                                <button type="submit" class="btn btn-danger">Xóa</button>
                            </form>
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
