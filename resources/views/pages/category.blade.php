@extends('layouts.index')
@section('title', 'Danh mục sản phẩm')

@section('content')

    <!-- ================ start banner area ================= -->
    <section class="blog-banner-area" id="category">
        <div class="container h-100">
            <div class="blog-banner">
                <div class="text-center">
                    <h1>Danh mục sản phẩm</h1>
                    <nav aria-label="breadcrumb" class="banner-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('home') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Danh mục sản phẩm</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ end banner area ================= -->


    <!-- ================ category section start ================= -->
    <section class="section-margin--small mb-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-5">
                    <div class="sidebar-categories">
                        <div class="head">Lọc theo tên</div>
                        <ul class="main-categories">
                            <li class="common-filter">
                                <form action="#">
                                    <ul>
                                        @foreach($categories as $category)
                                            @if(($category->status) == 1)
                                                <li class="filter-list"><input class="pixel-radio" type="radio" id=""
                                                                               name="category_name"><label
                                                            for="">{{ strtoupper($category->name) }}
                                                        <span> ({{ count($products) }})</span></label>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8 col-md-7">
                    <!-- Start Filter Bar -->
                    <div class="filter-bar d-flex flex-wrap align-items-center">
                        <div class="sorting">
                            <select>
                                <option value="0">Sắp xếp theo tên A to Z</option>
                                <option value="1">Sắp xếp theo tên Z to A</option>
                                <option value="2">Giá tăng dần</option>
                                <option value="3">Giá giảm dần</option>
                            </select>
                        </div>
                        <div class="sorting mr-auto"></div>
                        <div>
                            <div class="input-group filter-bar-search">
                                <input type="text" placeholder="Tìm kiếm">
                                <div class="input-group-append">
                                    <button type="button"><i class="ti-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Filter Bar -->
                    <!-- Start Best Seller -->
                    <section class="lattest-product-area pb-40 category-list">
                        <div class="row">
                            @foreach($products as $product)
                                <div class="col-md-6 col-lg-4">
                                    <div class="card text-center card-product">
                                        <div class="card-product__img">
                                            <img class="card-img"
                                                 src="{{ asset('uploads/products/' . $product->image) }}" alt="">
                                            <ul class="card-product__imgOverlay">
                                                <li>
                                                    <button><a href="{{ url('single-product', ['id' => $product->id]) }}"><i class="ti-search"></i></a></button>
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
                                            <p>{{ $product->categories->name }}</p>
                                            <h4 class="card-product__title"><a href="#">{{ $product->name }}</a></h4>
                                            <p class="card-product__price">
                                                <strike>{{ number_format($product->price) }}</strike> VNĐ</p>
                                            <p class="card-product__price">{{ number_format($product->price) }} VNĐ</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-right">
                                {{ $products->links() }}
                            </div>
                        </div>
                    </section>
                    <!-- End Best Seller -->
                </div>
            </div>
        </div>
    </section>
    <!-- ================ category section end ================= -->

    <!-- ================ top product area start ================= -->
    <section class="related-product-area">
        <div class="container">
            <div class="section-intro pb-60px">
                <p>Sản phẩm phổ biến của cửa hàng</p>
                <h2>Sản phẩm <span class="section-intro__style">nổi bật</span></h2>
            </div>
            <div class="row mt-30">
                <div class="col-sm-6 col-xl-3 mb-4 mb-xl-0">
                    <div class="single-search-product-wrapper">
                        <div class="single-search-product d-flex">
                            <a href="#"><img src="img/product/product-sm-1.png" alt=""></a>
                            <div class="desc">
                                <a href="#" class="title">Yeezy 700 super</a>
                                <div class="price">$170.00</div>
                            </div>
                        </div>
                        <div class="single-search-product d-flex">
                            <a href="#"><img src="img/product/product-sm-2.png" alt=""></a>
                            <div class="desc">
                                <a href="#" class="title">Gray Coffee Cup</a>
                                <div class="price">$170.00</div>
                            </div>
                        </div>
                        <div class="single-search-product d-flex">
                            <a href="#"><img src="img/product/product-sm-3.png" alt=""></a>
                            <div class="desc">
                                <a href="#" class="title">Gray Coffee Cup</a>
                                <div class="price">$170.00</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-3 mb-4 mb-xl-0">
                    <div class="single-search-product-wrapper">
                        <div class="single-search-product d-flex">
                            <a href="#"><img src="img/product/product-sm-4.png" alt=""></a>
                            <div class="desc">
                                <a href="#" class="title">Gray Coffee Cup</a>
                                <div class="price">$170.00</div>
                            </div>
                        </div>
                        <div class="single-search-product d-flex">
                            <a href="#"><img src="img/product/product-sm-5.png" alt=""></a>
                            <div class="desc">
                                <a href="#" class="title">Gray Coffee Cup</a>
                                <div class="price">$170.00</div>
                            </div>
                        </div>
                        <div class="single-search-product d-flex">
                            <a href="#"><img src="img/product/product-sm-6.png" alt=""></a>
                            <div class="desc">
                                <a href="#" class="title">Gray Coffee Cup</a>
                                <div class="price">$170.00</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-3 mb-4 mb-xl-0">
                    <div class="single-search-product-wrapper">
                        <div class="single-search-product d-flex">
                            <a href="#"><img src="img/product/product-sm-7.png" alt=""></a>
                            <div class="desc">
                                <a href="#" class="title">Gray Coffee Cup</a>
                                <div class="price">$170.00</div>
                            </div>
                        </div>
                        <div class="single-search-product d-flex">
                            <a href="#"><img src="img/product/product-sm-8.png" alt=""></a>
                            <div class="desc">
                                <a href="#" class="title">Gray Coffee Cup</a>
                                <div class="price">$170.00</div>
                            </div>
                        </div>
                        <div class="single-search-product d-flex">
                            <a href="#"><img src="img/product/product-sm-9.png" alt=""></a>
                            <div class="desc">
                                <a href="#" class="title">Gray Coffee Cup</a>
                                <div class="price">$170.00</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-3 mb-4 mb-xl-0">
                    <div class="single-search-product-wrapper">
                        <div class="single-search-product d-flex">
                            <a href="#"><img src="img/product/product-sm-1.png" alt=""></a>
                            <div class="desc">
                                <a href="#" class="title">Gray Coffee Cup</a>
                                <div class="price">$170.00</div>
                            </div>
                        </div>
                        <div class="single-search-product d-flex">
                            <a href="#"><img src="img/product/product-sm-2.png" alt=""></a>
                            <div class="desc">
                                <a href="#" class="title">Gray Coffee Cup</a>
                                <div class="price">$170.00</div>
                            </div>
                        </div>
                        <div class="single-search-product d-flex">
                            <a href="#"><img src="img/product/product-sm-3.png" alt=""></a>
                            <div class="desc">
                                <a href="#" class="title">Gray Coffee Cup</a>
                                <div class="price">$170.00</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ top product area end ================= -->

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
                            <input class="form-control mb-1" type="email" name="EMAIL" placeholder="Nhập email của bạn"
                                   onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address '">
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

@endsection