@extends('layouts.base')

@section('title')
Staff page
@endsection

@section('body')
<div >
<div class="container bg-body ps-5 pe-5 pb-4">
    <a class="btn btn-secondary float-end mt-4 mb-4 me-4" href="/staff/order">
        <i class="fa-solid fa-backward"></i>Trang order
    </a>
</div>

</div>
<img src="https://img.vietqr.io/image/970418-56010001780185-compact2.jpg?amount={{$money}}&addInfo=thanh%20toan%20don%20{{$order->id}}%20&accountName=NGO%20THI%20KIM%20OANH
" alt="mã qr thanh toán">
@endsection

@section('style')

@endsection

@section('script')
@endsection