@extends('layouts.admin')

@section('content-admin')
    <div class="content-wrapper">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                @if (session('msg'))
                    <h1 class="alert alert-danger">{{ session('msg') }}</h1>
                @endif
                <div class="card-body">
                    <h4 class="card-title">Thêm sản phẩm</h4>
                    <form class="forms-sample" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Tên sản phẩm</label>
                            <input type="text" class="form-control" id="name" placeholder="Tên sản phẩm"
                                name="name_prd" value="{{ old('name_prd') }}">
                            @error('name_prd')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="img">Ảnh chính</label>
                            <input type="file" class="form-control" id="img" name="image">
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="list_img">Ảnh chi tiết (Chọn được nhiều ảnh)</label>
                            <input type="file" class="form-control" id="list_img" name="list_img[]" multiple>
                            @error('list_img')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Giá (vnđ)</label>
                            <input type="number" class="form-control" id="name" placeholder="Giá" name="price" value="{{ old('price') }}">
                            @error('price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="desc">Mô tả</label>
                            <textarea id="desc" class="form-control" name="description" value="{{ old('description') }}"></textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="detail">Chi tiết</label>
                            <textarea id="detail" class="form-control" name="detail" value="{{ old('detail') }}"></textarea>
                            @error('detail')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category">Danh mục</label>
                            <select name="category_id" id="category" class="js-example-basic-multiple w-100">
                                <option value="">Chọn danh mục</option>
                                @foreach ($categoryList as $item)
                                    <option value="{{ $item->id }}">{{ $item->name_cate }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
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
                        <a class="btn btn-light" href="/admin/san-pham">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        CKEDITOR.replace("desc");
        CKEDITOR.replace("detail");
    </script>
@endsection
