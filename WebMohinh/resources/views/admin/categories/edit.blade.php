@extends('layouts.admin')

@section('content-admin')
    <div class="content-wrapper">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                @if (session('msg'))
                    <h1 class="alert alert-danger">{{ session('msg') }}</h1>
                @endif
                <div class="card-body">
                    <h4 class="card-title">Thêm danh mục</h4>
                    <form class="forms-sample" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Tên danh mục</label>
                            <input type="text" class="form-control" id="name" placeholder="Tên danh mục" name="name_cate" value="{{ old('name_cate') ?? $categoryDetail->name_cate }}">
                            @error('name_cate')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="img">Ảnh</label>
                            <input type="file" class="form-control" id="img" name="image">
                            <input type="hidden" name="imgNameOld" value="{{ $categoryDetail->image_cate }}">
                            @error('image')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="banner">Banner</label>
                            <input type="file" class="form-control" id="banner" name="banner">
                            <input type="hidden" name="bannerNameOld" value="{{ $categoryDetail->banner }}">
                            @error('banner')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="status">Trạng thái</label>
                            <select name="status" id="status" class="form-control">
                                <option value="1" {{ ($categoryDetail->status == 1) ? 'selected' : '' }}>Hiển thị</option>
                                <option value="0" {{ ($categoryDetail->status == 0) ? 'selected' : '' }}>Ẩn</option>
                            </select>
                            @error('status')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <button type="reset" class="btn btn-info me-2">Reset</button>
                        <a class="btn btn-light" href="/admin/danh-muc">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
