@extends('layouts.clients')

@section('content')
    <div class="checkout-content">
        <div class="container">
            <div class="row">
                <div class="form-info col-lg-8">
                    <h4 class="title">Thông tin khách hàng</h4>
                    <form action="{{ route('cart.postCheckout') }}" method="post" class="form" id="myform">
                        @csrf
                        <div class="form-group">
                            <label for="name_customer">Họ và tên <span>(*)</span></label>
                            <input class="form-control" type="text" placeholder="Họ và tên" name="name_customer" id="name_customer">
                        </div>
                        <div class="form-group">
                            <label for="tel">Điện thoại <span>(*)</span></label>
                            <input class="form-control" type="text" placeholder="Điện thoại" name="tel" id="tel">
                        </div>
                        <div class="form-group">
                            <label for="email">Email <span>(*)</span></label>
                            <input class="form-control" type="text" placeholder="Email" name="email" id="email">
                        </div>
                        <div class="row">
                            <div class="col-4 form-group">
                                <label for="city">Tỉnh thành <span>(*)</span></label>
                                <select class="form-control" name="city" id="city">
                                    <option value="" selected>Chọn tỉnh thành</option>
                                </select>
                            </div>
                            <div class="col-4 form-group">
                                <label for="district">Quận huyện <span>(*)</span></label>
                                <select class="form-control" name="district" id="district">
                                    <option value="" selected>Chọn quận huyện</option>
                                </select>
                            </div>
                            <div class="col-4 form-group">
                                <label for="ward">Phường xã <span>(*)</span></label>
                                <select class="form-control" name="ward" id="ward">
                                    <option value="" selected>Chọn phường xã</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address">Địa chỉ nhận <span>(*)</span></label>
                            <input class="form-control" type="text" placeholder="Địa chỉ nhận" name="address" id="address">
                        </div>
                        <div class="form-group">
                            <label for="pack">Đóng gói <span>(*)</span></label>
                            <select class="form-control" name="pack" id="pack">
                                <option value="">Chọn quy cách đóng gói</option>
                                <option value="Để nguyên seal<">Để nguyên seal</option>
                                <option value="Bọc platis">Bọc platis</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pay">Hình thức thanh toán<span>(*)</span></label>
                            <select class="form-control" name="pay" id="pay">
                                <option value="">Chọn hình thức</option>
                                <option value="Giao hàng nhận tiền">Giao hàng nhận tiền</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="note">Ghi chú<span>(*)</span></label>
                            <textarea class="form-control" name="note" id="note" cols="100" rows="3" placeholder="Ghi chú"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="button" id="btn-submit" class="btn-checkout">Đặt hàng</button>
                        </div>
                    </form>
                </div>

                <!-- sản phẩm đang đặt -->
                <div class="order-detail col-lg-4">
                    <h4 class="title">Chi tiết đơn hàng</h4>
                    <div class="content">
                        <div class="product-content">
                            @foreach ($cartList as $item)
                            <div class="item">
                                <h4>{{ $item->name }}</h4>
                                <p>Số lượng: {{ $item->qty }}</p>
                                <p class="price">{{ number_format($item->price) }} đ</p>
                            </div>
                            @endforeach
                        </div>
                        <div class="total">Tổng tiền sản phẩm: {{ $totalPrice }} <sup>đ</sup></div>
                        <div class="total">Phí vận chuyển: 40,000 <sup>đ</sup></div>
                        <div class="total">Thành tiền: <strong>{{ number_format($total) }} <sup>đ</sup></strong></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script>
        var citis = document.getElementById("city");
        var districts = document.getElementById("district");
        var wards = document.getElementById("ward");
        var Parameter = {
            url: "https://provinces.open-api.vn/api/?depth=3",
            method: "GET",
            responseType: "application/json",
        };
        var promise = axios(Parameter);
        promise.then(function(result) {
            renderCity(result.data);
        });

        function renderCity(data) {
            for (const x of data) {
                citis.options[citis.options.length] = new Option(x.name, x.code);
            }
            citis.onchange = function() {
                district.length = 1;
                ward.length = 1;
                if (this.value != "") {
                    const result = data.filter(n => n.code == this.value);

                    for (const k of result[0].districts) {
                        district.options[district.options.length] = new Option(k.name, k.code);
                    }
                }
            };
            districts.onchange = function() {
                ward.length = 1;
                const dataCity = data.filter((n) => n.code == citis.value);
                if (this.value != "") {
                    const dataWards = dataCity[0].districts.filter(n => n.code == this.value);

                    for (const w of dataWards[0].wards) {
                        wards.options[wards.options.length] = new Option(w.name, w.code);
                    }
                }
            };
        }

        function isEmail(emailAddress) {
            var res = new RegExp(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/);
            return res.test(emailAddress);
        }
        function isPhone(tel) {
            return !isNaN(tel);
        }
        $('#btn-submit').click(function() {
            var myform = $('#myform');
            var name_customer = $('#name_customer').val().trim();
            var tel = $('#tel').val().trim();
            var email = $('#email').val().trim();
            var city = $('#city').val().trim();
            var district = $('#district').val().trim();
            var ward = $('#ward').val().trim();
            var address = $('#address').val().trim();
            var pack = $('#pack').val().trim();
            var pay = $('#pay').val().trim();
            var note = $('#note').val().trim();

            swal({
                    title: "Xác nhận đặt hàng?",
                    text: "",
                    icon: "success",
                    buttons: true,
                    dangerMode: true,
                })
                .then((ok) => {
                    if (ok) {
                        if (name_customer.length == 0 || tel.length == 0 || email.length == 0 || city.length == 0 || district.length == 0 || ward.length == 0 || address.length == 0 || pack.length == 0 || pay.length == 0 || note.length == 0) {
                            swal({
                                title: "Lỗi",
                                text: "Vui lòng nhập đầy đủ thông tin!",
                                icon: "error",
                                button: "Ok!",
                            });
                        } else if (!isPhone(tel)) {
                            swal({
                                title: "Lỗi",
                                text: "Số điện thoại không hợp lệ",
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
