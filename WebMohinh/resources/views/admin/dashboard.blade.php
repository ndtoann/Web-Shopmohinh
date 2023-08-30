@extends('layouts.admin')

@section('content-admin')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="home-tab">
                    <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview"
                                    role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link border-0" id="more-tab" data-bs-toggle="tab" href="#more"
                                    role="tab" aria-selected="false">More</a>
                            </li>
                        </ul>
                        <div>
                            <div class="btn-wrapper">
                                <a href="#" class="btn btn-otline-dark align-items-center"><i class="icon-share"></i>
                                    Share</a>
                                <a href="#" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                                <a href="#" class="btn btn-primary text-white me-0"><i class="icon-download"></i>
                                    Export</a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content tab-content-basic">
                        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="statistics-details d-flex align-items-center justify-content-between">
                                        <div>
                                            <p class="statistics-title">Sản phẩm</p>
                                            <h3 class="rate-percentage">{{ $countProduct }} sản phẩm</h3>
                                            <p class="text-success d-flex"><i class="mdi mdi-menu-up"></i><span></span></p>
                                        </div>
                                        <div>
                                            <p class="statistics-title">Đánh giá</p>
                                            <h3 class="rate-percentage">{{ $countReview }} đánh giá</h3>
                                            <p class="text-success d-flex"><i
                                                    class="mdi mdi-menu-up"></i><span>{{ $countReviewNew }} đánh giá
                                                    mới</span></p>
                                        </div>
                                        <div>
                                            <p class="statistics-title">Đơn hàng</p>
                                            <h3 class="rate-percentage">{{ $countOrder }} đơn hàng</h3>
                                            <p class="text-success d-flex"><i
                                                    class="mdi mdi-menu-up"></i><span>{{ $countOrderNew }} đon hàng hôm
                                                    nay</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
