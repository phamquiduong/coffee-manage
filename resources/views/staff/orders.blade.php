@extends('layouts.base')

@section('title')
Owner page
@endsection

@section('body')

@foreach($orders as $order_id => $detail)
<div class="container bg-body border rounded mt-4 mb-4 shadow-sm p-4 d-flex">
    <div class="flex-grow-1">
        <h6>{{ $detail['created_at'] }}</h6>
        <ul>
            @foreach($detail['foods'] as $food_name => $quantity)
            <li class="mb-4">
                <span class="fw-bold">
                    {{ $food_name }}
                </span>
                <ul>
                    <li>Số lượng: {{ $quantity }}</li>
                </ul>
            </li>
            @endforeach
        </ul>
    </div>
    <div>
        <a class="btn btn-primary" href="/make_ordered/{{$order_id}}">Hoàn thành</a>
    </div>
</div>
@endforeach

@endsection

@section('style')
@endsection

@section('script')
@endsection
