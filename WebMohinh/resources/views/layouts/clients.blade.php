<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    {{-- <title>Mebook.vn - Nhà sách trên mạng</title> --}}
    <title>{{ config('app.name', 'Laravel') . ' - ' . $web_title }}</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon-32x32.webp') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<!-- ================================================ -->
<script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('js/loader.js') }}"></script>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<!-- ================================================ -->

<body>
    <header class="header">
        <div class="container">
            <div class="header-bar">
                <p class="item">
                    <i class="fa-solid fa-circle-check"></i>
                    Hơn 1.500 Mẫu Mã
                </p>
                <p class="item">
                    <i class="fa fa-truck"></i>
                    Giao Hàng Toàn Quốc
                </p>
                <p class="item">
                    <i class="fa fa-tag"></i>
                    Tích Lũy Điểm Thưởng
                </p>
            </div>
            <div class="row">
                <div class="logo col-lg-2">
                    <a class="img-logo" href="{{ route('home') }}">
                        <img src="{{ asset('images/logo.webp') }}" alt="Logo">
                    </a>

                    <div class="mobile">
                        <div class="cart-mobile">
                            <a href="{{ route('cart.list') }}" title="Giỏ hàng">
                                <i class="fa-solid fa-cart-shopping icon-cart"></i>
                            </a>
                        </div>

                        <div class="icon-menu">
                            <i class="fa fa-bars"></i>
                        </div>
                    </div>
                </div>
                <div class="header-time">
                    <p>Giờ mở cửa: <span>8:30 - 21:00</span></p>
                </div>
                <div class="search-mobile">
                    <form action="/tim-kiem" method="get" class="form">
                        <input class="input-search" type="text" name="s" placeholder="Tìm kiếm sản phẩm"
                            required>
                        <button type="submit" class="btn-search">
                            <i class="fa-solid fa-magnifying-glass icon-search"></i>
                        </button>
                    </form>
                </div>

                <div class="show-search col-lg-8">
                    <div class="form-search">
                        <form action="/tim-kiem" method="get" class="form">
                            <input class="input-search" type="text" name="s" placeholder="Tìm kiếm" required>
                            <button type="submit" class="btn-search">
                                <i class="fa-solid fa-magnifying-glass icon-search"></i>
                            </button>
                        </form>
                    </div>
                    <div class="hotline">
                        <a href="tel:0123456789" title="Hotline">
                            <p class="">8:30 - 21:00</p>
                            <p class="number-phone">
                                <i class="fa-solid fa-phone icon-phone"></i>
                                0123456789
                            </p>
                        </a>
                    </div>
                </div>
                <div class="cart col-lg-2">
                    <a href="{{ route('cart.list') }}" title="Giỏ hàng">
                        Giỏ hàng<i class="fa-solid fa-cart-shopping icon-cart"></i>
                    </a>
                </div>
            </div>
        </div>

        <nav class="nav">
            <div class="container">
                <ul class="main-menu">
                    @foreach ($categoryList as $item)
                        <li class="nav-item has-child">
                            <a href="{{ route('product', $item->id) }}">
                                <span class="nav-img"><img src="{{ asset('uploads/category/' . $item->image_cate) }}"
                                        alt=""></span>
                                {{ $item->name_cate }}
                            </a>
                            <ul class="sub-nav">
                                @foreach ($productList as $product)
                                    @if ($product->category_id == $item->id)
                                        <li class="sub-nav-item"><a
                                                href="{{ route('product.detail', $product->id) }}">{{ $product->name_prd }}</a>
                                        </li>
                                    @endif
                                @endforeach
                                <img src="{{ asset('uploads/category/' . $item->banner) }}" alt="">
                            </ul>
                        </li>
                    @endforeach
                    <li class="nav-item">
                        <a href="{{ route('blog') }}">
                            <span class="nav-img"><img src="{{ asset('images/blog.webp') }}" alt=""></span>
                            Blog
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="menu-mobile">
        <div class="header-menu">
            <i class="fa-sharp fa-regular fa-circle-xmark close-menu"></i>
            <h4 class="title">Chào bạn</h4>
        </div>
        @foreach ($categoryList as $item)
            <li class="nav-item category">
                <a class="nav-link" href="{{ route('product', $item->id) }}">
                    <span class="menu-title">
                        {{ $item->name_cate }}
                        <img class="img" src="{{ asset('uploads/category/'.$item->image_cate) }}" alt="">
                    </span>
                </a>
            </li>
        @endforeach
        <li class="nav-item category">
            <a class="nav-link" href="{{ route('blog') }}">
                <span class="menu-title">
                    Blog
                    <img class="img" src="{{ asset('images/blog.webp') }}" alt="">
                </span>
            </a>
        </li>
        <br>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('cart.list') }}">
                <span class="menu-title">Giỏ hàng</span>
                <i class="fa-solid fa-cart-shopping icon-cart"></i>
            </a>
        </li>
    </div>

    <main class="main-content">
        @yield('content')
    </main>

    <footer>
        <div class="newsletter">
            <div class="container text-center">
                <h2 class="title">Đăng ký nhận tin</h2>
                <p class="sub-title">Với chính sách không SPAM khách hàng,
                    Quý Khách hãy yên tâm để lại email để nhận những thông tin về hàng mới,
                    hoặc những chương trình khuyến mãi hấp dẫn đến từ Bán Mô Hình Tĩnh nhé!</p>
                <div class="form-newsletter">
                    <form class="form" action="" method="POST">
                        <input class="input" type="text" placeholder="Vui lòng nhập email của bạn" required>
                        <button class="btn-submit" type="button">Gửi</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="socials text-center">
            <a class="face-share" target="_blank" href="" title="Facebook"><i
                    class="fa-brands fa-square-facebook"></i></a>
            <a class="ins-share" target="_blank" href="" title="Instagram"><i
                    class="fa-brands fa-instagram"></i></a>
            <a class="youtu-share" target="_blank" href="" title="Youtube"><i
                    class="fa-brands fa-youtube"></i></a>
        </div>

        <div class="brand">
            <div class="container text-center">
                <h2 class="title">
                    <i class="fa fa-star icon_before"></i>
                    <span>Đối tác</span>
                    <i class="fa fa-star icon_before"></i>
                </h2>
                <div class="brand-slider">
                    <div class="item">
                        <a href="#"><img src="{{ asset('images/brands/brand_items_1.webp') }}"
                                alt="Brand"></a>
                    </div>
                    <div class="item">
                        <a href="#"><img src="{{ asset('images/brands/brand_items_2.webp') }}"
                                alt="Brand"></a>
                    </div>
                    <div class="item">
                        <a href="#"><img src="{{ asset('images/brands/brand_items_3.webp') }}"
                                alt="Brand"></a>
                    </div>
                    <div class="item">
                        <a href="#"><img src="{{ asset('images/brands/brand_items_4.webp') }}"
                                alt="Brand"></a>
                    </div>
                    <div class="item">
                        <a href="#"><img src="{{ asset('images/brands/brand_items_5.webp') }}"
                                alt="Brand"></a>
                    </div>
                    <div class="item">
                        <a href="#"><img src="{{ asset('images/brands/brand_items_6.webp') }}"
                                alt="Brand"></a>
                    </div>
                    <div class="item">
                        <a href="#"><img src="{{ asset('images/brands/brand_items_7.webp') }}"
                                alt="Brand"></a>
                    </div>
                    <div class="item">
                        <a href="#"><img src="{{ asset('images/brands/brand_items_8.webp') }}"
                                alt="Brand"></a>
                    </div>
                    <div class="item">
                        <a href="#"><img src="{{ asset('images/brands/brand_items_9.webp') }}"
                                alt="Brand"></a>
                    </div>
                    <div class="item">
                        <a href="#"><img src="{{ asset('images/brands/brand_items_10.webp') }}"
                                alt="Brand"></a>
                    </div>
                    <div class="item">
                        <a href="#"><img src="{{ asset('images/brands/brand_items_11.png') }}"
                                alt="Brand"></a>
                    </div>
                    <div class="item">
                        <a href="#"><img src="{{ asset('images/brands/brand_items_12.webp') }}"
                                alt="Brand"></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <h4 class="footer-title">
                            <img src="{{ asset('images/logo.webp') }}" alt="Logo">
                        </h4>
                        <div class="footer-content">
                            <p>Giờ Mở Cửa: 8:30 - 21:00 (Mỗi Ngày)</p>
                            <ul>
                                <li>
                                    <i class="fa-sharp fa-solid fa-location-dot"></i>
                                    Yên Hòa - Cầu Giấy -Việt Nam
                                </li>
                                <li>
                                    <i class="fa-solid fa-phone"></i>
                                    0123456789; 0987654321
                                    ( Zalo, Viber)
                                </li>
                                <li>
                                    <i class="fa-solid fa-envelope"></i>
                                    hotro@mohinhxin.com
                                </li>
                                <li>
                                    <i class="fa-sharp fa-solid fa-globe"></i>
                                    <a href="/">www.mohinhxin.com</a>
                                </li>
                                <li>
                                    <img src="{{ asset('images/bocongthuong.webp') }}" alt="Bộ công thương">
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <h4 class="footer-title">Thông Tin Công Ty</h4>
                        <div class="footer-content">
                            <ul>
                                <li><a href="">About us</a></li>
                                <li><a href="">Thông tin liên hệ</a></li>
                                <li><a href="">Tuyển dụng</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <h4 class="footer-title">Chính Sách</h4>
                        <div class="footer-content">
                            <ul>
                                <li><a href="">Chương trình tích điểm</a></li>
                                <li><a href="">Chính sách đổi trả hàng</a></li>
                                <li><a href="">Chính sách giao hàng</a></li>
                                <li><a href="">Chính sách vận chuyển</a></li>
                                <li><a href="">Chính sách bảo mật</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <h4 class="footer-title">Hỗ Trợ Khách Hàng</h4>
                        <div class="footer-content">
                            <ul>
                                <li><a href="">Phương thức thanh toán</a></li>
                                <li><a href="">Thanh toán trả góp</a></li>
                                <li><a href="">Tìm hiểu kích thước và tỷ lệ xe mô hình</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bottom-footer">
            <div class="container text-center">
                <p>HKD: Ngxxx Đxxx Txxx - MSDN: xxxx do ... cấp ngày .. tháng .. năm ....</p>
                <p>Copyright © 2023</p>
            </div>
        </div>
    </footer>

    <div class="bg-loader">
        <div id="preloader">
            <div id="loader"></div>
        </div>
    </div>
</body>

<script src="{{ asset('js/app.js') }}"></script>




</html>
