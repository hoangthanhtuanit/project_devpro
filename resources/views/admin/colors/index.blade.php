@extends('admin.layouts.index')
@section('title','Danh sách danh mục')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="table-data__tool">
            <div class="table-data__tool-left"></div>
            <div class="table-data__tool-right">
                <a href="{{ url('admin/color/create') }}"
                   class="au-btn au-btn-icon au-btn--green au-btn--small">
                    <i class="fa fa-plus"></i>Thêm mới
                </a>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header">
                <strong>Danh sách</strong> màu
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
                            <th>Màu</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($colors as $color)
                            <tr>
                                <td>{{ $color->id }}</td>
                                <td>{{ $color->color }}</td>
                                <td>
                                    @php
                                        $link_detail = 'admin/color/detail/' . $color->id;
                                        $link_update = 'admin/color/update/' . $color->id;
                                        $link_delete = 'admin/color/delete/' . $color->id;
                                    @endphp
                                    <div class="table-data-feature">
                                        <a class="item" href="{{ url($link_detail) }}" title="Xem chi tiết">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a class="item" href="{{ url($link_update) }}" title="Sửa">
                                            <i class="fas fa-edit"></i>
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
