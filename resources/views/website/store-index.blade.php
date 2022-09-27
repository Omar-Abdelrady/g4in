@extends('website.layouts.app')

@section('title', 'منتجات - جلوبل 4 انفيست')

@section('description', 'مرحبا بك في متجر جلوبل 4 انفيست نقدم لك افضل اسعار وافضل منتجات')

@section('keywords', 'مرحبا بك في متجر جلوبل 4 انفيست نقدم لك افضل اسعار وافضل منتجات')

@section('image', asset('assets/front-assets/img/logo-2.png'))

@section('bread', 'المتجر')

@section('bread', 'المتجر')

@section('content')
    <div class="ltn__slider-area ltn__slider-3  section-bg-2 mb-100">
        <div class="ltn__slide-one-active slick-slide-arrow-1 slick-slide-dots-1">
        @foreach($four_categories as $category)
            <!-- ltn__slide-item -->
                <div
                    class="ltn__slide-item ltn__slide-item-2 ltn__slide-item-3-normal--- ltn__slide-item-3 bg-image bg-overlay-theme-black-60"
                    data-bg="{{ asset('storage/'. $category->image) }}">
                    <div class="ltn__slide-item-inner text-center">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 align-self-center">
                                    <div class="slide-item-info">
                                        <div class="slide-item-info-inner ltn__slide-animation">
                                            <div class="slide-video mb-50 d-none">
                                                <a class="ltn__video-icon-2 ltn__video-icon-2-border"
                                                   href="https://www.youtube.com/embed/tlThdr3O5Qo"
                                                   data-rel="lightcase:myCollection">
                                                    <i class="fa fa-play"></i>
                                                </a>
                                            </div>
                                            <h6 class="slide-sub-title white-color--- animated">مرحبا بك في متجرك الإلكتروني</h6>
                                            <h1 class="slide-title animated ">{{ $category->name }}</h1>
                                            <div class="slide-brief animated">
                                                <p>
                                                    {{ $category->sub_description }}
                                                </p>
                                            </div>
                                            <div class="btn-wrapper animated">
                                                <a href="{{ route('store.category', $category->slug) }}" class="theme-btn-1 btn btn-effect-1">عرض المنتجات</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!--    Services Section -->
{{--    <section class="services-section pb-90">--}}
{{--        <div class="container-fluid">--}}
{{--            <div class="row justify-content-center align-items-center categories-section-content">--}}
{{--                <div class="col-lg-3 p-0 col-12 overflow-auto h-100">--}}
{{--                    <ul class="d-flex flex-lg-column list-unstyled services-ul jumbotron overflow-auto py-2 px3">--}}
{{--                        @foreach(\App\Models\Category::all() as $key => $service)--}}
{{--                                <li class="service-tap">--}}
{{--                                    <a href="#{{"tap$key"}}" class="d-inline {{ $key == 0 ?'active' :null }}">--}}
{{--                                        <div class="hr d-none d-lg-inline-block"></div>--}}
{{--                                        {{ $service->name }}--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                        @endforeach--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--                <div class="col-lg-9 p-0 h-100">--}}
{{--                    <div class="content h-100">--}}
{{--                        @foreach(\App\Models\Category::all() as $key => $category)--}}
{{--                                <div class="tap h-100 {{ $key == 0 ?'active' : 'd-none' }}" id="{{ "tap$key" }}">--}}
{{--                                    <div--}}
{{--                                        class="content-serv h-100 d-flex justify-content-center align-items-center flex-column"--}}
{{--                                        style="background-image: url({{ asset('storage/'. $category->image) }}); background-size: cover">--}}
{{--                                        <h2>{{ $category->name }}</h2>--}}
{{--                                        <p class="text-center">--}}
{{--                                            {{ $category->short_description }}--}}
{{--                                        </p>--}}
{{--                                        <a href="{{ route('service.show', $category->slug) }}"--}}
{{--                                           class="theme-btn-1 btn btn-effect-1">عرض المنتجات</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
    <!--    End Services Section -->

    <div class="ltn__blog-area pt-115--- pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2--- text-center">
                        <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color">اقسام</h6>
                        <h1 class="section-title">الاقسام</h1>
                    </div>
                </div>
                <div class="col-12">
                    <select class="custom-select " style="font-size: 2rem" onchange="location = this.value">
                        <option>فلتر</option>
                        <option selected value>اختر قسم</option>
                    @foreach($categories as $item)
                            <option
                                value="{{ route('store.category', $item->slug) }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="ltn__product-area ltn__product-gutter mb-100">
        <!-- Ad AREA Start -->
        <div class="ltn__blog-area pt-115--- pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title-area ltn__section-title-2--- text-center">
                            <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color">منتجات</h6>
                            <h1 class="section-title">اخر المنتجات</h1>
                        </div>
                    </div>
                </div>
                <div class="row  ltn__blog-slider-one-active slick-arrow-1 ltn__blog-item-3-normal">
                @foreach($latest_products as $product)
                    <!-- ltn__product-item -->
                        <div class="col-lg-12">
                            <div
                                class="ltn__product-item ltn__product-item-4 ltn__product-item-5 text-center---">
                                <div class="product-img">
                                    <a href="{{ route('product.index', $product->slug) }}">
                                        <img
                                            class="w-100"
                                            src="{{ asset('storage/'. $product->photos[0]->image_medium) }}"
                                            alt="{{ $product->name }}">
                                    </a>
                                    <div class="real-estate-agent">
                                        <div class="agent-img">
                                            @if($product->discount != 0)
                                                <a href="{{ route('product.index', $product->slug) }}"
                                                   class="disount-class">
                                                    {{ $product->discount . '%' }}
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <h2 class="product-title">
                                        <a href="{{ route('product.index', $product->slug) }}">
                                            {{ $product->name }}
                                        </a>
                                    </h2>
                                    <ul class="ltn__list-item-2--- ltn__list-item-2-before--- ltn__plot-brief">
                                        <p>
                                            {{ \Illuminate\Support\Str::words($product->sub_description, 8) }}
                                        </p>
                                    </ul>
                                    <div class="product-hover-action">
                                        <ul>
                                            <li>
                                                <a href="{{ route('store.wishlist.add', $product->slug) }}" title="Wishlist"
                                                   data-toggle="modal"
                                                   data-target="#liton_wishlist_modal">
                                                    <i class="flaticon-heart-1"></i></a>
                                            </li>
                                            <li>
                                                <a href="{{ route('product.index', $product->slug) }}"
                                                   title="Product Details">
                                                    <i class="flaticon-add"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-info-bottom">
                                    <div class="product-price">
                                    <span
                                        class="{{ $product->discount != 0 ? 'text-line-through text-gray-dark': null }}">ريال{{ $product->price }}<label></label></span>
                                    </div>
                                    @if($product->discount != 0)
                                        <div class="product-price ">
                                            <span>ريال{{ $product->price - ( $product->price * ($product->discount / 100) ) }}<label></label></span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- ltn__product-item -->
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Ad AREA END -->

        {{--        Start section for add ad--}}
        <section class="section-add-ad mb-100" style="background-image: url(assets/front-assets/img/car-covers-online-shopping.jpg)">
            <div class="overlay">
                <div class="container h-100 w-100">
                    <div class="row justify-content-center align-items-center z-index">
                        <div class="col-12 col-sm-6">
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="mx-2">
                                    <img class="pb-3 img-fluid" src="{{asset('assets/front-assets/img/online-store.png')}}" width="280" alt="">
                                </div>
                                <div class="mx-2">
                                    <h2 style="color: #eea7aa">
                                        منتجات جلوبل 4 اين
                                    </h2>
                                    <p class="white-color">
                                        لا أحد يحب الألم بذاته، يسعى ورائه أو يبتغيه، ببساطة لأنه الألم...
                                        لا أحد يحب الألم بذاته، يسعى ورائه أو يبتغيه، ببساطة لأنه الألم...
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 text-center">
                            <a href="{{ route('store.index') }}" class="btn btn-estate rounded">تصفح المنتجات</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="ltn__product-area ltn__product-gutter mb-100">
            <!-- Ad AREA Start -->
            <div class="ltn__blog-area pt-115--- pb-70">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title-area ltn__section-title-2--- text-center">
                                <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color">منتجات</h6>
                                <h1 class="section-title">منتجات عشوائية</h1>
                            </div>
                        </div>
                    </div>
                    <div class="row  ltn__product-slider-item-four-active-full-width slick-arrow-1 ltn__blog-item-3-normal">
                    @foreach($rand_products as $product)
                        <!-- ltn__product-item -->
                            <div class="col-lg-12">
                                <div
                                    class="ltn__product-item ltn__product-item-4 ltn__product-item-5 text-center---">
                                    <div class="product-img">
                                        <a href="{{ route('product.index', $product->slug) }}">
                                            <img
                                                class="w-100"
                                                src="{{ asset('storage/'. $product->photos[0]->image_medium) }}"
                                                alt="{{ $product->name }}">
                                        </a>
                                        <div class="real-estate-agent">
                                            <div class="agent-img">
                                                @if($product->discount != 0)
                                                    <a href="{{ route('product.index', $product->slug) }}"
                                                       class="disount-class">
                                                        {{ $product->discount . '%' }}
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <h2 class="product-title">
                                            <a href="{{ route('product.index', $product->slug) }}">
                                                {{ $product->name }}
                                            </a>
                                        </h2>
                                        <ul class="ltn__list-item-2--- ltn__list-item-2-before--- ltn__plot-brief">
                                            <p>
                                                {{\Illuminate\Support\Str::words($product->sub_description, 8)}}
                                            </p>
                                        </ul>
                                        <div class="product-hover-action">
                                            <ul>
                                                <li>
                                                    <a href="{{ route('store.wishlist.add', $product->slug) }}" title="Wishlist"
                                                       data-toggle="modal"
                                                       data-target="#liton_wishlist_modal">
                                                        <i class="flaticon-heart-1"></i></a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('product.index', $product->slug) }}"
                                                       title="Product Details">
                                                        <i class="flaticon-add"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-info-bottom">
                                        <div class="product-price">
                                    <span
                                        class="{{ $product->discount != 0 ? 'text-line-through text-gray-dark': null }}">ريال{{ $product->price }}<label></label></span>
                                        </div>
                                        @if($product->discount != 0)
                                            <div class="product-price ">
                                                <span>ريال{{ $product->price - ( $product->price * ($product->discount / 100) ) }}<label></label></span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- ltn__product-item -->
                        @endforeach
                    </div>
                </div>
            </div>

    </div>
    </div>
@endsection

@section('js-code')
    <script>
        $(document).on('click', '.services-section .service-tap a', function (e) {
            $('.services-section .tap').hide('slow');
            $('.services-section .service-tap a').removeClass('active');
            $($(this).attr('href')).removeClass('d-none').show('slow');
            $(this).addClass('active');
            e.preventDefault();
            return false;
        })
    </script>
@endsection
