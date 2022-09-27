@extends('website.layouts.app')

@section('title', 'عقارات - جلوبل 4 انفيست')

@section('description', 'توفر لك جلوبل 4 انفيست مجموعه من العقارات اللتي تناسبك')

@section('bread', 'عقارات')

@section('image', asset('assets/front-assets/img/logo-2.png'))

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 my-2">
                <a class="theme-btn-1 btn btn-effect-1" href="{{ route('ads.create') }}">اضف إعلانك</a>
            </div>
            <div class="col-lg-12">
                <form action="{{ route('ads.search') }}" method="get" class="row">
                    @csrf
                    <div class="form-group col-md-4 col-12">
                        <select name="country_id" id="countries" class="form-control">
                            <option selected value>اختار البلد</option>
                            @foreach(\App\Models\Country::all() as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4 col-12">
                        <select name="category_id" class="form-control">
                            <option selected value>اختار الفئة</option>
                            @foreach(\App\Models\AdCategory::all() as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4 col-12">
                        <select name="sale_or_rent" class="form-control">
                            <option value="0">للبيع</option>
                            <option value="1">للإيجار</option>
                        </select>
                    </div>
                    <div class="col-12 cities d-none mb-3">
                        <select class="form-control" name="city_id" id="cities">
                            <option selected value>اختار المدينة</option>
                        </select>
                    </div>
                    <!-- Search Widget -->
                    <div class="ltn__search-widget mb-30 col-12">
                        <input type="text" name="search" placeholder="بحث عن...">
                        <button type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </form>
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
                            <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color">عقارات</h6>
                            <h1 class="section-title">اخر عقارات</h1>
                        </div>
                    </div>
                </div>
                <div class="row  ltn__blog-slider-one-active slick-arrow-1 ltn__blog-item-3-normal">
                @foreach(\App\Models\Ad::query()->where('ad_status', 1)->latest()->take(4)->get() as $item)
                    <!-- Real estate Item -->
                        <div class="col-lg-12">
                            @include('website.components.ad_box')
                        </div>
                        <!-- Real estate Item -->
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        <a href="{{ route('ads.index') }}" class="theme-btn-1 btn btn-effect-1 my-2">عرض كل الاعلانات</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ad AREA END -->

{{--        Start section for add ad--}}
        <section class="section-add-ad">
            <div class="overlay">
                <div class="container h-100 w-100">
                    <div class="row justify-content-center align-items-center z-index">
                        <div class="col-12 col-sm-6">
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="mx-2">
                                    <img class="pb-3 img-fluid" src="{{asset('assets/front-assets/img/estate/4291723-200.png')}}" width="280" alt="">
                                </div>
                                <div class="mx-2">
                                    <h2 style="color: #eea7aa">
                                        اضافة عقار
                                    </h2>
                                    <p class="white-color">
                                        لا أحد يحب الألم بذاته، يسعى ورائه أو يبتغيه، ببساطة لأنه الألم...
                                        لا أحد يحب الألم بذاته، يسعى ورائه أو يبتغيه، ببساطة لأنه الألم...
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 text-center">
                            <a href="{{ route('ads.create') }}" class="btn btn-estate rounded">اضف عقارك</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <div class="ltn__product-area ltn__product-gutter mb-100 section-countries">
        <!-- Ad AREA Start -->
        <div class="ltn__blog-area pt-115--- pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title-area ltn__section-title-2--- text-center">
                            <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color">الدول</h6>
                            <h1 class="section-title">عقارات دولية علي المنصة</h1>
                        </div>
                    </div>
                </div>
                <div class="row  ltn__blog-slider-one-active-counties slick-arrow-1">
                @foreach(\App\Models\Country::query()->latest()->take(4)->get() as $item)
                    <!-- Real estate Item -->
                        <div class="col-lg-12">
                            <div class="rounded" style="height: 250px;width: 250px; background-image: url({{ asset('storage/'.$item->image)}}); background-size: cover">
                                <a href="{{ route('ads.country',$item->id) }}">
                                    <div class="d-flex align-items-end justify-content-start h-100 w-100">
                                        <div class="pl-4">
                                            <h3 class="pr-2 mb-0 text-white">
                                                {{ $item->name }}
                                            </h3>
                                            <p>
                                                {{ $item->getAdsCount() }}
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
        <!-- Ad AREA END -->
    </div>

    <section class="section-agents mb-100 " style="background-image: url({{ asset('assets/front-assets/img/estate/dd0c732cb77f9e8df3fe76821357f40d') }}); background-size: cover;">
        <div class="testimonials">
            <h2 class="h1">الوكلاء المعتمدين لدينا</h2>
            <div class="slider-container">
                <div class="slider row">
                    @foreach(\App\Models\AdAgent::query()->latest()->take(4)->get() as $item)
                    <div class="col-12">
                        <div class="slide-box">
                            <!-- Testi One -->
                            <p class="comment">
                                {{ $item->description }}
                            </p>
                            <img src="{{ asset('storage/'. $item->image) }}" />
                            <h3 class="name">{{ $item->name }}</h3>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js-code')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        //    Start get cities Script
        function addCities(cities) {
            $('.cities').removeClass('d-none')
            $('#cities').find('option').remove().end().append(`<option selected value>اختر المدينة</option>`);
            $.each(cities, function (i, item) {
                $('#cities').append(`<option value='${item.id}'>${item.name}</option>`)
            })
        }
        $(document).on('change', '#countries', function () {
            var Id = this.value;
            if (Id == '')
            {
                $('#cities').find('option').remove().end().append(`<option selected value>اختر المدينة</option>`);
                $('.cities').addClass('d-none')
                return false
            }
            axios({
                method: 'get',
                url: '/cities/'+Id,
                date: Id
            }).then(function (res) {
                if (res.status == 200)
                {
                    addCities(res.data)
                    return true
                }
            })
        }
        )

        $('.slider').slick({
            rtl: true,
            arrows: true,
            dots: true,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 1000,
            speed: 300,
            slidesToShow: 1,
            slidesToScroll: 1,
            prevArrow: '<a class="slick-prev"><i class="fas fa-arrow-right" alt="Arrow Icon"></i></a>',
            nextArrow: '<a class="slick-next"><i class="fas fa-arrow-left" alt="Arrow Icon"></i></a>',
            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        arrows: false,
                        dots: true,
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                        dots: true,
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 580,
                    settings: {
                        arrows: false,
                        dots: true,
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        })


    </script>
@endsection

