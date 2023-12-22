<nav class="navbar navbar-expand-lg bg-body-tertiary shadow">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 nav nav-pills">
                <li class="nav-item me-4">
                    <a class="nav-link @if($page=='home')active text-white @endif" href='/'>
                        Trang chủ <i class="fa-solid fa-house"></i>
                    </a>
                </li>
                <li class="nav-item me-4">
                    <a class="nav-link @if($page=='staffs')active text-white @endif" href='/users'>
                        Quản lý nhân viên <i class="fa-solid fa-users"></i>
                    </a>
                </li>
                <li class="nav-item me-4">
                    <a class="nav-link @if($page=='foods')active text-white @endif" href='/foods'>
                        Quản lý món ăn <i class="fa-solid fa-bowl-food"></i>
                    </a>
                </li>
                <li class="nav-item me-4">
                    <a class="nav-link @if($page=='orders')active text-white @endif" href='/orders'>
                        Xem hóa đơn <i class="fa-solid fa-square-poll-vertical"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="d-flex" role="search">
            <a href='/logout' class="btn btn-danger">
                Đăng xuất <i class="fa-solid fa-right-from-bracket"></i>
            </a>
        </div>
    </div>
</nav>
