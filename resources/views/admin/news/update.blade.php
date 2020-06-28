@extends('admin.layouts.index')
@section('title', 'Cập nhật tin tức')

@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1"></h2>
                            <a class="au-btn au-btn-icon btn-primary" href="{{ url('admin/new/index') }}">
                                <i class="fas fa-arrow-alt-circle-left"></i>Quay lại
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Thêm mới</strong> slide
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        <span>{{ $error }}</span>
                                    @endforeach
                                </div>
                            @endif
                            <div class="card-body card-block">
                                <form action="{{ url('admin/new/update', ['id' => $new->id]) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Tiêu đề (<span
                                                    style="color: red;">*</span>)</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" value="{{ old('title') ? old('title') : $new->title }}" name="title" placeholder="Nhập tiêu đề"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Ảnh (<span
                                                    style="color: red;">*</span>)</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <p><img width="250" height="100" src="{{ asset('/uploads/news/' . $new->image) }}" alt=""></p>
                                            <input type="file" id="text-input" name="image" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Mô tả (<span
                                                    style="color: red;">*</span>)</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" value="{{ old('summary') ? old('summary') : $new->summary }}" name="summary" placeholder="Nhập mô tả"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Nội dung</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="content" value="{{ old('content') ? old('content') : $new->content }}" placeholder="Nhập nội dung tin"
                                                   class="form-control">
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
                                                switch ($new->status) {
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
                                            <input type="reset" class="btn btn-danger btn-xs" name="reset" value="Nhập lại">
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
