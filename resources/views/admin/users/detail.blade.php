@extends('admin.layouts.index')
@section('title', 'Chi tiết người dùng')

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
                                <strong>Chi tiết</strong> người dùng
                            </div>
                            <div class="card-body card-block">
                                <form action="" method="post" class="form-horizontal">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Tên người dùng</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="name" value="{{ $user->first_name . ' ' . $user->last_name }}"
                                                   class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Ảnh</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <img width="250" height="100" src="{{ asset('/uploads/users/' . $user->avatar) }}" alt="">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Email</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" value="{{ $user->email }}" name="summary" placeholder="Nhập mô tả"
                                                   class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Mật khẩu</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="content" value="{{ $user->password }}"
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
                                                switch ($user->status) {
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
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="select" class=" form-control-label">Trạng thái</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            @php
                                                $selected_adm = '';
                                                $selected_emp = '';
                                                $selected_cus = '';
                                                switch ($user->level) {
                                                    case 0: $selected_cus = 'selected'; break;
                                                    case 1: $selected_emp = 'selected'; break;
                                                    case 2: $selected_adm = 'selected'; break;
                                                }
                                            @endphp
                                            <select name="status" id="select" class="form-control" disabled>
                                                <option value="0" {{ $selected_cus }}>Khách hàng</option>
                                                <option value="1" {{ $selected_emp }}>Nhân viên</option>
                                                <option value="2" {{ $selected_adm }}>Quản trị viên</option>
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
