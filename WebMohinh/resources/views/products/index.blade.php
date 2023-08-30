@extends('layouts.clients')

@section('content')

<section class="main-content">
    <div class="container">
        <div class="banner">
            <img src="{{ asset('uploads/category/'.$category->banner) }}" alt="banner">
        </div>
        <div class="collection-body">
            <div class="sort-by">
                <form action="">
                    <label for="sort-by">Xếp theo</label>
                    <select name="" id="sort-by" class="form-control">
                        <option value="">Mới nhất</option>
                        <option value="">Giá tăng</option>
                        <option value="">Giá giảm</option>
                        <option value="">Tên A-Z</option>
                        <option value="">Tên Z-A</option>
                    </select>
                </form>
            </div>
            <div class="list-product">
                @foreach ($products as $item)
                <div class="item">
                    <img class="gift" src="{{ asset('images/gift.webp') }}" alt="Gift">
                    <a href="{{ route('product.detail', $item->id) }}" title="Text">
                        <img src="{{ asset('uploads/product/'.$item->image_prd) }}" alt="">
                        <h4 class="name">{{ $item->name_prd }}</h4>
                    </a>
                    <p class="price">{{ number_format($item->price) }} <sup>đ</sup></p>
                </div>
                @endforeach
            </div>
            <div class="pagination text-center">
                1 2 3
            </div>
        </div>
    </div>
</section>

@endsection