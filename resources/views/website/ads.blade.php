@extends('website.layouts.app')

@section('title', 'عقارات - جلوبل 4 انفيست')

@section('description', 'توفر لك جلوبل 4 انفيست مجموعه من العقارات اللتي تناسبك')

@section('bread', 'عقارات')

@section('image', asset('assets/front-assets/img/logo-2.png'))

@section('content')
    <div class="ltn__product-area ltn__product-gutter mb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="liton_product_grid">
                            <div class="ltn__product-tab-content-inner ltn__product-grid-view">
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
                                                    <option selected value>اختر الحالة</option>
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

                                    @foreach($ads as $item)
                                        <div class="col-lg-4 col-sm-6 col-12">
                                            @include('website.components.ad_box')
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ltn__pagination-area text-center">
                        <div class="ltn__pagination">
                            {{ $ads->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
        })
    </script>
@endsection
