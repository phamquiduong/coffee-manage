@extends('layouts.base')

@section('title')
Login page
@endsection

@section('body')
<form method="post" action="/">
    <h4>{{isset($phoneNumber)?'Hello '.$phoneNumber.' please enter your password':($isExistUser?'Login to website':'Hello onwer')}}</h4>
    @csrf
    <input type="{{isset($requestPassword) && $requestPassword ? 'hidden' : 'text'}}" placeholder="Phone number" name="phone_number" value="{{isset($phoneNumber)?$phoneNumber:''}}">
    <input type="{{isset($requestPassword) && $requestPassword ? 'password' : 'hidden'}}" placeholder="Password" name="password">
    <button type="submit">{{isset($isExistUser) && $isExistUser?'Login':'Register'}}</button>
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

{{isset($error)?$error:''}}
@endsection

@section('style')
@endsection

@section('script')
@endsection