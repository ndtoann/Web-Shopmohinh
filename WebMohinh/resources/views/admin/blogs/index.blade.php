@extends('layouts.admin')

@section('content-admin')
    <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                @if (session('msg'))
                    <h1 class="alert alert-success">{{ session('msg') }}</h1>
                @endif
                <div class="card-body">
                    <h4 class="card-title">Blogs</h4>
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
                                <div class="form-group col-lg-6">
                                    <label for="title">Nhập tên blog</label>
                                    <input type="text" name="title" id="title" class="form-control" value="{{ request('title') }}">
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
                                    <th>Tiêu đề</th>
                                    <th>Ảnh</th>
                                    <th>Trạng thái</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($blogList as $item)
                                    <tr>
                                        <td>{{ $item->title }}</td>
                                        <td><img src="{{ asset('uploads/blog/' . $item->image_blog) }}" alt="blog"></td>
                                        <td>
                                            @if ($item->status == 1)
                                                <label class="badge badge-success">Hiển thị</label>
                                            @else
                                                <label class="badge badge-danger">Ẩn</label>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="/admin/blog/chi-tiet-blog/{{ $item->id }}"
                                                class="btn btn-inverse-info btn-rounded btn-icon"><i class="mdi mdi-eye"
                                                    title="Xem chi tiết"></i></a>
                                            <a href="/admin/blog/cap-nhat-blog/{{ $item->id }}"
                                                class="btn btn-inverse-primary btn-rounded btn-icon"><i
                                                    class="mdi mdi-settings " title="Cập nhật"></i></a>
                                            <a href="#"
                                                onclick="if(confirm('Xác nhận xóa?') == true){ location.href = '/admin/blog/xoa-blog/{{ $item->id }}' }"
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
