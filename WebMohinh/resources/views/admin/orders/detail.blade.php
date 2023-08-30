@extends('layouts.admin')

@section('content-admin')
    <div class="content-wrapper">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="card-title">Thông tin khách hàng</h4>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>Họ tên</th>
                                        <td>{{ $orderDetail->name_customer }}</td>
                                    </tr>
                                    <tr>
                                        <th>Số điện thoại</th>
                                        <td>{{ $orderDetail->tel }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $orderDetail->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Địa chỉ</th>
                                        <input type="hidden" value="{{ $orderDetail->city_id }}" id="val-city">
                                        <input type="hidden" value="{{ $orderDetail->district_id }}" id="val-district">
                                        <input type="hidden" value="{{ $orderDetail->ward_id }}" id="val-ward">
                                        <td id="address">(trống)</td>
                                    </tr>
                                    <tr>
                                        <th>Địa chỉ chi tiết</th>
                                        <td>{{ $orderDetail->address }}</td>
                                    </tr>
                                    <tr>
                                        <th>Đóng gói</th>
                                        <td>{{ $orderDetail->method_pack }}</td>
                                    </tr>
                                    <tr>
                                        <th>Phương thức thanh toán</th>
                                        <td>{{ $orderDetail->method_checkout }}</td>
                                    </tr>
                                    <tr>
                                        <th>Ghi chú</th>
                                        <td>{{ $orderDetail->note }}</td>
                                    </tr>
                                    <tr>
                                        <th>Ngày đặt hàng</th>
                                        <td><label class="badge badge-info">{{ $orderDetail->created_at }}</label></td>
                                    </tr>
                                    <tr>
                                        <th>Trạng thái</th>
                                        <td>
                                            @if ($orderDetail->status == 0)
                                                <label class="badge badge-danger">Đã hủy</label>
                                            @elseif($orderDetail->status == 1)
                                                <label class="badge badge-warning">Đang xử lý</label>
                                            @elseif($orderDetail->status == 2)
                                                <label class="badge badge-warning">Đang giao hàng</label>
                                            @else
                                                <label class="badge badge-success">Đã thanh toán</label>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Mã đơn hàng</th>
                                        <td>{{ $orderDetail->code }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6" style="margin-top: 50px;">
                            <h4 class="card-title">Sản phẩm đặt mua</h4>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Tên sản phẩm</th>
                                            <th>Ảnh</th>
                                            <th>Giá</th>
                                            <th>Số lượng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orderListProduct as $item)
                                            <tr>
                                                <td>$item->name_prd</td>
                                                <td><img src="{{ asset('uploads/product/' . $item->img_prd) }}"
                                                        alt="img"></td>
                                                <td class="text-info">{{ number_format($item->price_prd) }}<sup>đ</sup></td>
                                                <td>{{ $item->quantity }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <div>
                                <h3>Tổng tiền: <span class="text-success">{{ number_format($orderDetail->total_money) }}
                                        <sup>đ</sup></span></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script>
        var address = document.getElementById("address");
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
            const dataCity = data.filter(n => n.code == $('#val-city').val());
            const dataDistrict = dataCity[0].districts.filter(n => n.code == $('#val-district').val());
            const dataWard = dataDistrict[0].wards.filter(n => n.code == $('#val-ward').val());

            address.innerText = `${dataWard[0].name} - ${dataDistrict[0].name} - ${dataCity[0].name}`;
        }
    </script>
@endsection
