@extends('layouts.admin')

@section('content-admin')
    <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                @if (session('msg'))
                    <h1 class="alert alert-success">{{ session('msg') }}</h1>
                @endif
                <div class="card-body">
                    <h4 class="card-title">Đánh giá mới</h4>
                    <form method="get">
                        <div class="row">
                            <div class="form-group col-lg-2">
                                <label for="status">Trạng thái</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="active" {{ request('status') == 'active' ? 'selected' : ''}}>Đã duyệt</option>
                                    <option value="unactive" {{ request('status') == 'unactive' ? 'selected' : ''}}>Chưa duyệt</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-2">
                                <br>
                                <button type="submit" class="btn btn-success">Tìm kiếm</button>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Tên khách hàng</th>
                                    <th>Email</th>
                                    <th>Đánh giá</th>
                                    <th>Nội dung</th>
                                    <th>Sản phẩm</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày đăng</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reviewList as $item)
                                    <tr>
                                        <td>{{ $item->name_user }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->rated }} <i class="mdi mdi-star" style="color: rgb(236, 186, 85);"></i></td>
                                        <td>{{ $item->content }}</td>
                                        <td>{{ $item->name_prd }}</td>
                                        <td>
                                            @if ($item->status == 1)
                                                <label class="badge badge-success">Đã duyệt</label>
                                            @else
                                                <label class="badge badge-danger">Chưa duyệt</label>
                                            @endif
                                        </td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            @if ($item->status == 0)
                                                <a href="#"
                                                    onclick="if(confirm('Duyệt bình luận này?') == true){ location.href = '/admin/danh-gia/cap-nhat-danh-gia/{{ $item->id }}' }"
                                                    class="btn btn-inverse-primary btn-rounded btn-icon"><i
                                                        class="mdi mdi-comment-check " title="Duyệt đánh giá"></i></a>
                                            @elseif($item->status == 1)
                                                <a href="#"
                                                    onclick="if(confirm('Ẩn bình luận này?') == true){ location.href = '/admin/danh-gia/cap-nhat-danh-gia/{{ $item->id }}' }"
                                                    class="btn btn-inverse-primary btn-rounded btn-icon"><i
                                                        class="mdi mdi-comment-check " title="Duyệt đánh giá"></i></a>
                                            @endif
                                            <a href="#"
                                                onclick="if(confirm('Xác nhận xóa?') == true){ location.href = '/admin/danh-gia/xoa-danh-gia/{{ $item->id }}' }"
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
