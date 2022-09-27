@extends('website.layouts.app')

@section('title', ' - ﺟﻠﻮﺑﻞ 4 اﻧﻔﻴﺴﺖ '.$ad->title)

@section('description', $ad->description)

@section('bread', $ad->title)

@section('image', asset('storage/'.$ad->photos[0]->image_medium))

@section('content')
    <!-- IMAGE SLIDER AREA START (img-slider-3) -->
    <div class="ltn__img-slider-area mb-90">
        <div class="container-fluid">
            <div class="row ltn__image-slider-5-active slick-arrow-1 slick-arrow-1-inner ltn__no-gutter-all">
                @foreach($ad->photos as $photo)
                    <div class="col-lg-12">
                        <div class="ltn__img-slide-item-4">
                            <a href="{{ asset('storage/'. $photo->image) }}" data-rel="lightcase:myCollection">
                                <img class="w-100" src="{{ asset('storage/'. $photo->image_medium) }}" alt="Image">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


    <!-- SHOP DETAILS AREA START -->
    <div class="ltn__shop-details-area pb-10">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="ltn__shop-details-inner ltn__page-details-inner mb-60">
                        <div class="ltn__blog-meta">
                            <ul>
                                <li class="ltn__blog-category">
                                    <a href="#">{{ $ad->category->name }}</a>
                                </li>
                                <li class="ltn__blog-category">
                                    <a class="bg-orange" href="#">
                                        {{ $ad->sale_or_rent == 0 ? 'ﻟﻠﺒﻴﻊ': 'ﻟﻹﻳﺠﺎﺭ' }}
                                    </a>
                                </li>
                                <li class="ltn__blog-date">
                                    <i class="far fa-calendar-alt"></i>
                                    {{ $ad->updated_at->format('Y-M-D') }}
                                </li>
                            </ul>
                        </div>
                        <h1>{{ $ad->title }}</h1>
                        <label><span class="ltn__secondary-color"><i class="flaticon-pin"></i></span>
                            {{ $ad->city->name .', '. $ad->city->country->name }}
                        </label>
                        <h4 class="title-2">اﻟﺴﻌﺮ</h4>
                        <p>
                            {{ $ad->price }} <strong> ﺭﻳﺎﻝ</strong>
                        </p>
                        <h4 class="title-2">اﻟﻮﺻﻒ</h4>
                        <p class="sumernote-content">
                            {!! $ad->description !!}
                        </p>

                        <h4 class="title-2">معلومات العقار</h4>
                        <div class="property-detail-info-list section-bg-1 clearfix mb-60">
                            <ul>
                                @if (isset($ad->space))
                                    <li><label>المساحة:</label> <span>{{ $ad->space }} متر مربع</span></li>
                                @endif
                                @if (isset($ad->num_of_rooms))
                                    <li><label>عدد الغرف:</label> <span>{{ $ad->num_of_rooms }}</span></li>
                                @endif
                                @if (isset($ad->num_of_kitchens))
                                    <li><label>عدد المطابخ:</label> <span>{{ $ad->num_of_kitchens }}</span></li>
                                @endif
                                @if (isset($ad->num_of_toilets))
                                    <li><label>عدد دورات المياه:</label> <span>{{ $ad->num_of_toilets }}</span></li>
                                @endif
                                @if (isset($ad->num_of_floors))
                                    <li><label>عدد الطوابق:</label> <span>{{ $ad->num_of_floors }}</span></li>
                                @endif
                                @if (isset($ad->num_of_apartments))
                                    <li><label>عدد الشقق:</label> <span>{{ $ad->num_of_apartments }}</span></li>
                                @endif
                                @if (isset($ad->num_of_shops))
                                    <li><label>عدد المحلات:</label> <span>{{ $ad->num_of_shops }}</span></li>
                                @endif
                                @if (isset($ad->block_num))
                                    <li><label>رقم البلوك:</label> <span>{{ $ad->block_num }}</span></li>
                                @endif
                                @if (isset($ad->place_num))
                                    <li><label>رقم القطعة:</label> <span>{{ $ad->place_num }}</span></li>
                                @endif

                                @if (!empty($general_specifications))
                                    @foreach ($general_specifications as $item)
                                        <li><label>{{ $item->key }}:</label> <span>{{ $item->value }}</span></li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>

                        @if(isset($ad->attachments[0]))
                            <h4 class="title-2">ﻣﺮﻓﻘﺎﺕ</h4>
                            <div class="property-detail-info-list section-bg-1 clearfix mb-60">
                                <ul>
                                    @foreach($ad->attachments as $item)
                                        <li><label>{{ $item->attached }}:</label> <span><img src="{{ asset('assets/front-assets/img/icons/ads/checked.png') }}" width="35" alt=""></span></li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if(isset($ad->writeAttachments[0]))
                            <h4 class="title-2">ﻣﺮﻓﻘﺎﺕ</h4>
                            <div class="property-detail-info-list section-bg-1 clearfix mb-60">
                                <ul>
                                    @foreach($ad->writeAttachments as $item)
                                        <li><label>{{ $item->name }}:</label> <span>{{ $item->pivot->body }}</span></li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if(isset($ad->chart))
                            <h4 class="title-2">
                                ﻣﺨﻄﻂ ﺑﻴﺎﻧﻲ
                            </h4>
                            <div class="row">
                                <div class="col-12">
                                    <p>{{ $ad->chart->description }}</p>

                                    @if(isset($ad->chart->photo))
                                        <h5>ﺻﻮﺭﺓ اﻟﻤﺨﻄﻂ</h5>
                                        <div class="ltn__img-slide-item-4">
                                            <a href="{{ asset('storage/'. $ad->chart->photo) }}" data-rel="lightcase:myCollection">
                                                <img style="width: 70%;" src="{{ asset('storage/' . $ad->chart->photo) }}" alt="Image">
                                            </a>
                                        </div>
                                    @endif

                                    @if(isset($ad->chart->video))
                                        <a class="theme-btn-1 btn btn-effect-1" href="{{ asset('storage/' . $ad->chart->video) }}">ﻣﺸﺎﻫﺪﺓ ﻓﻴﺪﻳﻮ ﻟﻠﻤﺨﻄﻂ<img
                                            src="{{ asset('assets/front-assets/img/video-icon.png') }}" width="35" alt=""></a>
                                    @endif

                                    @if(isset($ad->chart->pdf))
                                        <a class="theme-btn-1 btn btn-effect-1" href="{{ route('ads.chart_download', $ad->slug) }}">ﺗﺤﻤﻴﻞ اﻟﻤﺨﻄﻂ<img
                                            src="{{ asset('assets/front-assets/img/pdf-file-format-symbol.png') }}" width="35" alt=""></a>
                                    @endif
                                </div>
                            </div>
                        @endif

                        @if (!empty($chart_specifications))
                            <h5>تفاصيل اﻟﻤﺨﻄﻂ</h5>
                            <div class="property-detail-info-list section-bg-1 clearfix mb-60">
                                <ul>
                                    @foreach ($chart_specifications as $item)
                                        <li><label>{{ $item->key }}:</label> <span>{{ $item->value }}</span></li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if ($ad->agent)
                            <h4 class="title-2">اﻟﻮﻛﻴﻞ اﻟﺨﺎﺹ ﺑﺎﻻﻋﻼﻥ</h4>
                            <div class="row">
                                <div class="col-12">
                                    <ul>
                                        <li>
                                            <div class="ltn__comment-item clearfix">
                                                <div>
                                                    <h5><a href="#">{{ $ad->agent->name }}</a></h5>
                                                    <h6>
                                                        <span>اﻟﺒﺮﻳﺪ اﻻﻟﻜﺘﺮﻭﻧﻲ</span> : <a class="text-bold"
                                                                                            href="mailto:{{ $ad->agent->email }}">{{ $ad->agent->email }}</a>
                                                        <br>
                                                        <span>ﺭﻗﻢ اﻟﻬﺎﺗﻒ</span> : <a class="text-bold"
                                                                                     href="tel:{{ $ad->agent->phone }}">{{ $ad->agent->phone }}</a>
                                                    </h6>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @endif

                        <h4 class="title-2">اﻋﻼﻧﺎﺕ ﻣﺘﻌﻠﻘﺔ</h4>
                        <div class="row">
                        @foreach($ads as $item)
                            <!-- ltn__product-item -->
                                <div class="col-xl-6 col-sm-6 col-12">
                                    @include('website.components.ad_box')
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
