@extends('layouts.base')

@section('title')
Owner page
@endsection

@section('body')
@include('owner.layouts.navigation', ['page'=>'home'])

</head>

<body>
    <!-- Jumbotron -->
    <div class="jumbotron">
        <h1 class="display-4">Coffee Shop</h1>
        <p class="lead">Thưởng thức cà phê Việt Nam</p>
    </div>

    <!-- Feature Section -->
    <div class="feature">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img src="/images/f1.png" alt="Feature 1">
                    <h3>Chất lượng từ hạt cà phê</h3>
                    <p>Chúng tôi lấy cà phê từ vùng cao nguyên của Việt Nam.</p>
                </div>
                <div class="col-md-4">
                    <img src="/images/f2.png" alt="Feature 2">
                    <h3>Không khí thư giãn</h3>
                    <p>Trải nghiệm không khí ấm cúng và thư giãn tại các quán cà phê của chúng tôi..</p>
                </div>
                <div class="col-md-4">
                    <img src="/images/f3.png" alt="Feature 3">
                    <h3>Thực đơn ngon</h3>
                    <p>Khám phá một thực đơn đa dạng với cà phê ngon và đồ ăn nhẹ hấp dẫn.</p>
                </div>
            </div>
        </div>
    </div>
</body>

@endsection

@section('style')
<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f8f9fa;
    }

    .jumbotron {
        background-image: url('images/cofe shop.png');
        background-size: cover;
        color: #ffffff;
        text-align: center;
        padding: 150px 0;
    }

    .feature {
        text-align: center;
        padding: 50px 0;
    }

    .feature img {
        max-width: 100%;
        height: auto;
    }
</style>
@endsection

@section('script')

@endsection
