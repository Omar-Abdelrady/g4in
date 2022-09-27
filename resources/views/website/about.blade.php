@extends('website.layouts.app')
@section('title', 'معلومات عنا - جلوبل 4 انفيست')

@section('description', 'معلومات عنا - جلوبل 4 انفيست')

@section('keywords', 'معلومات عن جلوبل 4 انفيست ')

@section('bread', 'معلومات عنا ')

@section('image', asset('assets/front-assets/img/logo-2.png'))
@section('content')
    <div class="ltn__about-us-area pt-120 pb-90 ">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="about-us-img-wrap about-img-left">
                        <img src="{{ asset('assets/front-assets/img/others/7.png') }}" alt="About Us Image">
                        <div class="about-us-img-info about-us-img-info-2 about-us-img-info-3">

                            <div class="ltn__video-img ltn__animation-pulse1">
                                <img src="{{ asset('assets/front-assets/img/others/8.png') }}" alt="video popup bg image">
                                <a class="ltn__video-icon-2 ltn__video-icon-2-border---" href="https://www.youtube.com/embed/X7R-q9rsrtU?autoplay=1&amp;showinfo=0" data-rel="lightcase:myCollection">
                                    <i class="fa fa-play"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 align-self-center">
                    <div class="about-us-info-wrap">
                        <div class="section-title-area ltn__section-title-2--- mb-20">
                            <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color">معلومات عنا</h6>
                            <h1 class="section-title">جلوبل فور انفيست<span>.</span></h1>
                            <p>لوريم إيبسوم جزر معزز الخصومات. النوم والألم؟لوريم إيبسوم جزر معزز الخصومات. النوم والألم؟</p>
                        </div>
                        <ul class="ltn__list-item-half clearfix">
                            <li>
                                <i class="flaticon-home-2"></i>
                                تاجير عقارات
                            </li>
                            <li>
                                <i class="flaticon-mountain"></i>
                                منتجات
                            </li>
                            <li>
                                <i class="flaticon-heart"></i>
                                كبونات
                            </li>
                            <li>
                                <i class="flaticon-secure"></i>
                                عمليات مومنة
                            </li>
                        </ul>

                        <div class="btn-wrapper animated">
                            <a href="service.html" class="theme-btn-1 btn btn-effect-1">جميع الخدمات</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ltn__feature-area pt-90 pb-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2--- text-center">
                        <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color">الخدمات</h6>
                        <h1 class="section-title">خدمتنا</h1>
                    </div>
                </div>
            </div>
            <div class="row ltn__custom-gutter">
                @foreach(\App\Models\Service::all() as $item)
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="ltn__feature-item ltn__feature-item-6">
                        <div class="ltn__feature-icon">
                            <span><i class="flaticon-apartment"></i></span>
                        </div>
                        <div class="ltn__feature-info">
                            <h4><a href="{{ route('service.show', $item->slug) }}">{{ $item->name }}</a></h4>
                            <p>
                                {{ $item->short_description }}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
