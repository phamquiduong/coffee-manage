@extends('layouts.base')

@section('title')
Owner page
@endsection

@section('body')
@include('owner.layouts.navigation', ['page'=>'orders'])
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" href="/orders">Danh sách</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/orders/statistics_by_month">Thống kê theo tháng</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/orders/statistics_by_year">Thống kê theo năm</a>
    </li>
</ul>

<h1>Danh sách đơn hàng</h1>
@if($orders->isEmpty())
<p>Không có đơn hàng nào.</p>
@else
<table class="table table-hover">
    <thead>
        <tr>
            <th>Money</th>
            <th>Is Processing</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
        <tr>
            <td>{{ $order->money }} VNĐ</td>
            <td>{{ $order->is_processing }}</td>
            <td>{{ $order->created_at }}</td>
            <td>{{ $order->updated_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif

@endsection

@section('style')

@endsection

@section('script')
@endsection