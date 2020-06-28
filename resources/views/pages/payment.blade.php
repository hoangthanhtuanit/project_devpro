@extends('layouts.index')
@section('title', 'Thanh toán')

@section('content')

    <!-- ================ start banner area ================= -->
    <section class="blog-banner-area" id="category">
        <div class="container h-100">
            <div class="blog-banner">
                <div class="text-center">
                    <h1>Thanh toán</h1>
                    <nav aria-label="breadcrumb" class="banner-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('home') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Thanh toán</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ end banner area ================= -->


    <!--================Checkout Area =================-->
    <section class="checkout_area section-margin--small">
        <div class="container">
            <div class="returning_customer">
                <div class="check_title">
                    <h2>Nếu bạn đã có tài khoản? <a href="{{ url('login') }}">Đăng nhập ngay</a></h2>
                </div>
                <p>Nếu bạn đã mua sắm với chúng tôi trước đây, vui lòng nhập thông tin của bạn vào các ô bên dưới. Nếu
                    bạn là khách hàng mới, vui lòng tiếp tục với phần Thanh toán & Giao hàng.</p>
                <form class="row contact_form" action="#" method="post" novalidate="novalidate">
                    <div class="col-md-6 form-group p_star">
                        <input type="text" class="form-control" placeholder="Tài khoản (*)"
                               onfocus="this.placeholder=''" onblur="this.placeholder = 'Tài khoản (*)'" id="name"
                               name="email">
                        <!-- <span class="placeholder" data-placeholder="Username or Email"></span> -->
                    </div>
                    <div class="col-md-6 form-group p_star">
                        <input type="password" class="form-control" placeholder="Mật khẩu (*)"
                               onfocus="this.placeholder=''"
                               onblur="this.placeholder = 'Mật khẩu (*)'" id="password" name="password">
                        <!-- <span class="placeholder" data-placeholder="Password"></span> -->
                    </div>
                    <div class="col-md-12 form-group">
                        <button type="submit" value="submit" class="button button-login">Đăng nhập</button>
                        <div class="creat_account">
                            <input type="checkbox" id="f-option" name="selector">
                            <label for="f-option">Giữ đăng nhập</label>
                        </div>
                        <a class="lost_pass" href="#">Quên mật khẩu?</a>
                    </div>
                </form>
            </div>
            <div class="cupon_area">
                {{--<div class="check_title">--}}
                {{--<h2>Có phiểu giảm giá? <a href="#">Nhấn vào đây để nhập mã của bạn</a></h2>--}}
                {{--</div>--}}
                {{--<input type="text" placeholder="Nhập mã giảm giá">--}}
                {{--<a class="button button-coupon" href="#">Áp dụng phiếu giảm giá</a>--}}
            </div>
            <div class="billing_details">
                @if(session('success'))
                    <div class="alert alert-success">
                        <h3 style="color: #244ec9">Quý khách đã đặt hàng thành công!</h3>
                        <div class="explain-email">
                            <ul>
                                <li>Hóa đơn mua hàng của Quý khách đã được chuyển đến địa chỉ email đặt hàng của Quý khách.</li>
                                <li>Sản phẩm sẽ được chuyển đến địa chỉ đặt hàng sau 2 - 5 ngày tính từ thời điểm Quý khách nhận được thông báo này.</li>
                                <li>Trụ sở chính: 147 - Phố Mai Dịch - Quận Cầu Giấy - TP Hà Nội</li>
                                <li>Hot line: 0364081626</li>
                            </ul>
                        </div>
                    </div>
                @else
                <form action="{{ url('payment') }}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="row">
                        <div class="col-md-8">
                            <h3>Thông tin thanh toán</h3>
                            @if(session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        <span>{{ $error }}</span><br>
                                    @endforeach
                                </div>
                            @endif
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="first" name="first_name"
                                       placeholder="Họ đệm (*)">
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="last" name="last_name"
                                       placeholder="Tên (*)">
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="number" name="phone_number"
                                       placeholder="Số điện thoại (*)">
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="email" name="email"
                                       placeholder="Địa chỉ email (*)">
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="add1" name="address"
                                       placeholder="Địa chỉ (*)">
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="zip" name="zip"
                                       placeholder="Mã bưu chính (*)">
                            </div>
                            <div class="col-md-12 form-group mb-0">
                                <textarea class="form-control" name="note" id="message" rows="5"
                                          placeholder="Ghi chú"></textarea>
                            </div>
                            <br>
                            <p style="padding-left: 15px;">(*) Các trường bắt buộc</p>
                        </div>
                        <div class="col-md-4">
                            <div class="order_box">
                                <h2>Chi tiết đơn hàng</h2>
                                <ul class="list">
                                    <li><a href="#"><h4>Sản phẩm <span>Đơn giá</span></h4></a></li>
                                    @foreach($cart_lists as $cart_list)
                                        <li><a href="{{ url('single-product', ['id' => $cart_list->id]) }}">
                                                @php
                                                    if (strlen($cart_list->name) > 20) {
                                                        echo substr($cart_list->name, 0, -10);
                                                    } else {
                                                        echo $cart_list->name;
                                                    }
                                                @endphp

                                                x {{ $cart_list->qty }} <span
                                                        class="last">{{ number_format($cart_list->price) }}
                                                    VNĐ</span></a></li>
                                    @endforeach
                                </ul>
                                <ul class="list list_2">
                                    <li><a href="#">Tổng tiền <span>{{ $total_price }} VNĐ</span></a></li>
                                    {{--<li><a href="#">Phí ship <span>0 VNĐ</span></a></li>--}}
                                    {{--<li><a href="#">Tổng tiền <span>$2210.00</span></a></li>--}}
                                </ul>
                                <div class="payment_item">
                                    <div class="radion_btn">
                                        <input type="radio" checked id="f-option5" value="2" name="payment">
                                        <label for="f-option5">Nhận hàng thanh toán</label>
                                        <div class="check"></div>
                                    </div>
                                    <p style="text-align: justify;">Thanh toán cho người thu hộ sau khi bạn nhận được
                                        hàng và kiểm tra chất lượng của sản phẩm.</p>
                                </div>
                                <div class="payment_item active">
                                    <div class="radion_btn">
                                        <input type="radio" id="f-option6" value="1" name="payment">
                                        <label for="f-option6">Chuyển khoản </label>
                                        <img src="img/product/card.jpg" alt="">
                                        <div class="check"></div>
                                    </div>
                                    <p style="text-align: justify;">Thanh toán qua PayPal; bạn có thể thanh toán bằng
                                        thẻ tín dụng nếu bạn không có tài khoản PayPal.</p>
                                </div>
                                <div class="payment_item">
                                    <div class="radion_btn">
                                        <input type="radio" id="f-option4" value="0" name="payment">
                                        <label for="f-option4">Tiền mặt</label>
                                        <div class="check"></div>
                                    </div>
                                    <p style="text-align: justify;">Quý khách thanh toán tại quầy giao dịch.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center" style="margin-top: 30px;">
                        <p>
                            <input type="submit" style="width: 200px;" class="button button-paypal" value="Thanh toán">
                        </p>
                    </div>
                </form>
                @endif
            </div>
        </div>
    </section>
    <!--================End Checkout Area =================-->

@endsection