@extends('admin.layouts.index')
@section('title','Danh sách đánh giá')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="table-data__tool">
            <div class="table-data__tool-left"></div>
            <div class="table-data__tool-right">
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header">
                <strong>Danh sách</strong> đánh giá
            </div>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr style="text-align: center;">
                            <th>ID</th>
                            <th>Tên người đánh giá</th>
                            <th>Tiêu đề</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($feedbacks as $feedback)
                            <tr>
                                <td>{{ $feedback->id }}</td>
                                <td>{{ $feedback->full_name }}</td>
                                <td>{{ $feedback->title }}</td>
                                <td>
                                    @php
                                        $link_detail = 'admin/feedback/detail/' . $feedback->id;
                                        $link_delete = 'admin/feedback/delete/' . $feedback->id;
                                    @endphp
                                    <div class="table-data-feature">
                                        <a class="item" href="{{ url($link_detail) }}" title="Xem chi tiết">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a onclick="return confirm('Bạn có muốn tiếp tục xóa không?')" class="item"
                                           href="{{ url($link_delete) }}" title="Xóa">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
