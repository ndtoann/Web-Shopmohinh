@extends('layouts.clients')

@section('content')
    <div class="cart-content">
        <div class="container">
            <div class="row">
                <div class="left col-lg-8">
                    <h4 class="title">Giỏ hàng của bạn (Có {{ $cartCount }} sản phẩm trong giỏ hàng của bạn)</h4>
                    @if ($cartCount == 0)
                        <h4>Giỏ hàng của bạn chưa có gì</h4>
                    @endif
                    @if ($cartCount > 0)
                        <div class="table-responsive text-center">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Ảnh</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                        <th>Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cartList as $item)
                                        <tr>
                                            <td><img src="{{ asset('uploads/product/' . $item->options->get('image')) }}"
                                                    alt="image"></td>

                                            <td><a href="{{ route('product.detail', $item->id) }}">{{ $item->name }}</a>
                                            </td>
                                            <td>{{ number_format($item->price) }}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>
                                                <a href="#"
                                                    onclick="swal({
                                                title: 'Xác nhận xóa sản phẩm này?',
                                                text: '',
                                                icon: 'warning',
                                                buttons: true,
                                                dangerMode: true,
                                            })
                                            .then((ok) => {
                                                if (ok) {
                                                    window.location.href = '{{ route('cart.delete', $item->id) }}';
                                                }
                                            });"><i
                                                        class="fa-solid fa-x"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
                <div class="right col-lg-4">
                    <h4 class="title">Thanh toán</h4>
                    <div class="price">
                        <p>Sản phẩm</p>
                        <p class="price-num">{{ $totalPrice }} <sup>đ</sup></p>
                    </div>
                    <div class="price">
                        <p>Cần thanh toán</p>
                        <p class="price-num">{{ $totalPrice }} <sup>đ</sup></p>
                    </div>
                    <div class="btn-order">
                        <a href="{{ route('cart.checkout') }}">Thanh toán</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (session('addCart'))
        <script>
            swal({
                title: "Thành công",
                text: "Đã thêm sản phẩm vào giỏ hàng!",
                icon: "success",
                button: "Ok!",
            });
        </script>
    @elseif(session('updateCart'))
        <script>
            swal({
                title: "Thành công",
                text: "Đã cập nhật giỏ hàng"
                icon: "success",
                button: "Ok!",
            });
        </script>
    @elseif(session('deleteCart'))
        <script>
            swal({
                title: "Thành công",
                text: "Đã xóa sản phẩm",
                icon: "success",
                button: "Ok!",
            });
        </script>
    @endif

    @if (session('stt-checkout') == "success")
        <script>
            swal({
                title: "Thành công",
                text: "Đặt hàng thành công, xem chi tiết đơn hàng trong email của bạn!",
                icon: "success",
                button: "Ok!",
            });
        </script>
    @elseif(session('stt-checkout') == "failed")
        <script>
            swal({
                title: "Lỗi",
                text: "Xảy ra lỗi, vui lòng thử lại sau!",
                icon: "error",
                button: "Ok!",
            });
        </script>
    @endif
@endsection
