@extends('admin.layouts.index')
@section('title','Danh sách sản phẩm')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="table-data__tool">
            <div class="table-data__tool-left"></div>
            <div class="table-data__tool-right">
                <a href="{{ url('admin/product/create') }}"
                   class="au-btn au-btn-icon au-btn--green au-btn--small">
                    <i class="fa fa-plus"></i>Thêm mới
                </a>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header">
                <strong>Danh sách</strong> tin tức
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
                            <th>Tên sản phẩm</th>
                            <th>Ảnh sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Trạng thái</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody style="text-align: center">
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>
                                    <img src="{{ asset('/uploads/products/' . $product->image) }}" width="200" height="50" alt="">
                                </td>
                                <td>{{ number_format($product->price, 0, '.', '.') }} VNĐ</td>
                                <td>{{ $product->quantity }}</td>
                                <td>
                                    @php
                                        $status_text = '';
                                        switch ($product->status) {
                                        case 0:
                                            $status_text = 'Disable';
                                            break;
                                        case 1:
                                            $status_text = 'Active';
                                            break;
                                        }
                                    echo $status_text;
                                    @endphp
                                </td>
                                <td>
                                    @php
                                        $link_detail = 'admin/product/detail/' . $product->id;
                                        $link_update = 'admin/product/update/' . $product->id;
                                        $link_delete = 'admin/product/delete/' . $product->id;
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
