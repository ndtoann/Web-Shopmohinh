@extends('layouts.admin')

@section('content-admin')
    <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                @if (session('msg'))
                    <h1 class="alert alert-success">{{ session('msg') }}</h1>
                @endif
                <div class="card-body">
                    <h4 class="card-title">Đơn hàng</h4>
                    <div class="form-filter">
                        <form method="get">
                            <div class="row">
                                <div class="form-group col-lg-2">
                                    <label for="status">Trạng thái</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="waitting" {{ request('status') == 'pro' ? 'selected' : ''}}>Đang chờ</option>
                                        <option value="deliver" {{ request('status') == 'unactive' ? 'selected' : ''}}>Đang giao hàng</option>
                                        <option value="success" {{ request('status') == 'active' ? 'selected' : ''}}>Đã thanh toán</option>
                                        <option value="cancel" {{ request('status') == 'active' ? 'selected' : ''}}>Đã hủy</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-8">
                                    <label for="name">Nhập tên khách hàng</label>
                                    <input type="text" name="name" id="name_customer" class="form-control" value="{{ request('name_customer') }}">
                                </div>
                                <div class="form-group col-lg-2">
                                    <br>
                                    <button type="submit" class="btn btn-success">Tìm kiếm</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Họ tên</th>
                                    <th>Số điện thoại</th>
                                    <th>Email</th>
                                    <th>Địa chỉ</th>
                                    <th>Ngày đặt hàng</th>
                                    <th>Trạng thái</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orderList as $item)
                                    <tr>
                                        <td>{{ $item->name_customer }}</td>
                                        <td>{{ $item->tel }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->address }}</td>
                                        <td><label class="badge badge-info">{{ $item->created_at }}</label></td>
                                        <td>
                                            @if ($item->status == 0)
                                                <label class="badge badge-danger">Đã hủy</label>
                                            @elseif ($item->status == 1)
                                                <label class="badge badge-warning">Đang chờ</label>
                                            @elseif($item->status == 2)
                                                <label class="badge badge-warning">Đang giao hàng</label>
                                            @elseif($item->status == 3)
                                                <label class="badge badge-success">Đã thanh toán</label>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="/admin/don-hang/chi-tiet-don-hang/{{ $item->id }}"
                                                class="btn btn-inverse-info btn-rounded btn-icon"><i class="mdi mdi-eye"
                                                    title="Xem chi tiết"></i></a>
                                            @if ($item->status == 1)
                                                <a href="#"
                                                    onclick="if(confirm('Cập nhật trạng thái đơn hàng thành đang giao hàng?') == true){ location.href = '/admin/don-hang/cap-nhat-tt-don-hang/{{ $item->id }}' }"
                                                    class="btn btn-inverse-primary btn-rounded btn-icon"><i
                                                        class="mdi mdi-clipboard-check " title="Cập nhật trạng thái đơn hàng thành đang giao hàng"></i></a>
                                            @elseif($item->status == 2)
                                                <a href="#"
                                                    onclick="if(confirm('Cập nhật trạng thái đơn hàng thành đã thanh toán?') == true){ location.href = '/admin/don-hang/cap-nhat-tt-don-hang/{{ $item->id }}' }"
                                                    class="btn btn-inverse-primary btn-rounded btn-icon"><i
                                                        class="mdi mdi-clipboard-check " title="Cập nhật trạng thái đơn hàng thành đã thanh toán"></i></a>
                                            @endif
                                            <a href="#"
                                                onclick="if(confirm('Hủy đơn hàng?') == true){ location.href = '/admin/don-hang/huy-don-hang/{{ $item->id }}' }"
                                                class="btn btn-inverse-warning btn-rounded btn-icon"><i
                                                    class="mdi mdi-bookmark-remove "></i></a>
                                            <a href="#"
                                                onclick="if(confirm('Xác nhận xóa?') == true){ location.href = '/admin/don-hang/xoa-don-hang/{{ $item->id }}' }"
                                                class="btn btn-inverse-danger btn-rounded btn-icon"><i
                                                    class="mdi mdi-delete-forever" title="Xóa"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
