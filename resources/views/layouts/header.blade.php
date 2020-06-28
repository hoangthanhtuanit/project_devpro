<!--================ Start Header Menu Area =================-->
<header class="header_area">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand logo_h" href="{{ url('home') }}"><img src="img/logo.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
                        @php
                            $home = Request::is('home/*') ? 'active' : '';
                            $product = Request::is('category/*') ? 'active' : '';
                            $about = Request::is('about/*') ? 'active' : '';
                            $new = Request::is('new/*') ? 'active' : '';
                            $contact = Request::is('contact/*') ? 'active' : '';
                        @endphp
                        <li class="nav-item {{ $home }}"><a class="nav-link" href="{{ url('home') }}">Trang chủ</a></li>
                        <li class="nav-item submenu dropdown {{ $product }}">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true"
                               aria-expanded="false">Sản phẩm</a>
                            <ul class="dropdown-menu">
                                @foreach($categories as $category)
                                    @if(($category->status) == 1)
                                        <li class="nav-item"><a class="nav-link"
                                                                href="{{ url('category', ['id' => $category->id]) }}">{{ $category->name }}</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item {{ $about }}"><a class="nav-link" href="">Giới thiệu</a></li>
                        <li class="nav-item {{ $new }}"><a class="nav-link" href="">Tin tức</a></li>
                        <li class="nav-item {{ $contact }}"><a class="nav-link" href="">Liên hệ</a></li>
                    </ul>

                    <ul class="nav-shop">
                        <li class="nav-item">
                            <button><i class="ti-search"></i></button>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('cart') }}">
                                <button><i class="ti-shopping-cart"></i><span class="nav-shop__circle">{{ count(Cart::content()) }}</span></button>
                            </a>
                        </li>
                        <li class="nav-item"><a class="button button-header" href="login.html">Tài khoản</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
<!--================ End Header Menu Area =================-->
