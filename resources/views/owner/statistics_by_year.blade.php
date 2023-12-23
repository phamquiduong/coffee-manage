@extends('layouts.base')

@section('title')
Owner page
@endsection

@section('body')
@include('owner.layouts.navigation', ['page'=>'orders'])
<div class="container mt-4">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link " href="/orders">Danh sách</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/orders/statistics_by_month">Thống kê theo tháng</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="/orders/statistics_by_year">Thống kê theo năm</a>
        </li>
    </ul>

    <h1>Thống kê doanh thu theo năm</h1>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Năm</th>
                <th>Tổng doanh thu</th>
            </tr>
        </thead>
        <tbody>
            @foreach($annualStats as $stat)
            <tr>
                <td>{{ $stat->year }}</td>
                <td>{{ $stat->total_money }} VNĐ</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('style')
<style>
    @keyframes fade-down {
        from {
            opacity: 0.55;
            transform: translateY(5px);
        }

        to {
            opacity: 1;
        }
    }

    td {
        animation: fade-down 0.25s ease;
    }
</style>
@endsection

@section('script')

@endsection
