@extends('layouts.index')
@section('title', 'Giỏ hàng')

@section('content')

    <!-- ================ start banner area ================= -->
    <section class="blog-banner-area" id="category">
        <div class="container h-100">
            <div class="blog-banner">
                <div class="text-center">
                    <h1>Giỏ hàng</h1>
                    <nav aria-label="breadcrumb" class="banner-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('home') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ end banner area ================= -->

    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Sản phẩm</th>
                            <th scope="col">Đơn giá</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Kích cỡ/Màu</th>
                            <th scope="col">Tổng tiền</th>
                            <th scope="col">Xóa</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cart_lists as $cart_list)
                            <tr>
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="{{ asset('uploads/products/' . $cart_list->options['img']) }}"
                                                 alt="">
                                        </div>
                                        <div class="media-body">
                                            <p>{{ $cart_list->name }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5>{{ number_format($cart_list->price) }} VNĐ</h5>
                                </td>
                                <td>
                                    <div class="product_count">
                                        <input type="text" name="quantity" id="qty" maxlength="12"
                                               value="{{ $cart_list->qty }}" title="Quantity:"
                                               class="input-text qty"
                                               onchange="return updateCart(this.value,'{{ $cart_list->rowId }}');">
                                        <button onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;"
                                                class="increase items-count" type="button"><i
                                                    class="fas fa-angle-up"></i>
                                        </button>
                                        <button onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty > 0 ) result.value--;return false;"
                                                class="reduced items-count" type="button"><i
                                                    class="fas fa-angle-down"></i>
                                        </button>
                                    </div>
                                </td>
                                <td>{{ $cart_list->options['size'] . '/' . $cart_list->options['color'] }}</td>
                                <td>
                                    <h5>{{ number_format($cart_list->price*$cart_list->qty) }} VNĐ</h5>
                                </td>
                                <td>
                                    <a href="{{ url('remove-cart', ['id' => $cart_list->rowId]) }}">
                                        <i style="color: red;" class="fas fa-times"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        <tr class="bottom_button">
                            {{--<td>--}}
                                {{--<form action="" method="post">--}}
                                    {{--<input class="button" class="update-cart" type="submit" value="Cập nhật giỏ hàng">--}}
                                {{--</form>--}}
                            {{--</td>--}}
                            <td colspan="2">
                                <a class="button" class="update-cart" href="{{ url('remove-cart/all') }}">Xóa giỏ
                                    hàng</a>
                            </td>
                            <td colspan="2">
                                <h5>Tổng tiền thanh toán</h5>
                            </td>
                            <td colspan="3">
                                <h5>{{ $total_price }} VNĐ</h5>
                                <small><i>(đã bao gồm VAT)</i></small>
                            </td>
                        </tr>
                        <tr class="out_button_area">
                            <td class="d-none-l"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <div class="checkout_btn_inner d-flex align-items-center">
                                    <a class="gray_btn" href="{{ url('home') }}">Tiếp tục mua hàng</a>
                                    <a class="primary-btn ml-2" href="{{ url('payment') }}">Thanh toán</a>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->

@endsection

@section('script')
    <script type="text/javascript">
        function updateCart(quantity, rowId) {
            $.get(
                '{{ url('update-cart') }}',
                {quantity: quantity, rowId: rowId},
                function () {
                    location.reload();
                }
            );
        }
    </script>
@endsection