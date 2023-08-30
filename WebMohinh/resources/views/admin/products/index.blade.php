@extends('layouts.admin')

@section('content-admin')
    <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                @if (session('msg'))
                    <h1 class="alert alert-success">{{ session('msg') }}</h1>
                @endif
                <div class="card-body">
                    <h4 class="card-title">Sản phẩm</h4>
                    <div class="form-filter">
                        <form method="get">
                            <div class="row">
                                <div class="form-group col-lg-2">
                                    <label for="status">Trạng thái</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="active" {{ request('status') == 'active' ? 'selected' : ''}}>Hiển thị</option>
                                        <option value="unactive" {{ request('status') == 'unactive' ? 'selected' : ''}}>Ẩn</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-2">
                                    <label for="category">Danh mục</label>
                                    <select name="category_id" id="category" class="form-control">
                                        <option value>Chọn danh mục</option>
                                        @foreach ($categoryList as $item)
                                            <option value="{{ $item->id }}" {{ request('category_id') == $item->id ? 'selected' : ''}}>{{ $item->name_cate }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="name">Nhập tên sản phẩm</label>
                                    <input type="text" name="name_prd" id="name" class="form-control" value="{{ request('name_prd') }}">
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
                                    <th>Ảnh</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Danh mục</th>
                                    <th>Trạng thái</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productList as $item)
                                    <tr>
                                        <td><img src="{{ asset('uploads/product/' . $item->image_prd) }}" alt="product"></td>
                                        <td>{{ $item->name_prd }}</td>
                                        <td class="text-danger">{{ number_format($item->price) }}<sup>đ</sup></td>
                                        <td>{{ $item->name_cate }}</td>
                                        <td>
                                            @if ($item->status == 1)
                                                <label class="badge badge-success">Hiển thị</label>
                                            @else
                                                <label class="badge badge-danger">Ẩn</label>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="/admin/san-pham/chi-tiet-san-pham/{{ $item->id }}"
                                                class="btn btn-inverse-info btn-rounded btn-icon"><i class="mdi mdi-eye"
                                                    title="Xem chi tiết"></i></a>
                                            <a href="/admin/san-pham/cap-nhat-san-pham/{{ $item->id }}"
                                                class="btn btn-inverse-primary btn-rounded btn-icon"><i
                                                    class="mdi mdi-settings " title="Cập nhật"></i></a>
                                            <a href="#"
                                                onclick="if(confirm('Xác nhận xóa?') == true){ location.href = '/admin/san-pham/xoa-san-pham/{{ $item->id }}' }"
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
