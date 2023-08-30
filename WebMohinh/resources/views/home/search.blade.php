@extends('layouts.clients')

@section('content')
    <section class="search-page">
        <div class="container">
            <div class="heading-page text-center">
                <h4 class="title">Tìm kiếm</h4>
                <p class="sub-txt">Có {{ $count_rs }} sản phẩm cho tìm kiếm</p>
            </div>
            <p class="sub-txt-result">Kết quả tìm kiếm cho <strong>" {{ $key_search }} "</strong></p>
            <div class="list-result">
                @empty($result)
                    <h4 style="margin-left: 50px;">Không tìm thấy kết quả phù hợp</h4>
                @endempty
                @foreach ($result as $item)
                    <div class="item">
                        <a href="{{ route('product.detail', $item->id) }}" title="Text">
                            <img src="{{ asset('uploads/product/'.$item->image_prd) }}"
                                alt="">
                            <h4 class="name">{{ $item->name_prd }}</h4>
                        </a>
                        <p class="price">{{ number_format($item->price) }} <sup>đ</sup></p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
