<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    <base href="{{ asset('') }}">
    <!-- Custom fonts for this template-->
    <link href="admin_assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="admin_assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="admin_assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="admin_assets/css/theme.css">
</head>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
    @include('admin.layouts.sidebar_left')
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
            @include('admin.layouts.header')
                <!-- Begin Page Content -->
                {{--<div class="container-fluid">--}}
                    @yield('content')
                {{--</div>--}}
            </div>
            @include('admin.layouts.footer')
        </div>
        <!-- End of Main Content -->
    </div>
<!-- End of Content Wrapper -->
<!-- End of Page Wrapper -->
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Chọn có để tiếp tục, không để trở về</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Không</button>
                <a class="btn btn-primary" href="{{ url('admin/logout') }}">Có</a>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap core JavaScript-->
<script src="admin_assets/vendor/jquery/jquery.min.js"></script>
<script src="admin_assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="admin_assets/vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="admin_assets/js/sb-admin-2.min.js"></script>
<!-- DataTable JavaScript-->
<script src="admin_assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="admin_assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<!-- My JavaScript-->
<script src="admin_assets/js/myadmin-js.js"></script>
<!-- Page level plugins -->
<script src="admin_assets/vendor/chart.js/Chart.min.js"></script>
<!-- Page level custom scripts -->
<script src="admin_assets/js/demo/chart-area-demo.js"></script>
<script src="admin_assets/js/demo/chart-pie-demo.js"></script>
    <script src={{ url('ckeditor/ckeditor.js') }}></script>
    <script>
        CKEDITOR.replace( 'text1', {
            filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',

        } );
    </script>
    @include('ckfinder::setup')
    @yield('script')
</body>
</html>
