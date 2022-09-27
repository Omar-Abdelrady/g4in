@extends('website.layouts.app')
@section('title', 'خدماتنا - جلوبل 4 انفيست')

@section('description', 'خدماتنا - جلوبل 4 انفيست')

@section('keywords', 'خدمات جلوبل 4 انفيست ')

@section('bread', 'خدماتنا ')

@section('image', asset('assets/front-assets/img/logo-2.png'))
@section('content')
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
