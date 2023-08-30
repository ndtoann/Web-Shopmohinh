@extends('layouts.admin')

@section('content-admin')
    <div class="content-wrapper">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                @if (session('msg'))
                    <h1 class="alert alert-danger">{{ session('msg') }}</h1>
                @endif
                <div class="card-body">
                    <h4 class="card-title">Cập nhật sản phẩm</h4>
                    <form class="forms-sample" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Tên sản phẩm</label>
                            <input type="text" class="form-control" id="name" placeholder="Tên sản phẩm"
                                name="name_prd" value="{{ old('name_prd') ?? $productDetail->name_prd }}">
                            @error('name_prd')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="img">Ảnh chính</label>
                            <input type="file" class="form-control" id="img" name="image">
                            <input type="hidden" name="imgNameOld" value="{{ $productDetail->image_prd }}">
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="list_img">Thêm ảnh chi tiết sản phẩm (Chọn được nhiều ảnh)</label>
                            <input type="file" class="form-control" id="list_img" name="list_img[]" multiple>
                            @error('list_img')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price">Giá (vnđ)</label>
                            <input type="number" class="form-control" id="price" placeholder="Giá" name="price"
                                value="{{ old('price') ?? $productDetail->price }}">
                            @error('price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="desc">Mô tả</label>
                            <input type="hidden" id="dataDesc" value="{{ $productDetail->description }}">
                            <textarea id="desc" class="form-control" name="description"></textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="detail">Chi tiết</label>
                            <input type="hidden" id="dataDetail" value="{{ $productDetail->detail }}">
                            <textarea id="detail" class="form-control" name="detail"></textarea>
                            @error('detail')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category">Danh mục</label>
                            <select name="category_id" id="category" class="js-example-basic-multiple w-100">
                                <option value="">Chọn danh mục</option>
                                @foreach ($categoryList as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $item->id == $productDetail->category_id ? 'selected' : '' }}>
                                        {{ $item->name_cate }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="status">Trạng thái</label>
                            <select name="status" id="status" class="form-control">
                                <option value="1" {{ $productDetail->status == 1 ? 'selected' : '' }}>Hiển thị
                                </option>
                                <option value="0" {{ $productDetail->status == 0 ? 'selected' : '' }}>Ẩn</option>
                            </select>
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <button type="reset" id="resetData" class="btn btn-info me-2">Reset</button>
                        <a class="btn btn-light" href="/admin/san-pham">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        CKEDITOR.replace("desc");
        CKEDITOR.replace("detail");

        var dataDesc = $('#dataDesc').val();
        var dataDetail = $('#dataDetail').val();

        CKEDITOR.instances["desc"].setData(dataDesc);
        CKEDITOR.instances["detail"].setData(dataDetail);

        $('#resetData').click(function() {
            CKEDITOR.instances["desc"].setData(dataDesc);
            CKEDITOR.instances["detail"].setData(dataDetail);
        })
    </script>
@endsection
