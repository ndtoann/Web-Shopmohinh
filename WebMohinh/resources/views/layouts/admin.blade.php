<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>Admin - {{ $web_title }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{ asset('vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/typicons/typicons.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/simple-line-icons/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/select2/select2.min.css') }}">
    
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    <link rel="icon" type="image/x-icon" href="{{ asset('images/admin/favicon.png') }}">
</head>

<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('js/loader.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<body>
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
            <div class="me-3">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                    data-bs-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>
            </div>
            <div>
                <a class="navbar-brand brand-logo" href="{{ route('dashboard') }}">
                    <img src="{{ asset('images/admin/logo.svg') }}" alt="logo" />
                </a>
                <a class="navbar-brand brand-logo-mini" href="{{ route('dashboard') }}">
                    <img src="{{ asset('images/admin/logo-mini.svg') }}" alt="logo" />
                </a>
            </div>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-top">
            <ul class="navbar-nav">
                <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                    <h1 class="welcome-text">Xin chào, <span
                            class="text-black fw-bold">{{ session()->get('fullname') }}</span></h1>
                    <h3 class="welcome-sub-text">Tóm tắt hiệu suất của bạn trong tuần này</h3>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item d-none d-lg-block">
                    <div id="datepicker-popup" class="input-group date datepicker navbar-date-picker">
                        <span class="input-group-addon input-group-prepend border-right">
                            <span class="icon-calendar input-group-text calendar-icon"></span>
                        </span>
                        <input type="text" class="form-control">
                    </div>
                </li>
                <li class="nav-item">
                    <form class="search-form" action="#">
                        <i class="icon-search"></i>
                        <input type="search" class="form-control" placeholder="Search Here" title="Search here">
                    </form>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link count-indicator" id="countDropdown" href="#" data-bs-toggle="dropdown">
                        <i class="icon-mail icon-lg"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0"
                        aria-labelledby="countDropdown">
                        <a class="dropdown-item py-3">
                            <p class="mb-0 font-weight-medium float-left">You have 7 unread mails </p>
                            <span class="badge badge-pill badge-primary float-right">View all</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <img src="{{ asset('images/admin/faces/face10.jpg') }}" alt="image"
                                    class="img-sm profile-pic">
                            </div>
                            <div class="preview-item-content flex-grow py-2">
                                <p class="preview-subject ellipsis font-weight-medium text-dark">Marian Garner </p>
                                <p class="fw-light small-text mb-0"> The meeting is cancelled </p>
                            </div>
                        </a>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <img src="{{ asset('images/admin/faces/face12.jpg') }}" alt="image"
                                    class="img-sm profile-pic">
                            </div>
                            <div class="preview-item-content flex-grow py-2">
                                <p class="preview-subject ellipsis font-weight-medium text-dark">David Grey </p>
                                <p class="fw-light small-text mb-0"> The meeting is cancelled </p>
                            </div>
                        </a>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <img src="{{ asset('images/admin/faces/face1.jpg') }}" alt="image"
                                    class="img-sm profile-pic">
                            </div>
                            <div class="preview-item-content flex-grow py-2">
                                <p class="preview-subject ellipsis font-weight-medium text-dark">Travis Jenkins </p>
                                <p class="fw-light small-text mb-0"> The meeting is cancelled </p>
                            </div>
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link count-indicator" id="notificationDropdown" href="#"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="icon-bell"></i>
                        <span class="count"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0"
                        aria-labelledby="notificationDropdown">
                        <a class="dropdown-item py-3 border-bottom">
                            <p class="mb-0 font-weight-medium float-left">You have 4 new notifications </p>
                            <span class="badge badge-pill badge-primary float-right">View all</span>
                        </a>
                        <a class="dropdown-item preview-item py-3">
                            <div class="preview-thumbnail">
                                <i class="mdi mdi-alert m-auto text-primary"></i>
                            </div>
                            <div class="preview-item-content">
                                <h6 class="preview-subject fw-normal text-dark mb-1">Application Error</h6>
                                <p class="fw-light small-text mb-0"> Just now </p>
                            </div>
                        </a>
                        <a class="dropdown-item preview-item py-3">
                            <div class="preview-thumbnail">
                                <i class="mdi mdi-settings m-auto text-primary"></i>
                            </div>
                            <div class="preview-item-content">
                                <h6 class="preview-subject fw-normal text-dark mb-1">Settings</h6>
                                <p class="fw-light small-text mb-0"> Private message </p>
                            </div>
                        </a>
                        <a class="dropdown-item preview-item py-3">
                            <div class="preview-thumbnail">
                                <i class="mdi mdi-airballoon m-auto text-primary"></i>
                            </div>
                            <div class="preview-item-content">
                                <h6 class="preview-subject fw-normal text-dark mb-1">New user registration</h6>
                                <p class="fw-light small-text mb-0"> 2 days ago </p>
                            </div>
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                    <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img class="img-xs rounded-circle" src="{{ asset('images/admin/faces/face8.jpg') }}"
                            alt="Profile image"> </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                        <div class="dropdown-header text-center">
                            <img class="img-md rounded-circle" src="{{ asset('images/admin/faces/face8.jpg') }}"
                                alt="Profile image">
                            <p class="mb-1 mt-3 font-weight-semibold">{{ session()->get('fullname') }}</p>
                            <p class="fw-light text-muted mb-0">{{ session()->get('email') }}</p>
                        </div>
                        <a class="dropdown-item"><i
                                class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i>Thông tin tài
                            khoản<span class="badge badge-pill badge-danger">1</span></a>
                        <a class="dropdown-item"><i
                                class="dropdown-item-icon mdi mdi-message-text-outline text-primary me-2"></i>Tin
                            nhắn</a>
                        <a href="/admin/dang-xuat" class="dropdown-item"><i
                                class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Đăng xuất</a>
                    </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                data-bs-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
    </nav>

    <div class="container-fluid page-body-wrapper">

        {{-- sidebar --}}
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        <i class="mdi mdi-view-dashboard menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item nav-category">Quản lý</li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#account" aria-expanded="false"
                        aria-controls="account">
                        <i class="menu-icon mdi mdi-account-box"></i>
                        <span class="menu-title">Tài khoản nhân viên</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="account">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="/admin/tai-khoan">Danh sách nhân viên</a>
                            </li>
                            <li class="nav-item"> <a class="nav-link" href="/admin/tai-khoan/them-tai-khoan">Thêm tài
                                    khoản</a></li>
                            <li class="nav-item"> <a class="nav-link" href="/admin/tai-khoan/doi-mat-khau">Đổi mật
                                    khẩu</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#category" aria-expanded="false"
                        aria-controls="category">
                        <i class="menu-icon mdi mdi-book-multiple"></i>
                        <span class="menu-title">Danh mục</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="category">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="/admin/danh-muc">Danh sách</a></li>
                            <li class="nav-item"> <a class="nav-link" href="/admin/danh-muc/them-danh-muc">Thêm danh
                                    mục</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#product" aria-expanded="false"
                        aria-controls="product">
                        <i class="menu-icon mdi mdi-car"></i>
                        <span class="menu-title">Sản phẩm</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="product">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="/admin/san-pham">Danh sách</a></li>
                            <li class="nav-item"> <a class="nav-link" href="/admin/san-pham/them-san-pham">Thêm sản
                                    phẩm</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#review" aria-expanded="false"
                        aria-controls="review">
                        <i class="menu-icon mdi mdi-comment-alert"></i>
                        <span class="menu-title">Đánh giá sản phẩm</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="review">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="/admin/danh-gia">Đánh giá mới</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#order" aria-expanded="false"
                        aria-controls="order">
                        <i class="menu-icon mdi mdi-file-document"></i>
                        <span class="menu-title">Đơn hàng</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="order">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="/admin/don-hang">Xem đơn hàng</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#blog" aria-expanded="false"
                        aria-controls="blog">
                        <i class="menu-icon mdi mdi-blogger"></i>
                        <span class="menu-title">Blogs</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="blog">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="/admin/blog">Danh sách blog</a></li>
                            <li class="nav-item"> <a class="nav-link" href="/admin/blog/them-blog">Thêm blog mới</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>
        {{-- end sidebar --}}

        <div class="main-panel" style="overflow-y: scroll; max-height: 100px;">

            @yield('content-admin')

            {{-- footer --}}
            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Premium <a
                            href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from
                        BootstrapDash.</span>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2021. All
                        rights reserved.</span>
                </div>
            </footer>
        </div>

    </div>

    <div class="bg-loader">
        <div id="preloader">
            <div id="loader"></div>
        </div>
    </div>

</body>

<script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>

<script src="{{ asset('vendors/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('vendors/progressbar.js/progressbar.min.js') }}"></script>
<script src="{{ asset('vendors/typeahead.js/typeahead.bundle.min.js') }}"></script>
<script src="{{ asset('vendors/select2/select2.min.js') }}"></script>

<script src="{{ asset('js/admin/off-canvas.js') }}"></script>
<script src="{{ asset('js/admin/hoverable-collapse.js') }}"></script>
<script src="{{ asset('js/admin/template.js') }}"></script>
<script src="{{ asset('js/admin/settings.js') }}"></script>
<script src="{{ asset('js/admin/todolist.js') }}"></script>

<script src="{{ asset('js/admin/select2.js') }}"></script>

<script src="{{ asset('js/admin/dashboard.js') }}"></script>
<script src="{{ asset('js/admin/Chart.roundedBarCharts.js') }}"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

</html>
