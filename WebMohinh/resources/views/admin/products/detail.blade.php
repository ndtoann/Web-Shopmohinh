@extends('layouts.admin')

@section('content-admin')
    <div class="content-wrapper">
        <div class="col-12 grid-margin">
            <div class="card">
                @if (session('msg'))
                    <h1 class="alert alert-success">{{ session('msg') }}</h1>
                @endif
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <h4 class="card-title">{{ $productDetail->name_prd }}</h4>
                            <div style="display: flex; padding: 50px; justify-content: center;">
                                <img src="{{ asset('uploads/product/' . $productDetail->image_prd) }}" alt="img">
                            </div>
                        </div>

                        <div class="col-md-8">
                            <h4 class="card-title">Ảnh chi tiết sản phẩm</h4>
                            <div class="list_prd_img">
                                @foreach ($productImgList as $item)
                                    <div class="item">
                                        <img src="{{ asset('uploads/product/' . $item->img) }}" alt="">
                                        <a href="#"
                                            onclick="if(confirm('Xác nhận xóa ảnh này?') == true){ location.href = '/admin/san-pham/xoa-anh-san-pham/{{ $productDetail->id }}-{{ $item->id }}' }">
                                            <i class="delete mdi mdi-close-box-outline"></i>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th>Tên sản phẩm</th>
                                    <th>{{ $productDetail->name_prd }}</th>
                                </tr>
                                <tr>
                                    <th>Giá</th>
                                    <th style="color: red;">{{ number_format($productDetail->price) }} <sup>đ</sup></th>
                                </tr>
                                <tr>
                                    <th>Danh mục</th>
                                    <th>{{ $productDetail->name_cate }}</th>
                                </tr>
                                <tr>
                                    <th>Trạng thái</th>
                                    <th>
                                        @if ($productDetail->status == 1)
                                            <label class="text-success">Hiển thị</label>
                                        @else
                                            <label class="text-danger">Ẩn</label>
                                        @endif
                                    </th>
                                </tr>
                                <tr>
                                    <th>Ngày thêm</th>
                                    <th>{{ $productDetail->created_at }}</th>
                                </tr>
                            </table>
                        </div>
                        <blockquote class="blockquote">
                            <h4>Mô tả</h4>
                            <p id="desc">{!! $productDetail->description !!}</p>
                        </blockquote>
                        <blockquote class="blockquote">
                            <h4>Chi tiết</h4>
                            <p id="detail">{!! $productDetail->detail !!}</p>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
