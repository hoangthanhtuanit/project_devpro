@extends('admin.layouts.index')
@section('title', 'Cập nhật tài khoản')

@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1"></h2>
                            <a class="au-btn au-btn-icon btn-primary" href="{{ url('admin/user/index') }}">
                                <i class="fas fa-arrow-alt-circle-left"></i>Quay lại
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Cập nhật</strong> tài khoản
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        <span>{{ $error }}</span>
                                    @endforeach
                                </div>
                            @endif
                            <div class="card-body card-block">
                                <form action="{{ url('admin/product/update', ['id' => $product->id]) }}" method="post"
                                      class="form-horizontal" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Danh mục sản phẩm (<span
                                                    style="color: red;">*</span>)</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="category_id" id="" class="form-control">
                                                @foreach($categories as $category)
                                                    <option
                                                        @if ($product->categories->id == $category->id)
                                                        {{"selected"}}
                                                        @endif
                                                        value="{{$category->id}}">{{$category->name}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Tên sản phẩm (<span
                                                    style="color: red;">*</span>)</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" value="{{ old('name') ? old('name') : $product->name }}" name="name" placeholder="Tên sản phẩm"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Ảnh sản phẩm (<span
                                                    style="color: red;">*</span>)</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="text-input" name="image" placeholder=""
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Giá sản phẩm (<span
                                                    style="color: red;">*</span>)</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" value="{{ old('price') ? old('price') : $product->price }}" name="price" placeholder="Nhập lại mật khẩu"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Khuyến mãi</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" value="{{ old('sale') ? old('sale') : $product->sale }}" name="sale" placeholder="Nhập lại mật khẩu"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Số lượng (<span
                                                    style="color: red;">*</span>)</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" value="{{ old('quantity') ? old('quantity') : $product->quantity }}" name="quantity" placeholder="Giá sản phẩm"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Mô tả ngắn (<span
                                                    style="color: red;">*</span>)</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" value="{{ old('summary') ? old('summary') : $product->summary }}" name="summary" placeholder="Mô tả sản phẩm"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Mô tả chi tiết (<span
                                                    style="color: red;">*</span>)</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <textarea name="content" id="text1" cols="30" rows="10" class="form-control">{{ old('content') ? old('content') : $product->content }}</textarea>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="select" class=" form-control-label">Trạng thái</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            @php
                                                $selected_dis = '';
                                                $selected_act = '';
                                                switch ($product->status) {
                                                    case 0: $selected_dis = 'selected'; break;
                                                    case 1: $selected_act = 'selected'; break;
                                                }
                                            @endphp
                                            <select name="status" id="select" class="form-control">
                                                <option value="0" {{ $selected_dis }}>Disable</option>
                                                <option value="1" {{ $selected_act }}>Active</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-12 text-center">
                                            <input type="submit" class="btn btn-primary btn-xs" name="submit"
                                                   value="Lưu">
                                            <input type="reset" class="btn btn-danger btn-xs" name="reset"
                                                   value="Nhập lại">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $("#changePassword").change(function () {
                if ($(this).is(":checked")) {
                    $(".password").removeAttr('disabled');
                } else {
                    $(".password").attr('disabled', '');
                }
            });
        });
    </script>
@endsection
