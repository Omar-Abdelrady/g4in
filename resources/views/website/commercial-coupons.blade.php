@extends('website.layouts.app')

@section('title', 'كوبونات خصم ودعاية - جلوبل 4 انفست')

@section('bread', 'كوبونات خصم')

@section('description', 'مع جلوبل 4 انفيست سوف تحصل علي العديد من كوبونات الخصم')

@section('keywords', 'كوبونات خصم, كوبونات, خصومات,خصومات,')

@section('image', asset('assets/front-assets/img/logo-2.png'))

@section('content')
    <div class="ltn__product-area ltn__product-gutter mb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="liton_product_list">
                            <div class="ltn__product-tab-content-inner ltn__product-list-view">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <!-- Search Widget -->
                                        <div class="ltn__search-widget mb-30">
                                            <form action="{{ route('coupon.search') }}" method="get">
                                                @csrf
                                                <input type="text" name="search" placeholder="بحث" required>
                                                <button type="submit"><i class="fas fa-search"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-12 my-5 py-5">
                                        <div class="section-title-area ltn__section-title-2--- text-center">
                                            <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color">دعاية</h6>
                                            <h1 class="section-title">دعاية وإعلانات</h1>
                                        </div>
                                        <div class="row  ltn__category-slider-active slick-arrow-1">
                                        @foreach($commercials as $item)
                                            <!-- Real estate Item -->
                                                <div class="col-lg-12">
                                                    <div class="rounded" style="height: 250px;width: 250px; background-image: url({{ asset('storage/'.$item->image)}}); background-size: cover">
                                                        <a href="{{ route('commercial.show', $item->slug) }}">
                                                            <div class="d-flex align-items-end justify-content-start h-100 w-100">
                                                                <div class="pl-4">
                                                                    <h3 class="pr-2 mb-0 text-white">
                                                                        {{ $item->name }}
                                                                    </h3>
                                                                    <p>
                                                                        {{ '' }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <!-- Real estate Item -->
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ltn__pagination-area text-center">
                        <div class="ltn__pagination">
{{--                            {!! $coupons->links() !!}--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--        Start section for add ad--}}
        <section class="section-add-ad mb-100" style="background-image: url({{ asset('assets/front-assets/img/6-Ways-to-Improve-your-Coupon-Marketing-Strategy-and-Increase-Sales.png') }})">
            <div class="overlay">
                <div class="container h-100 w-100">
                    <div class="row justify-content-center align-items-center z-index">
                        <div class="col-12 col-sm-6">
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="mx-2">
                                    <img class="pb-3 img-fluid" src="{{asset('assets/front-assets/img/coupons.png')}}" width="280" alt="">
                                </div>
                                <div class="mx-2">
                                    <h2 style="color: #eea7aa">
                                        اضافة كوبونك معنا
                                    </h2>
                                    <p class="white-color">
                                        لا أحد يحب الألم بذاته، يسعى ورائه أو يبتغيه، ببساطة لأنه الألم...
                                        لا أحد يحب الألم بذاته، يسعى ورائه أو يبتغيه، ببساطة لأنه الألم...
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 text-center">
                            <a href="{{ route('website.contact') }}" class="btn btn-estate rounded">تواصل معنا</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title-area ltn__section-title-2--- text-center">
                            <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color">كوبونات</h6>
                            <h1 class="section-title">آخر الكوبونات</h1>
                        </div>

                        <div class="tab-content">
                        <div class="row">

                        @foreach($coupons as $item)
                            <!-- ltn__product-item -->
                                <div class="col-lg-3 col-md-4 col-sm-6 col-12 p-2">
                                    <div class="bg-gray-dark coupon-content">
                                        <div class="p-2 text-center">
                                            <img src="{{ asset('storage/'. $item->image) }}" class="rounded my-2" alt="">
                                            <h2 class="product-title">
                                                {{ $item->name }}
                                            </h2>
                                            <div>
                                                {{ $item->description }}
                                            </div>
                                            <a href="{{ route('coupon.get',$item->id) }}"
                                               class="theme-btn-1 btn btn-effect-1" style="padding: 10px">الحصول علي الكوبون</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <div class="ltn__pagination-area text-center">
                            <div class="ltn__pagination">
                                <a href="{{ route('coupon.index') }}" class="theme-btn-1 btn btn-effect-1">عرض المزيد من الكوبونات</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
