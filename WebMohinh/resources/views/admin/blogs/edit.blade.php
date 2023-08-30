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
                                name="title" value="{{ old('title') ?? $blogDetail->title }}">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="img">Ảnh</label>
                            <input type="file" class="form-control" id="img" name="image_blog">
                            <input type="hidden" name="imgNameOld" value="{{ $blogDetail->image_blog }}">
                            @error('image_blog')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="content">Nội dung</label>
                            <input type="hidden" id="dataContent" value="{{ $blogDetail->content }}">
                            <textarea id="content" class="form-control" name="content"></textarea>
                            @error('content')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="status">Trạng thái</label>
                            <select name="status" id="status" class="form-control">
                                <option value="1" {{ $blogDetail->status == 1 ? 'selected' : '' }}>Hiển thị
                                </option>
                                <option value="0" {{ $blogDetail->status == 0 ? 'selected' : '' }}>Ẩn</option>
                            </select>
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <button type="reset" id="resetData" class="btn btn-info me-2">Reset</button>
                        <a class="btn btn-light" href="/admin/blog">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        CKEDITOR.replace("content");

        var dataContent = $('#dataContent').val();

        CKEDITOR.instances["content"].setData(dataContent);

        $('#resetData').click(function() {
            CKEDITOR.instances["content"].setData(dataContent);
        })
    </script>
@endsection
