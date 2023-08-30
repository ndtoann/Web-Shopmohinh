@extends('layouts.clients')

@section('content')
    <section class="productdetail-page">
        <div class="container">
            <div class="product-detail-wrapper row">
                <div class="slide-img-product col-lg-8">
                    <div class="gallery-container">
                        <div class="swiper-container gallery-main">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="{{ asset('uploads/product/' . $productDetail->image_prd) }}" alt="image">
                                </div>
                                @foreach ($productImgList as $item)
                                    <div class="swiper-slide">
                                        <img src="{{ asset('uploads/product/' . $item->img) }}" alt="image">
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                        <div class="swiper-container gallery-thumbs">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="{{ asset('uploads/product/' . $productDetail->image_prd) }}" alt="image">
                                </div>
                                @foreach ($productImgList as $item)
                                    <div class="swiper-slide">
                                        <img src="{{ asset('uploads/product/' . $item->img) }}" alt="image">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="detail-product col-lg-4">
                    <h4 class="name">
                        {{ $productDetail->name_prd }}
                    </h4>
                    <div class="product-review">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <span class="txt">({{ count($reviewList) }} đánh giá)</span>
                    </div>
                    <div class="detail-social"></div>
                    <div class="price">
                        <span>{{ number_format($productDetail->price) }} <sup>đ</sup></span>
                    </div>
                    <form action="">
                        <div class="add-cart">
                            <a href="{{ route('cart.add', [$productDetail->id]) }}" class="btn-add" type="submit">
                                Thêm vào giỏ
                                <span class="sub-txt">Giao tận nhà - Đổi trả dễ dàng</span>
                            </a>
                        </div>
                    </form>
                    <div class="ttkm">
                        <h4 class="title">Khuyến mãi đặc biệt</h4>
                        <div class="content">
                            <p>+ Ưu đãi hấp dẫn dành cho khách hàng thân thiết</p>
                            <p>+ Trả góp với đơn hàng trị giá 3,000,000đ trở lên</p>
                            <p>+ Tích lũy điểm thưởng vào ví</p>
                            <span>*** Các chương trình khuyến mãi được áp dụng cùng nhau.</span>
                        </div>
                    </div>
                    <ul class="policy-product">
                        <li class="item">
                            <span class="img-policy">
                                <img src="{{ asset('images/card-bank.png') }}" alt="">
                            </span>
                            <span class="info-policy">
                                <h4 class="title">Thanh toán tiện lợi</h4>
                                <p class="sub-txt">(Chấp nhận thanh toán VNPay, Momo, Visa, MasterCard và các thẻ nội địa
                                    khác)</p>
                            </span>
                        </li>
                        <li class="item">
                            <span class="img-policy">
                                <img src="{{ asset('images/delivery.png') }}" alt="">
                            </span>
                            <span class="info-policy">
                                <h4 class="title">Giao hàng toàn quốc</h4>
                                <p class="sub-txt">(Giao hàng nhanh + giao COD)</p>
                            </span>
                        </li>
                        <li class="item">
                            <span class="img-policy">
                                <img src="{{ asset('images/deliver.png') }}" alt="">
                            </span>
                            <span class="info-policy">
                                <h4 class="title">Giao hàng trong 1H</h4>
                                <p class="sub-txt">(Giao hàng áp dụng tại khu vực nội thành Hà Nội)</p>
                            </span>
                        </li>
                        <li class="item">
                            <span class="img-policy">
                                <img src="{{ asset('images/exchange.png') }}" alt="">
                            </span>
                            <span class="info-policy">
                                <h4 class="title">Hỗ trợ đổi trả nhanh</h4>
                            </span>
                        </li>
                    </ul>
                    <div class="panel-group">
                        <div class="panel">
                            <div class="title" data-bs-toggle="collapse" href="#collapse1" aria-expanded="false">
                                Mô tả sản phẩm
                                <i class="fa-solid fa-plus"></i>
                                {{-- <i class="fa-solid fa-minus"></i> --}}
                            </div>
                            <div class="collapse show" id="collapse1">
                                {!! $productDetail->description !!}
                            </div>
                        </div>
                        <div class="panel">
                            <div class="title" data-bs-toggle="collapse" href="#collapse2" aria-expanded="false">
                                Chính sách giao hàng đặc biệt
                                <i class="fa-solid fa-plus"></i>
                            </div>
                            <div class="collapse" id="collapse2">
                                (trống)
                            </div>
                        </div>
                    </div>
                    <div class="faq">
                        <a href="tel:0123456789" class="call-number">
                            Liên hệ đặt hàng online
                            <strong style="display: block">0123456789</strong>
                        </a>
                        <p>Giờ hoạt động : (8:30 - 21:30) mỗi ngày</p>
                    </div>
                </div>
            </div>

            <div class="description row">
                <h4 class="title">Sơ lược về {{ $productDetail->name_prd }}</h4>
                <div class="content">
                    {!! $productDetail->detail !!}
                    <div class="video">
                        <br>
                        <h4 class="text-center">Video review sản phẩm</h4>
                        <br>
                        {{-- <iframe width="100%" height="500" src="https://www.youtube.com/embed/-wVRJDyIvD0"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe> --}}
                    </div>
                </div>
            </div>

            <div class="review row">
                <h4 class="title">Đánh giá sản phẩm <strong style="font-size: 16px;">({{ count($reviewList) }} đánh
                        giá)</strong></h4>
                <div class="review-form">
                    <input type="button" value="Viết đánh giá" id="btn-newreview" data-bs-toggle="collapse"
                        href="#form-review" aria-expanded="false">
                    <div class="collapse form" id="form-review">
                        <h4 class="form-title">Viết đánh giá mới</h4>
                        <form action="{{ route('product.review', $productDetail->id) }}" id="myform" method="post">
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="name_user">Tên</label>
                                <input class="form-input" id="name_user" type="text" name="name_user"
                                    placeholder="Tên của bạn (>3 kí tự)">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="email">Email</label>
                                <input class="form-input" id="email" type="email" name="email"
                                    placeholder="email@example.com">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Đánh giá</label>
                                <div class="rate">
                                    <input type="radio" id="star5" name="rated" value="5" checked />
                                    <label for="star5" title="Tốt - 5 sao"></label>
                                    <input type="radio" id="star4" name="rated" value="4" />
                                    <label for="star4" title="Khá tốt - 4 sao"></label>
                                    <input type="radio" id="star3" name="rated" value="3" />
                                    <label for="star3" title="Bình thường - 3 sao"></label>
                                    <input type="radio" id="star2" name="rated" value="2" />
                                    <label for="star2" title="Hơi tệ - 2 sao"></label>
                                    <input type="radio" id="star1" name="rated" value="1" />
                                    <label for="star1" title="Tệ - 1 sao"></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="comment">Nội dung</label>
                                <textarea class="form-input" id="comment" rows="3" name="comment"
                                    placeholder="Viết nội dung đánh giá ở đây"></textarea>
                            </div>
                            <button class="btn-submit" type="button" id="btn-submit">Gửi đánh giá</button>
                        </form>
                    </div>
                </div>
                <div class="list-comments">
                    @foreach ($reviewList as $item)
                        <div class="item">
                            <div class="rated">
                                @for ($i = 0; $i < $item->rated; $i++)
                                    <i class="yellow fa-solid fa-star"></i>
                                @endfor
                                @for ($i = 0; $i < 5 - $item->rated; $i++)
                                    <i class="grey fa-solid fa-star"></i>
                                @endfor
                            </div>
                            <div class="name">
                                <span class="author"> - {{ $item->name_user }}</span> - <span
                                    class="time">{{ $item->created_at }}</span>
                            </div>
                            <div class="comment">{{ $item->content }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="product-related row">
                <div class="title">
                    <div class="blob"></div>
                    <div class="txt">Có thể bạn sẽ thích</div>
                </div>
                <div class="slide-product-related">
                    @foreach ($productSame as $item)
                        <div class="item">
                            <a href="{{ route('product.detail', $item->id) }}">
                                <img src="{{ asset('uploads/product/' . $item->image_prd) }}" alt="img">
                                <p class="name">{{ $item->name_prd }}</p>
                            </a>
                            <p class="price">{{ number_format($item->price) }} <sup>đ</sup></p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @if (session('stt-review') == 'success')
        <script>
            swal({
                title: "Thành công",
                text: "Cảm ơn bạn đã gửi đánh giá!",
                icon: "success",
                button: "Ok!",
            });
        </script>
    @elseif(session('stt-review') == 'failed')
        <script>
            swal({
                title: "Lỗi",
                text: "Xảy ra lỗi, vui lòng thử lại!",
                icon: "error",
                button: "Ok!",
            });
        </script>
    @endif
    <script>
        function isEmail(emailAddress) {
            var res = new RegExp(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/);
            return res.test(emailAddress);
        }
        $('#btn-submit').click(function() {
            var myform = $('#myform');
            var name_user = $('#name_user').val().trim();
            var email = $('#email').val().trim();
            var comment = $('#comment').val().trim();

            swal({
                    title: "Gửi đánh giá?",
                    text: "",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((ok) => {
                    if (ok) {
                        if (name_user.length == 0 || email.length == 0 || comment.length == 0) {
                            swal({
                                title: "Lỗi",
                                text: "Vui lòng nhập đầy đủ thông tin!",
                                icon: "error",
                                button: "Ok!",
                            });
                        } else if (name_user.length < 3) {
                            swal({
                                title: "Lỗi",
                                text: "Tên người dùng tối thiểu 3 kí tự!",
                                icon: "error",
                                button: "Ok!",
                            });
                        } else if (!isEmail(email)) {
                            swal({
                                title: "Lỗi",
                                text: "Email không đúng định dạng!(Example@gmail.com)",
                                icon: "error",
                                button: "Ok!",
                            });
                        } else {
                            myform.submit();
                        }
                    }
                });
        });
    </script>
@endsection
