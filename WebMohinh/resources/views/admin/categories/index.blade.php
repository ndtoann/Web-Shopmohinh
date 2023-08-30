@extends('layouts.admin')

@section('content-admin')
    <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                @if (session('msg'))
                    <h1 class="alert alert-success">{{ session('msg') }}</h1>
                @endif
                <div class="card-body">
                    <h4 class="card-title">Danh mục sản phẩm</h4>
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
                                <div class="form-group col-lg-8">
                                    <label for="name">Nhập tên danh mục</label>
                                    <input type="text" name="name_cate" id="name" class="form-control" value="{{ request('name_cate') }}">
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
                                    <th>Tên</th>
                                    <th>Trạng thái</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categoryList as $item)
                                    <tr>
                                        <td><img src="{{ asset('uploads/category/' . $item->image_cate) }}" alt="category"></td>
                                        <td>{{ $item->name_cate }}</td>
                                        @if ($item->status == 1)
                                            <td><label class="badge badge-success">Hiển thị</label></td>
                                        @else
                                            <td><label class="badge badge-danger">Ẩn</label></td>
                                        @endif
                                        <td>
                                            <a href="/admin/danh-muc/cap-nhat-danh-muc/{{ $item->id }}"
                                                class="btn btn-inverse-primary btn-rounded btn-icon"><i
                                                    class="mdi mdi-settings " title="Cập nhật"></i></a>
                                            <a href="#"
                                                onclick="if(confirm('Xác nhận xóa?') == true){ location.href = '/admin/danh-muc/xoa-danh-muc/{{ $item->id }}' }"
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
