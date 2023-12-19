@extends('layouts.base')

@section('title')
Login page
@endsection

@section('body')
<div id="main" class="border shadow rounded bg-white p-3 text-center">
    <form method="post" action="/">
        <img src="/Logo.png" width="164px" height="164px" class="border rounded-circle mt-4" style="animation: fade-down 0.25s ease">
        <h4 class="mt-4" style="animation: fade-down 0.5s ease">
            {{ isset($phoneNumber) ? 'Xin chào ' . $phoneNumber : ($isExistUser ? 'Đăng nhập vào website' : 'Xin chào chủ quán') }}
        </h4>
        @csrf
        <div class="input-group mt-5 {{ isset($requestPassword) && $requestPassword ? 'd-none' : '' }}" style="animation: fade-right 0.75s ease">
            <input class="form-control" type="tel" pattern="^(\+84|0)\d{9}$" placeholder="Số điện thoại" name="phone_number" value="{{ isset($phoneNumber) ? $phoneNumber : '' }}">
            <button class="btn btn-outline-primary" type="submit"><i class="fa-solid fa-arrow-right"></i></button>
        </div>
        <div class="input-group mt-5 {{ isset($requestPassword) && $requestPassword ? '' : 'd-none' }}" style="animation: fade-right 0.75s ease">
            <input class="form-control" type="password" placeholder="Mật khẩu" name="password">
            <button class="btn btn-outline-primary" type="submit"><i class="fa-solid fa-arrow-right"></i></button>
        </div>
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

    @if (isset($password_wrong) && $password_wrong == TRUE)
    <div class="alert alert-danger mt-2">
        <ul>
            <li>Mật khẩu sai. Vui lòng nhập lại mật khẩu</li>
        </ul>
    </div>
    @endif
</div>

@endsection

@section('style')
<style>
    #main {
        width: 576px;
        height: 576px;
    }

    body {
        display: grid;
        place-items: center;
        height: 100vh;
    }

    @keyframes fade-down {
        from {
            opacity: 0.75;
            transform: translateY(-10px);
        }

        to {
            opacity: 1;
        }
    }

    @keyframes fade-right {
        from {
            opacity: 0.75;
            transform: translateX(-10px);
        }

        to {
            opacity: 1;
        }
    }

    @media only screen and (max-width: 576px) {
        #main {
            width: 100%;
            height: 100vh;
        }
    }
</style>
@endsection

@section('script')
@endsection
