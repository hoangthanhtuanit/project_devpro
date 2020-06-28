@extends('layouts.index')
@section('title', 'Tuan Sneakers - Chất lượng hàng đầu')

@section('content')

    <main class="site-main">

        <!--================ Hero banner start =================-->
        <section>
            <div class="container-fluid banner-tuan" style="padding: 8px 0;">
                <img class="img-fluid" style="height: 450px; width: 100%" src="img/home/holiday-tet.PNG" alt="">
            </div>
        </section>
        <!--================ Hero banner start =================-->

        <!--================ Hero Carousel start =================-->
        <section class="section-margin mt-0">
            <div class="owl-carousel owl-theme hero-carousel">
                @foreach($slides as $slide)
                    <div class="hero-carousel__slide">
                        <img src="{{ asset('/uploads/slides/' . $slide->image) }}" style="width: 633px; height: 450px;"
                             alt="" class="img-fluid">
                        <a href="#" class="hero-carousel__slideOverlay">
                            <h3>{{ $slide->title }}</h3>
                            <p>{{ $slide->summary }}</p>
                        </a>
                    </div>
                @endforeach
            </div>
        </section>
        <!--================ Hero Carousel end =================-->


        <!-- ================ trending product section start ================= -->
        <section class="section-margin calc-60px">
            <div class="container">
                <div class="section-intro pb-60px">
                    <p>Sản phẩm phổ biến của cửa hàng</p>
                    <h2>Xu hướng <span class="section-intro__style">sản phẩm</span></h2>
                </div>
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-md-6 col-lg-4 col-xl-3">
                            <div class="card text-center card-product">
                                <div class="card-product__img">
                                    <img class="card-img" src="{{ asset('/uploads/products/' . $product->image) }}"
                                         alt="">
                                    <ul class="card-product__imgOverlay">
                                        <li>
                                            <button><a href="{{ url('single-product', ['id' => $product->id]) }}"><i
                                                            class="ti-search"></i></a></button>
                                        </li>
                                        {{--<li>--}}
                                            {{--<button><a href="{{ url('add-cart', ['id' => $product->id]) }}"><i class="ti-shopping-cart"></i></a></button>--}}
                                        {{--</li>--}}
                                        <li>
                                            <button><i class="ti-heart"></i></button>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <p>{{ $product->categories->name }}</p>
                                    <h4 class="card-product__title"><a
                                                href="{{ url('single-product/' . $product->id) }}">{{ $product->name }}</a></h4>
                                    @if(($product->sale) > 0)
                                        <p class="card-product__price"><strike style="color: #fe8618">{{ number_format($product->price) }} VNĐ</strike></p>
                                        <p class="card-product__price">{{ number_format(((100 - $product->sale) * $product->price)/100) }} VNĐ</p>
                                    @else
                                        <p class="card-product__price">{{ number_format($product->price) }} VNĐ</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        {{--<div class="col-md-6 col-lg-4 col-xl-3">--}}
                        {{--<div class="card text-center card-product">--}}
                        {{--<div class="card-product__img">--}}
                        {{--<img class="card-img" src="img/product/product2.png" alt="">--}}
                        {{--<ul class="card-product__imgOverlay">--}}
                        {{--<li>--}}
                        {{--<button><i class="ti-search"></i></button>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<button><i class="ti-shopping-cart"></i></button>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<button><i class="ti-heart"></i></button>--}}
                        {{--</li>--}}
                        {{--</ul>--}}
                        {{--</div>--}}
                        {{--<div class="card-body">--}}
                        {{--<p>Beauty</p>--}}
                        {{--<h4 class="card-product__title"><a href="single-product.html">Women Freshwash</a></h4>--}}
                        {{--<p class="card-product__price">$150.00</p>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-6 col-lg-4 col-xl-3">--}}
                        {{--<div class="card text-center card-product">--}}
                        {{--<div class="card-product__img">--}}
                        {{--<img class="card-img" src="img/product/product3.png" alt="">--}}
                        {{--<ul class="card-product__imgOverlay">--}}
                        {{--<li>--}}
                        {{--<button><i class="ti-search"></i></button>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<button><i class="ti-shopping-cart"></i></button>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<button><i class="ti-heart"></i></button>--}}
                        {{--</li>--}}
                        {{--</ul>--}}
                        {{--</div>--}}
                        {{--<div class="card-body">--}}
                        {{--<p>Decor</p>--}}
                        {{--<h4 class="card-product__title"><a href="single-product.html">Room Flash Light</a></h4>--}}
                        {{--<p class="card-product__price">$150.00</p>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-6 col-lg-4 col-xl-3">--}}
                        {{--<div class="card text-center card-product">--}}
                        {{--<div class="card-product__img">--}}
                        {{--<img class="card-img" src="img/product/product4.png" alt="">--}}
                        {{--<ul class="card-product__imgOverlay">--}}
                        {{--<li>--}}
                        {{--<button><i class="ti-search"></i></button>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<button><i class="ti-shopping-cart"></i></button>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<button><i class="ti-heart"></i></button>--}}
                        {{--</li>--}}
                        {{--</ul>--}}
                        {{--</div>--}}
                        {{--<div class="card-body">--}}
                        {{--<p>Decor</p>--}}
                        {{--<h4 class="card-product__title"><a href="single-product.html">Room Flash Light</a></h4>--}}
                        {{--<p class="card-product__price">$150.00</p>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-6 col-lg-4 col-xl-3">--}}
                        {{--<div class="card text-center card-product">--}}
                        {{--<div class="card-product__img">--}}
                        {{--<img class="card-img" src="img/product/product5.png" alt="">--}}
                        {{--<ul class="card-product__imgOverlay">--}}
                        {{--<li>--}}
                        {{--<button><i class="ti-search"></i></button>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<button><i class="ti-shopping-cart"></i></button>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<button><i class="ti-heart"></i></button>--}}
                        {{--</li>--}}
                        {{--</ul>--}}
                        {{--</div>--}}
                        {{--<div class="card-body">--}}
                        {{--<p>Accessories</p>--}}
                        {{--<h4 class="card-product__title"><a href="single-product.html">Man Office Bag</a></h4>--}}
                        {{--<p class="card-product__price">$150.00</p>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-6 col-lg-4 col-xl-3">--}}
                        {{--<div class="card text-center card-product">--}}
                        {{--<div class="card-product__img">--}}
                        {{--<img class="card-img" src="img/product/product6.png" alt="">--}}
                        {{--<ul class="card-product__imgOverlay">--}}
                        {{--<li>--}}
                        {{--<button><i class="ti-search"></i></button>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<button><i class="ti-shopping-cart"></i></button>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<button><i class="ti-heart"></i></button>--}}
                        {{--</li>--}}
                        {{--</ul>--}}
                        {{--</div>--}}
                        {{--<div class="card-body">--}}
                        {{--<p>Kids Toy</p>--}}
                        {{--<h4 class="card-product__title"><a href="single-product.html">Charging Car</a></h4>--}}
                        {{--<p class="card-product__price">$150.00</p>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-6 col-lg-4 col-xl-3">--}}
                        {{--<div class="card text-center card-product">--}}
                        {{--<div class="card-product__img">--}}
                        {{--<img class="card-img" src="img/product/product7.png" alt="">--}}
                        {{--<ul class="card-product__imgOverlay">--}}
                        {{--<li>--}}
                        {{--<button><i class="ti-search"></i></button>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<button><i class="ti-shopping-cart"></i></button>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<button><i class="ti-heart"></i></button>--}}
                        {{--</li>--}}
                        {{--</ul>--}}
                        {{--</div>--}}
                        {{--<div class="card-body">--}}
                        {{--<p>Accessories</p>--}}
                        {{--<h4 class="card-product__title"><a href="single-product.html">Blutooth Speaker</a></h4>--}}
                        {{--<p class="card-product__price">$150.00</p>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-6 col-lg-4 col-xl-3">--}}
                        {{--<div class="card text-center card-product">--}}
                        {{--<div class="card-product__img">--}}
                        {{--<img class="card-img" src="img/product/product8.png" alt="">--}}
                        {{--<ul class="card-product__imgOverlay">--}}
                        {{--<li>--}}
                        {{--<button><i class="ti-search"></i></button>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<button><i class="ti-shopping-cart"></i></button>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<button><i class="ti-heart"></i></button>--}}
                        {{--</li>--}}
                        {{--</ul>--}}
                        {{--</div>--}}
                        {{--<div class="card-body">--}}
                        {{--<p>Kids Toy</p>--}}
                        {{--<h4 class="card-product__title"><a href="#">Charging Car</a></h4>--}}
                        {{--<p class="card-product__price">$150.00</p>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                    @endforeach
                </div>
            </div>
        </section>
        <!-- ================ trending product section end ================= -->


        <!-- ================ offer section start ================= -->
        <section class="offer" id="parallax-1" data-anchor-target="#parallax-1"
                 data-300-top="background-position: 20px 30px" data-top-bottom="background-position: 0 20px">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5">
                        <div class="offer__content text-center">
                            <h3>Up To 50% Off</h3>
                            <h4>Winter Sale</h4>
                            <p>Him she'd let them sixth saw light</p>
                            <a class="button button--active mt-3 mt-xl-4" href="#">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ================ offer section end ================= -->

        <!-- ================ Best Selling item  carousel ================= -->
        <section class="section-margin calc-60px">
            <div class="container">
                <div class="section-intro pb-60px">
                    <p>Sản phẩm phổ biến của cửa hàng</p>
                    <h2>Sản phẩm <span class="section-intro__style">bán chạy</span></h2>
                </div>
                <div class="owl-carousel owl-theme" id="bestSellerCarousel">
                    <div class="card text-center card-product">
                        <div class="card-product__img">
                            <img class="img-fluid" src="img/product/product1.png" alt="">
                            <ul class="card-product__imgOverlay">
                                <li>
                                    <button><i class="ti-search"></i></button>
                                </li>
                                <li>
                                    <button><i class="ti-shopping-cart"></i></button>
                                </li>
                                <li>
                                    <button><i class="ti-heart"></i></button>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <p>Accessories</p>
                            <h4 class="card-product__title"><a href="single-product.html">Quartz Belt Watch</a></h4>
                            <p class="card-product__price">$150.00</p>
                        </div>
                    </div>

                    <div class="card text-center card-product">
                        <div class="card-product__img">
                            <img class="img-fluid" src="img/product/product2.png" alt="">
                            <ul class="card-product__imgOverlay">
                                <li>
                                    <button><i class="ti-search"></i></button>
                                </li>
                                <li>
                                    <button><i class="ti-shopping-cart"></i></button>
                                </li>
                                <li>
                                    <button><i class="ti-heart"></i></button>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <p>Beauty</p>
                            <h4 class="card-product__title"><a href="single-product.html">Women Freshwash</a></h4>
                            <p class="card-product__price">$150.00</p>
                        </div>
                    </div>

                    <div class="card text-center card-product">
                        <div class="card-product__img">
                            <img class="img-fluid" src="img/product/product3.png" alt="">
                            <ul class="card-product__imgOverlay">
                                <li>
                                    <button><i class="ti-search"></i></button>
                                </li>
                                <li>
                                    <button><i class="ti-shopping-cart"></i></button>
                                </li>
                                <li>
                                    <button><i class="ti-heart"></i></button>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <p>Decor</p>
                            <h4 class="card-product__title"><a href="single-product.html">Room Flash Light</a></h4>
                            <p class="card-product__price">$150.00</p>
                        </div>
                    </div>

                    <div class="card text-center card-product">
                        <div class="card-product__img">
                            <img class="img-fluid" src="img/product/product4.png" alt="">
                            <ul class="card-product__imgOverlay">
                                <li>
                                    <button><i class="ti-search"></i></button>
                                </li>
                                <li>
                                    <button><i class="ti-shopping-cart"></i></button>
                                </li>
                                <li>
                                    <button><i class="ti-heart"></i></button>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <p>Decor</p>
                            <h4 class="card-product__title"><a href="single-product.html">Room Flash Light</a></h4>
                            <p class="card-product__price">$150.00</p>
                        </div>
                    </div>

                    <div class="card text-center card-product">
                        <div class="card-product__img">
                            <img class="img-fluid" src="img/product/product1.png" alt="">
                            <ul class="card-product__imgOverlay">
                                <li>
                                    <button><i class="ti-search"></i></button>
                                </li>
                                <li>
                                    <button><i class="ti-shopping-cart"></i></button>
                                </li>
                                <li>
                                    <button><i class="ti-heart"></i></button>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <p>Accessories</p>
                            <h4 class="card-product__title"><a href="single-product.html">Quartz Belt Watch</a></h4>
                            <p class="card-product__price">$150.00</p>
                        </div>
                    </div>

                    <div class="card text-center card-product">
                        <div class="card-product__img">
                            <img class="img-fluid" src="img/product/product2.png" alt="">
                            <ul class="card-product__imgOverlay">
                                <li>
                                    <button><i class="ti-search"></i></button>
                                </li>
                                <li>
                                    <button><i class="ti-shopping-cart"></i></button>
                                </li>
                                <li>
                                    <button><i class="ti-heart"></i></button>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <p>Beauty</p>
                            <h4 class="card-product__title"><a href="single-product.html">Women Freshwash</a></h4>
                            <p class="card-product__price">$150.00</p>
                        </div>
                    </div>

                    <div class="card text-center card-product">
                        <div class="card-product__img">
                            <img class="img-fluid" src="img/product/product3.png" alt="">
                            <ul class="card-product__imgOverlay">
                                <li>
                                    <button><i class="ti-search"></i></button>
                                </li>
                                <li>
                                    <button><i class="ti-shopping-cart"></i></button>
                                </li>
                                <li>
                                    <button><i class="ti-heart"></i></button>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <p>Decor</p>
                            <h4 class="card-product__title"><a href="single-product.html">Room Flash Light</a></h4>
                            <p class="card-product__price">$150.00</p>
                        </div>
                    </div>

                    <div class="card text-center card-product">
                        <div class="card-product__img">
                            <img class="img-fluid" src="img/product/product4.png" alt="">
                            <ul class="card-product__imgOverlay">
                                <li>
                                    <button><i class="ti-search"></i></button>
                                </li>
                                <li>
                                    <button><i class="ti-shopping-cart"></i></button>
                                </li>
                                <li>
                                    <button><i class="ti-heart"></i></button>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <p>Decor</p>
                            <h4 class="card-product__title"><a href="single-product.html">Room Flash Light</a></h4>
                            <p class="card-product__price">$150.00</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ================ Best Selling item  carousel end ================= -->

        <!-- ================ Blog section start ================= -->
        <section class="blog">
            <div class="container">
                <div class="section-intro pb-60px">
                    <p>Sản phẩm phổ biến của cửa hàng</p>
                    <h2>Tin <span class="section-intro__style">mới nhất</span></h2>
                </div>

                <div class="row">
                    <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                        <div class="card card-blog">
                            <div class="card-blog__img">
                                <img class="card-img rounded-0" src="img/blog/blog1.png" alt="">
                            </div>
                            <div class="card-body">
                                <ul class="card-blog__info">
                                    <li><a href="#">By Admin</a></li>
                                    <li><a href="#"><i class="ti-comments-smiley"></i> 2 Comments</a></li>
                                </ul>
                                <h4 class="card-blog__title"><a href="single-blog.html">The Richland Center Shooping
                                        News
                                        and weekly shooper</a></h4>
                                <p>Let one fifth i bring fly to divided face for bearing divide unto seed. Winged
                                    divided
                                    light Forth.</p>
                                <a class="card-blog__link" href="#">Read More <i class="ti-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                        <div class="card card-blog">
                            <div class="card-blog__img">
                                <img class="card-img rounded-0" src="img/blog/blog2.png" alt="">
                            </div>
                            <div class="card-body">
                                <ul class="card-blog__info">
                                    <li><a href="#">By Admin</a></li>
                                    <li><a href="#"><i class="ti-comments-smiley"></i> 2 Comments</a></li>
                                </ul>
                                <h4 class="card-blog__title"><a href="single-blog.html">The Shopping News also offers
                                        top-quality printing services</a></h4>
                                <p>Let one fifth i bring fly to divided face for bearing divide unto seed. Winged
                                    divided
                                    light Forth.</p>
                                <a class="card-blog__link" href="#">Read More <i class="ti-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                        <div class="card card-blog">
                            <div class="card-blog__img">
                                <img class="card-img rounded-0" src="img/blog/blog3.png" alt="">
                            </div>
                            <div class="card-body">
                                <ul class="card-blog__info">
                                    <li><a href="#">By Admin</a></li>
                                    <li><a href="#"><i class="ti-comments-smiley"></i> 2 Comments</a></li>
                                </ul>
                                <h4 class="card-blog__title"><a href="single-blog.html">Professional design staff and
                                        efficient equipment you’ll find we offer</a></h4>
                                <p>Let one fifth i bring fly to divided face for bearing divide unto seed. Winged
                                    divided
                                    light Forth.</p>
                                <a class="card-blog__link" href="#">Read More <i class="ti-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ================ Blog section end ================= -->

        <!-- ================ Subscribe section start ================= -->
        <section class="subscribe-position">
            <div class="container">
                <div class="subscribe text-center">
                    <h3 class="subscribe__title">Đăng ký nhận email khuyến mãi</h3>
                    <p>Bearing Void gathering light light his eavening unto dont afraid</p>
                    <div id="mc_embed_signup">
                        <form target="_blank"
                              action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                              method="get" class="subscribe-form form-inline mt-5 pt-1">
                            <div class="form-group ml-sm-auto">
                                <input class="form-control mb-1" type="email" name="EMAIL"
                                       placeholder="Nhập email của bạn"
                                       onfocus="this.placeholder = ''"
                                       onblur="this.placeholder = 'Your Email Address '">
                                <div class="info"></div>
                            </div>
                            <button class="button button-subscribe mr-auto mb-1" type="submit">Đăng ký</button>
                            <div style="position: absolute; left: -5000px;">
                                <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </section>
        <!-- ================ Subscribe section end ================= -->


    </main>

@endsection
