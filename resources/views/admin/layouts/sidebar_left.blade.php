<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('dashboard') }}">

        <div class="sidebar-brand-text mx-6">Tuan Sneakers</div>
    </a>
<!-- Divider -->
    @php
    $dashboard = Request::is('admin/dashboard/*') ? 'active' : '';
    $category = Request::is('admin/category/*') ? 'active' : '';
    $product = Request::is('admin/product/*') ? 'active' : '';
    $order = Request::is('admin/order/*') ? 'active' : '';
    $new = Request::is('admin/new/*') ? 'active' : '';
    $user = Request::is('admin/user/*') ? 'active' : '';
    $feedback = Request::is('admin/feedback/*') ? 'active' : '';
    $contact = Request::is('admin/contact/*') ? 'active' : '';
    $slide = Request::is('admin/slide/*') ? 'active' : '';
    $inventory = Request::is('admin/inventory/*') ? 'active' : '';
    $statistical = Request::is('admin/statistical/*') ? 'active' : '';
    $size = Request::is('admin/size/*') ? 'active' : '';
    $color = Request::is('admin/color/*') ? 'active' : '';
    @endphp
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ $dashboard }}">
        <a class="nav-link" href="{{ url('admin/dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Trang tổng quan</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ $category }}">
        <a class="nav-link" href="{{ url('admin/category/index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Quản lý danh mục</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ $product }}">
        <a class="nav-link" href="{{ url('admin/product/index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Quản lý sản phẩm</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ $color }}">
        <a class="nav-link" href="{{ url('admin/color/index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Quản lý màu sản phẩm</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ $size }}">
        <a class="nav-link" href="{{ url('admin/size/index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Quản lý size</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ $order }}">
        <a class="nav-link" href="{{ url('admin/order/index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Quản lý đơn hàng</a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ $new }}">
        <a class="nav-link" href="{{ url('admin/new/index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Quản lý tin tức</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ $user }}">
        <a class="nav-link" href="{{ url('admin/user/index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Quản lý người dùng</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ $feedback }}">
        <a class="nav-link" href="{{ url('admin/feedback/index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Đánh giá</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ $contact }}">
        <a class="nav-link" href="{{ url('admin/contact/index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Liên hệ</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ $slide }}">
        <a class="nav-link" href="{{ url('admin/slide/index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Quản lý Slide</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ $inventory }}">
        <a class="nav-link" href="{{ url('admin/inventory/index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Hàng tồn kho</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ $statistical }}">
        <a class="nav-link" href="{{ url('admin/statistical/index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Thống kê doanh thu</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
