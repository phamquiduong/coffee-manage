
@extends('layouts.base')

@section('title')
Owner page
@endsection

@section('body')
@include('owner.layouts.navigation', ['page'=>'home'])
{{money}}
@endsection

@section('style')

@endsection

@section('script')

@endsection
