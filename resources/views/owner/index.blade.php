@extends('layouts.base')

@section('title')
Owner page
@endsection

@section('body')
@include('owner.layouts.navigation', ['page'=>'home'])

</head>

<body>
    <!-- Jumbotron -->
    <div class="jumbotron text-white text-center shadow ">
        <h1 class="display-4 text-shadow fw-normal">Kim Oanh Coffee</h1>
        <p class="lead text-shadow fw-normal">Thưởng thức cà phê Việt Nam</p>
    </div>

    <!-- Feature Section -->
    <div class="feature mt-5">
        <div class="container bg-body">
            <div class="row text-center">
                <div class="col-md-4 bg-body ps-5 pe-5">
                    <img src="/images/f1.png" alt="Feature 1" class="w-h-100 rounded">
                    <h3 class="mt-4 mb-2">Chất lượng từ hạt cà phê</h3>
                    <p>Chúng tôi lấy cà phê từ vùng cao nguyên của Việt Nam.</p>
                </div>
                <div class="col-md-4 bg-body ps-5 pe-5">
                    <img src="/images/f2.png" alt="Feature 2" class="w-h-100 rounded">
                    <h3 class="mt-4 mb-2">Không khí thư giãn</h3>
                    <p>Trải nghiệm không khí ấm cúng và thư giãn tại các quán cà phê của chúng tôi..</p>
                </div>
                <div class="col-md-4 bg-body ps-5 pe-5">
                    <img src="/images/f3.png" alt="Feature 3" class="w-h-100 rounded">
                    <h3 class="mt-4 mb-2">Thực đơn ngon</h3>
                    <p>Khám phá một thực đơn đa dạng với cà phê ngon và đồ ăn nhẹ hấp dẫn.</p>
                </div>
            </div>
        </div>
    </div>
</body>

@endsection

@section('style')
<style>
    .jumbotron {
        background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.8), rgba(255, 255, 255, 0.4)),
            url('images/cofe shop.png');
        background-size: cover;
        padding: 150px 0 200px;
    }

    .text-shadow {
        text-shadow: 1px 1px #d1d1d1;
    }

    @keyframes fade-down {
        from {
            opacity: 0.55;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
        }
    }

    .col-md-4 {
        animation: fade-down 1.5s ease;
    }
</style>
@endsection

@section('script')

@endsection
