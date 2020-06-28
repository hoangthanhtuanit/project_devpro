<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Trang quản trị admin</title>
        <base href="{{ asset('') }}">
        <!-- Custom fonts for this template-->
        <link href="admin_assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <!-- Custom styles for this template-->
        <link href="admin_assets/css/sb-admin-2.min.css" rel="stylesheet">
        <link href="admin_assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    </head>
    <body class="bg-gradient-primary">
        <div class="container">
            <!-- Outer Row -->
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-12 col-md-9">
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-5 d-none d-lg-block bg-login-image"><img src="public/images/login1.jpg" height="400px" width="300px" alt=""></div>
                                <div class="col-lg-7">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Chào mừng đến với trang quản trị TUAN SNEAKERS</h1>
                                        </div>
                                        @if(count($errors) > 0)
                                            <div class="alert alert-danger">
                                                @foreach($errors->all() as $err)
                                                    {{$err}}<br>
                                                @endforeach
                                            </div>
                                        @endif

                                        <form class="user" action="{{ url('admin/login') }}" method="post">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            <div class="form-group">
                                                <input type="email" class="form-control form-control-user" name="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Nhập địa chỉ email...">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-user" name="password" id="exampleInputPassword" placeholder="Mật khẩu">
                                            </div>
                                            <div class="form-group">
                                                <!-- <div class="custom-control custom-checkbox small">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck">
                                                    <label class="custom-control-label" for="customCheck">Remember Me</label>
                                                </div> -->
                                            </div>
                                            <button class="btn btn-primary btn-user" style="margin-left: 165px;">
                                            Đăng nhập
                                            </button>
                                            <!-- <hr>
                                            <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                            </a>
                                            <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                            </a> -->
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JavaScript-->
        <script src="admin_asset/vendor/jquery/jquery.min.js"></script>
        <script src="admin_asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Core plugin JavaScript-->
        <script src="admin_asset/vendor/jquery-easing/jquery.easing.min.js"></script>
        <!-- Custom scripts for all pages-->
        <script src="admin_asset/js/sb-admin-2.min.js"></script>
        <!-- DataTable JavaScript-->
        <script src="admin_asset/vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="admin_asset/vendor/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- My JavaScript-->
        <script src="admin_asset/js/myadmin-js.js"></script>
        <!-- Page level plugins -->
        <script src="admin_asset/vendor/chart.js/Chart.min.js"></script>
        <!-- Page level custom scripts -->
        <script src="admin_asset/js/demo/chart-area-demo.js"></script>
        <script src="admin_asset/js/demo/chart-pie-demo.js"></script>
    </body>
</html>
