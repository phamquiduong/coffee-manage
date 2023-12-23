@extends('layouts.base')

@section('title')
Owner page
@endsection

@section('body')
<nav class="navbar navbar-expand-lg bg-body-tertiary shadow">
    <div class="container bg-body-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        </div>
        <div class="d-flex" role="search">
            <a href='/logout' class="btn btn-danger">
                Đăng xuất <i class="fa-solid fa-right-from-bracket"></i>
            </a>
        </div>
    </div>
</nav>

<div class="container text-center mt-5">
    <div class="row">
        <div class="col me-5 border shadow-sm rounded d-flex justify-content-center align-items-center" style="height: 200px; cursor: pointer" onclick="location.href='/staff/order';">
            <label>Đặt món <i class="fa-solid fa-bowl-food"></i></label>
        </div>
        <div class="col border shadow-sm rounded d-flex justify-content-center align-items-center" style="height: 200px; cursor: pointer" onclick="location.href='/staff/orders';">
            <label>Xem danh sách <i class="fa-solid fa-list-check"></i></label>
        </div>

    </div>
</div>
@endsection

@section('style')
@endsection

@section('script')
@endsection
