@extends('layouts.base')

@section('title')
    Login page
@endsection

@section('body')
    <form method="post" action="/">
        <h4>{{ isset($phoneNumber) ? 'Hello ' . $phoneNumber . ' please enter your password' : ($isExistUser ? 'Login to website' : 'Hello onwer') }}
        </h4>
        @csrf
        <input type="{{ isset($requestPassword) && $requestPassword ? 'hidden' : 'text' }}" placeholder="Phone number"
            name="phone_number" value="{{ isset($phoneNumber) ? $phoneNumber : '' }}">
        <input type="{{ isset($requestPassword) && $requestPassword ? 'password' : 'hidden' }}" placeholder="Password"
            name="password">
        <button type="submit">{{ isset($isExistUser) && $isExistUser ? 'Login' : 'Register' }}</button>
    </form>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{ isset($error) ? $error : '' }}
@endsection

@section('style')
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
            /* Màu nền xám nhạt */
        }

        form {
            max-width: 600px;
            padding: 20px;
            border-radius: 8px;
            /* Bo tròn 4 góc */
            background-color: #ffffff;
            /* Màu nền trắng */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            /* Đổ bóng nhẹ */
            border: 1px solid #333;
            /* Độ dày và màu sắc của viền */
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #4caf50;
            /* Màu nền nút */
            color: #fff;
            /* Màu chữ nút */
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        /* Nếu bạn muốn ẩn điều gì đó, sử dụng display: none; */
        input[type="hidden"] {
            display: none;
        }
    </style>
@endsection

@section('script')
@endsection
