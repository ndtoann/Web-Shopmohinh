@extends('layouts.clients')

@section('content')
    <div class="slider">
        <div class="slider_item">
            <div class="img">
                <a href=""><img src="{{ asset('images/slide/slideshow_1.webp') }}" alt=""></a>
            </div>
        </div>
        <div class="slider_item">
            <div class="img">
                <a href=""><img src="{{ asset('images/slide/slideshow_2.webp') }}" alt=""></a>
            </div>
        </div>
        <div class="slider_item">
            <div class="img">
                <a href=""><img src="{{ asset('images/slide/slideshow_3.webp') }}" alt=""></a>
            </div>
        </div>
        <div class="slider_item">
            <div class="img">
                <a href=""><img src="{{ asset('images/slide/slideshow_4.webp') }}" alt=""></a>
            </div>
        </div>
        <div class="slider_item">
            <div class="img">
                <a href=""><img src="{{ asset('images/slide/slideshow_5.webp') }}" alt=""></a>
            </div>
        </div>
        <div class="slider_item">
            <div class="img">
                <a href=""><img src="{{ asset('images/slide/slideshow_9.webp') }}" alt=""></a>
            </div>
        </div>
    </div>

    <div class="home-privacy">
        <div class="container">
            <div class="slide-home-privacy">
                <div class="item">
                    <a href="#" class="link-item">
                        <div class="imgs">
                            <img src="{{ asset('images/home-privacy/privacy_1.webp') }}" alt="">
                        </div>
                        <div class="content">
                            <p class="title">Uy tín hàng đầu</p>
                            <span class="sub-title">Cửa hàng mô hình lớn nhất Việt Nam</span>
                        </div>
                    </a>
                </div>
                <div class="item">
                    <a href="#" class="link-item">
                        <div class="imgs">
                            <img src="{{ asset('images/home-privacy/privacy_2.webp') }}" alt="">
                        </div>
                        <div class="content">
                            <p class="title">Miễn phí đổi trả</p>
                            <span class="sub-title">Miễn phí đổi trả khi sản phẩm gặp vấn đề</span>
                        </div>
                    </a>
                </div>
                <div class="item">
                    <a href="#" class="link-item">
                        <div class="imgs">
                            <img src="{{ asset('images/home-privacy/privacy_3.webp') }}" alt="">
                        </div>
                        <div class="content">
                            <p class="title">Sản phẩm đa dạng</p>
                            <span class="sub-title">Luôn cập nhật những sản phẩm mới nhất</span>
                        </div>
                    </a>
                </div>
                <div class="item">
                    <a href="#" class="link-item">
                        <div class="imgs">
                            <img src="{{ asset('images/home-privacy/privacy_4.webp') }}" alt="">
                        </div>
                        <div class="content">
                            <p class="title">Giao hàng trong 1 giờ</p>
                            <span class="sub-title">Giao hàng nhanh chóng và tiện lợi</span>
                        </div>
                    </a>
                </div>
                <div class="item">
                    <a href="#" class="link-item">
                        <div class="imgs">
                            <img src="{{ asset('images/home-privacy/privacy_5.webp') }}" alt="">
                        </div>
                        <div class="content">
                            <p class="title">Tích lũy điểm thưởng</p>
                            <span class="sub-title">Ưu đãi hấp dẫn dành cho khách hàng thân thiết</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="container">
            <div class="product-new">
                <h2 class="title text-center">
                    <i class="fa fa-star icon_before"></i>
                    <span>Sản phẩm mới</span>
                    <i class="fa fa-star icon_before"></i>
                </h2>
                <div class="banner">
                    <img src="{{ asset('images/collection_one_banner.jpg') }}" alt="">
                </div>
                <!-- Tab links -->
                <div class="tabs text-center">
                    <button class="tablinks active" data-electronic="car">Ô tô</button>
                    <button class="tablinks" data-electronic="motor">Mô tô</button>
                    <button class="tablinks" data-electronic="plane">Máy bay</button>
                </div>

                <!-- Tab content -->
                <div class="wrapper_tabcontent">
                    <div id="car" class="tabcontent active">
                        <div class="tabcontent-product">
                            @foreach ($carList as $item)
                                <div class="item" title="Text">
                                    <img class="gift" src="{{ asset('images/gift.webp') }}" alt="new">
                                    <img class="new" src="{{ asset('images/new.webp') }}" alt="new">
                                    <a href="{{ route('product.detail', $item->id) }}">
                                        <img src="{{ asset('uploads/product/' . $item->image_prd) }}" alt="">
                                        <h4 class="name">{{ $item->name_prd }}</h4>
                                    </a>
                                    <p class="price">{{ number_format($item->price) }} <sup>đ</sup></p>
                                </div>
                            @endforeach
                        </div>
                        <div class="text-center">
                            <a href="{{ route('product', 1) }}" class="more">Xem tất cả</a>
                        </div>
                    </div>

                    <div id="motor" class="tabcontent">
                        <div class="tabcontent-product ">
                            @foreach ($motorList as $item)
                                <div class="item" title="Text">
                                    <img class="gift" src="{{ asset('images/gift.webp') }}" alt="new">
                                    <img class="new" src="{{ asset('images/new.webp') }}" alt="new">
                                    <a href="{{ route('product.detail', $item->id) }}">
                                        <img src="{{ asset('uploads/product/' . $item->image_prd) }}" alt="">
                                        <h4 class="name">{{ $item->name_prd }}</h4>
                                    </a>
                                    <p class="price">{{ number_format($item->price) }} <sup>đ</sup></p>
                                </div>
                            @endforeach
                        </div>
                        <div class="text-center">
                            <a href="{{ route('product', 3) }}" class="more">Xem tất cả</a>
                        </div>
                    </div>

                    <div id="plane" class="tabcontent">
                        <div class="tabcontent-product ">
                            @foreach ($planeList as $item)
                                <div class="item" title="Text">
                                    <img class="gift" src="{{ asset('images/gift.webp') }}" alt="new">
                                    <img class="new" src="{{ asset('images/new.webp') }}" alt="new">
                                    <a href="{{ route('product.detail', $item->id) }}">
                                        <img src="{{ asset('uploads/product/' . $item->image_prd) }}" alt="">
                                        <h4 class="name">{{ $item->name_prd }}</h4>
                                    </a>
                                    <p class="price">{{ number_format($item->price) }} <sup>đ</sup></p>
                                </div>
                            @endforeach
                        </div>
                        <div class="text-center">
                            <a href="{{ route('product', 5) }}" class="more">Xem tất cả</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="index-order">
                <h2 class="title text-center">
                    <i class="fa fa-star icon_before"></i>
                    <span>Góc nhận order</span>
                    <i class="fa fa-star icon_before"></i>
                </h2>
                <div class="banner">
                    <img src="{{ asset('images/index_orderbanner.webp') }}?" alt="">
                </div>
                <div class="order-list">
                    @foreach ($orderProducts as $item)
                        <div class="item" title="Text">
                            <img class="order" src="{{ asset('images/order.webp') }}" alt="order">
                            <a href="{{ route('product.detail', $item->id, $item->id) }}">
                                <img src="{{ asset('uploads/product/' . $item->image_prd) }}" alt="product">
                                <h4 class="name">{{ $item->name_prd }}</h4>
                            </a>
                            <p class="price">{{ number_format($item->price) }} <sup>đ</sup></p>
                        </div>
                    @endforeach
                </div>
                <div class="text-center">
                    <a href="#" class="more">Xem tất cả</a>
                </div>
            </div>
        </div>
    </section>

    <div class="collections">
        <div class="container">
            <h2 class="title">
                <i class="fa fa-star icon_before"></i>
                <span>Bộ sưu tập</span>
                <i class="fa fa-star icon_before"></i>
            </h2>
            <a href="#" class="item">
                <img src="{{ asset('images/collections/index_shopby_1.webp') }}" alt="">
                <span>Lamborghini</span>
            </a>
            <a href="#" class="item">
                <img src="{{ asset('images/collections/index_shopby_2.webp') }}" alt="">
                <span>Mercedes-Benz</span>
            </a>
            <a href="#" class="item">
                <img src="{{ asset('images/collections/index_shopby_3.webp') }}" alt="">
                <span>Ducati</span>
            </a>
            <a href="#" class="item">
                <img src="{{ asset('images/collections/index_shopby_4.webp') }}" alt="">
                <span>Siêu xe</span>
            </a>
            <a href="#" class="item">
                <img src="{{ asset('images/collections/index_shopby_5.webp') }}" alt="">
                <span>Xe bán tải</span>
            </a>
            <a href="#" class="item">
                <img src="{{ asset('images/collections/index_shopby_6.webp') }}" alt="">
                <span>Xe cổ</span>
            </a>
            <a href="#" class="item">
                <img src="{{ asset('images/collections/index_shopby_7.webp') }}" alt="">
                <span>Xe cảnh sát</span>
            </a>
            <a href="#" class="item">
                <img src="{{ asset('images/collections/index_shopby_8.webp') }}" alt="">
                <span>Xe độ</span>
            </a>
        </div>
    </div>
@endsection
