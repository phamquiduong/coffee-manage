@extends('layouts.base')

@section('title')
Owner page
@endsection

@section('body')

@foreach($foodgroups as $foodgroup)
<p>{{ $foodgroup->name }} </p>
    @foreach($foodgroup->foods as $food)
    <p>{{ $food->name }} </p>
    @endforeach
    --
@endforeach


@endsection

@section('style')

@endsection

@section('script')
@endsection