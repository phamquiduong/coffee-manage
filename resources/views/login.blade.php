@extends('layouts.base')

@section('title')
Login page
@endsection

@section('body')
<form method="post" action="/login">
    @csrf
    <input type="text" placeholder="Phone number" name="phone_number" value="{{isset($phoneNumber)?$phoneNumber:''}}">
    <button type="submit">{{isset($isExistUser) && $isExistUser?'Login':'Register'}}</button>
</form>

{{isset($phoneNumber)?$phoneNumber:''}}
@endsection

@section('style')
@endsection

@section('script')
@endsection