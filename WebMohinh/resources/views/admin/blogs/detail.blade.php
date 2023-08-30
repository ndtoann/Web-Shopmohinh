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
                            <h4 class="card-title">{{ $blogDetail->title }}</h4>
                            <h4>Trạng thái:
                                @if ($blogDetail->status == 1)
                                    <label class="text-success">Hiển thị</label>
                                @else
                                    <label class="text-danger">Ẩn</label>
                                @endif
                            </h4>
                        </div>
                        <div class="col-md-8">
                            <div>
                                <img src="{{ asset('uploads/blog/' . $blogDetail->image_blog) }}" alt="img">
                            </div>
                        </div>
                    </div>

                    <blockquote class="blockquote">
                        <h4>Mô tả</h4>
                        <p id="content">{!! $blogDetail->content !!}</p>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
@endsection
