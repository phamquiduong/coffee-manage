@extends('layouts.base')

@section('title')
Owner page
@endsection

@section('body')
@include('owner.layouts.navigation', ['page'=>'foods'])
<form method="POST">
    @csrf
    <input type="text" name="name" id="name" placeholder="Input your name" required>
    <button type="submit">Add Food Group</button>
</form>
<table class="table">
    <thead>
        <th>Tên nhóm </th>
    </thead>
    <tbody>
        @foreach ($foodgroups as $foodgroup)
        <tr>
            <td> {{ $foodgroup->name }} </td>
            <td>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#update_{{ $foodgroup->id }}">
                    Cập nhật
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
                                    <input type="text" placeholder="Tên mới" value="{{ $foodgroup->name }}" name="name" required>
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
                    Xóa
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
</form>
@endsection

@section('style')
@endsection

@section('script')
@endsection
