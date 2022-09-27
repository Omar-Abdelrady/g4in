<!doctype html>
<html class="no-js" lang="zxx">

<head>
    @include('website.layouts.head')
</head>

<body>
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade
    your browser</a> to improve your experience and security.</p>
<![endif]-->

<!-- Add your site or application content here -->

<!-- Body main wrapper start -->
<div class="body-wrapper">

@include('website.layouts.header')

@if(Route::is('website.index'))
    <!-- SLIDER AREA START (slider-3) -->
        <div class="ltn__slider-area ltn__slider-3  section-bg-2">
            <div class="ltn__slide-one-active slick-slide-arrow-1 slick-slide-dots-1">
                <!-- ltn__slide-item -->
                <div
                    class="ltn__slide-item ltn__slide-item-2 ltn__slide-item-3-normal--- ltn__slide-item-3 bg-image bg-overlay-theme-black-60"
                    data-bg="img/slider/11.jpg">
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
                                            <h6 class="slide-sub-title white-color--- animated"><span><i
                                                        class="fas fa-home"></i></span> وكالة عقارات</h6>
                                            <h1 class="slide-title animated ">ابحث عن حلمك <br> البيت من قبلنا</h1>
                                            <div class="slide-brief animated">
                                                <p>لوريم إيبسوم جزر معزز الخصومات. النوم والألم؟لوريم إيبسوم جزر معزز
                                                    الخصومات. النوم والألم؟</p>
                                            </div>
                                            <div class="btn-wrapper animated">
                                                <a href="{{ route('website.contact') }}" class="theme-btn-1 btn btn-effect-1">استفسار</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ltn__slide-item -->
                <div
                    class="ltn__slide-item ltn__slide-item-2  ltn__slide-item-3-normal--- ltn__slide-item-3 bg-image bg-overlay-theme-black-60"
                    data-bg="img/slider/12.jpg">
                    <div class="ltn__slide-item-inner  text-right">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 align-self-center">
                                    <div class="slide-item-info">
                                        <div class="slide-item-info-inner ltn__slide-animation">
                                            <h6 class="slide-sub-title white-color--- animated"><span><i
                                                        class="fas fa-home"></i></span> وكالة عقارات</h6>
                                            <h1 class="slide-title animated ">ابحث عن حلمك <br> البيت من قبلنا</h1>
                                            <div class="slide-brief animated">
                                                <p>لوريم إيبسوم جزر معزز الخصومات. النوم والألم؟لوريم إيبسوم جزر معزز
                                                    الخصومات. النوم والألم؟</p>
                                            </div>
                                            <div class="btn-wrapper animated">
                                                <a href="{{ route('website.contact') }}" class="theme-btn-1 btn btn-effect-1">استفسار</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ltn__slide-item -->
                <div
                    class="ltn__slide-item ltn__slide-item-2  ltn__slide-item-3-normal--- ltn__slide-item-3 bg-image bg-overlay-theme-black-60"
                    data-bg="img/slider/13.jpg">
                    <div class="ltn__slide-item-inner  text-left">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 align-self-center">
                                    <div class="slide-item-info">
                                        <div class="slide-item-info-inner ltn__slide-animation">
                                            <h6 class="slide-sub-title white-color--- animated"><span><i
                                                        class="fas fa-home"></i></span> وكالة عقارات</h6>
                                            <h1 class="slide-title animated ">ابحث عن حلمك <br> البيت من قبلنا</h1>
                                            <div class="slide-brief animated">
                                                <p>لوريم إيبسوم جزر معزز الخصومات. النوم والألم؟لوريم إيبسوم جزر معزز
                                                    الخصومات. النوم والألم؟</p>
                                            </div>
                                            <div class="btn-wrapper animated">
                                                <a href="{{ route('website.contact') }}" class="theme-btn-1 btn btn-effect-1">استفسار</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  -->
            </div>
        </div>
        <!-- SLIDER AREA END -->
        <!-- CAR DEALER FORM AREA START -->
@elseif(Route::is('website.store'))

    @else
    <!-- BREADCRUMB AREA START -->
        <div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image " data-bg="{{ asset('assets/front-assets/img/bg/14.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ltn__breadcrumb-inner">
                            <h1 class="page-title">@yield('bread')</h1>
                            <div class="ltn__breadcrumb-list">
                                <ul>
                                    <li><a href="index.blade.php"><span class="ltn__secondary-color"><i
                                                    class="fas fa-home"></i></span> الرئيسية</a></li>
                                    <li>@yield('bread')</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- BREADCRUMB AREA END -->
    @endif
    @include('admin.components.flash session')
    @include('admin.components.errors')

    @yield('content')

    @include('website.layouts.footer')

</div>
<!-- preloader area start -->
<div class="preloader" id="preloader">
    <div class="preloader-inner">
        <div class="spinner">
            <div class="dot1"></div>
            <div class="dot2"></div>
        </div>
    </div>
</div>
<!-- preloader area end -->


@include('website.layouts.scripts')
@yield('js-code')

</body>
</html>

