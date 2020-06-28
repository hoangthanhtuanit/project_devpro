@extends('admin.layouts.index')
@section('title', 'Chi tiết slide')

@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1"></h2>
                            <a class="au-btn au-btn-icon btn-primary" href="{{ url('admin/slide/index') }}">
                                <i class="fas fa-arrow-alt-circle-left"></i>Quay lại
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Chi tiết</strong> slide
                            </div>
                            <div class="card-body card-block">
                                <form action="" method="post" class="form-horizontal">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Tiêu đề</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="title" value="{{ $slide->title }}"
                                                   class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Ảnh</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <img width="250" height="100" src="{{ asset('/uploads/slides/' . $slide->image) }}" alt="">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Mô tả</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" value="{{ $slide->summary }}" name="summary" placeholder="Nhập mô tả"
                                                   class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Vị trí hiển thị</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="position" value="{{ $slide->position }}"
                                                   class="form-control" disabled>
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
                                                switch ($slide->status) {
                                                    case 0: $selected_dis = 'selected'; break;
                                                    case 1: $selected_act = 'selected'; break;
                                                }
                                            @endphp
                                            <select name="status" id="select" class="form-control" disabled>
                                                <option value="0" {{ $selected_dis }}>Disable</option>
                                                <option value="1" {{ $selected_act }}>Active</option>
                                            </select>
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
