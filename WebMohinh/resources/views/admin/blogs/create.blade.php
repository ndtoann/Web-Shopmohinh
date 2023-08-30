@extends('layouts.admin')

@section('content-admin')
    <div class="content-wrapper">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                @if (session('msg'))
                    <h1 class="alert alert-danger">{{ session('msg') }}</h1>
                @endif
                <div class="card-body">
                    <h4 class="card-title">Thêm blog</h4>
                    <form class="forms-sample" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Tiêu đề</label>
                            <input type="text" class="form-control" id="title" placeholder="Tên blog"
                                name="title" value="{{ old('title') }}">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="img">Ảnh</label>
                            <input type="file" class="form-control" id="img" name="image_blog">
                            @error('image_blog')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="content">Nội dung</label>
                            <textarea id="content" class="form-control" name="content" value="{{ old('content') }}"></textarea>
                            @error('content')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="status">Trạng thái</label>
                            <select name="status" id="status" class="form-control">
                                <option value="1">Hiển thị</option>
                                <option value="0">Ẩn</option>
                            </select>
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <a class="btn btn-light" href="/admin/blog">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        CKEDITOR.replace("content");
    </script>
@endsection
