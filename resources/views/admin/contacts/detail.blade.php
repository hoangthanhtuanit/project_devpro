@extends('admin.layouts.index')
@section('title', 'Chi tiết liên hệ')

@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1"></h2>
                            <a class="au-btn au-btn-icon btn-primary" href="{{ url('admin/contact/index') }}">
                                <i class="fas fa-arrow-alt-circle-left"></i>Quay lại
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Chi tiết</strong> liên hệ
                            </div>
                            <div class="card-body card-block">
                                <form action="" method="post" class="form-horizontal">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Tên người liên hệ</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="full_name" value="{{ $contact->full_name }}"
                                                   class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Email</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="email" value="{{ $contact->email }}"
                                                   class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Tiêu đề</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="title" value="{{ $contact->title }}"
                                                   class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Nội dung</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <textarea name="message" id="" class="form-control" rows="5" disabled>{{ $contact->message }}</textarea>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Ngày nhận</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="title" value="{{ date('H:i:s d/m/Y', strtotime($contact->created_at)) }}"
                                                   class="form-control" disabled>
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
