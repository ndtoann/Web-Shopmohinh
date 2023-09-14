@extends('layouts.clients')

@section('content')
    <section class="main-content">
        <div class="container">
            <div class="banner">
                <img src="{{ asset('uploads/category/' . $category->banner) }}" alt="banner">
            </div>
            <div class="collection-body">
                <div class="sort">
                    <h4>Xếp theo:
                        <a href="?sort-by=price&sort-type=asc">Giá tăng</a>
                        <a href="?sort-by=price&sort-type=desc">Giá giảm</a>
                    </h4>
                </div>
                <div class="list-product">
                    @foreach ($products as $item)
                        <div class="item">
                            <img class="gift" src="{{ asset('images/gift.webp') }}" alt="Gift">
                            <a href="{{ route('product.detail', $item->id) }}" title="Text">
                                <img src="{{ asset('uploads/product/' . $item->image_prd) }}" alt="">
                                <h4 class="name">{{ $item->name_prd }}</h4>
                            </a>
                            <p class="price">{{ number_format($item->price) }} <sup>đ</sup></p>
                        </div>
                    @endforeach
                </div>
                <div class="pagination text-center">
                    {{ $products->appends($_GET)->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
