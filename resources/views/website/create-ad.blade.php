@extends('website.layouts.app')

@section('title', 'اضافة عقار مع جلوبل4انفيست')

@section('image', asset('assets/front-assets/img/logo-2.png'))

@section('bread', 'اضف عقارك')

@section('description', 'بيع عقارك بالسعر المناسب مع جلوبل4انفيست .. الان يمكنك نشر عقارك بشكل مجاني علي جلوبل 4 انفيست وسوف تتلقي عروض رائعة')

@section('content')
    <!-- LOGIN AREA START -->
    <div class="ltn__appointment-area pt-115--- pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('ads.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div
                            class="ltn__tab-menu ltn__tab-menu-3 ltn__tab-menu-top-right-- text-uppercase--- text-center">
                            <div class="nav">
                                <a class="show active next-1 " data-toggle="tab" href="#liton_tab_3_1">1. ملاحظات العقار</a>
                                <a data-toggle="tab" href="#liton_tab_3_2" class="">2. الصور</a>
                                <a data-toggle="tab" href="#liton_tab_3_3" class="">3. الموقع</a>
                                <a data-toggle="tab" href="#liton_tab_3_4" class="">4. تفاصيل الاتصال</a>
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="liton_tab_3_1">
                                <div class="ltn__apartments-tab-content-inner">
                                    <h6>نوع العقار</h6>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="input-item input-item-textarea ltn__custom-icon">
                                                <input value="{{ old('title') }}" type="text" name="title" placeholder="*العنوان" >
                                            </div>
                                            <div class="input-item input-item-textarea ltn__custom-icon">
                                                <textarea name="description" placeholder="ملاحظات العقار" >{{ old('description') }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <h6>السعر</h6>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-item  input-item-textarea ltn__custom-icon">
                                                <input value="{{ old('price') }}" type="text" name="price" placeholder="السعر" >
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="input-item input-item-textarea ltn__custom-icon">
                                                <input value="{{ old('space') }}" type="text" name="space" placeholder="المساحة" >
                                            </div>
                                        </div>
                                    </div>
                                    <h6>النوع</h6>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="input-item">
                                                <select name="sale_or_rent" class="nice-select" >
                                                    <option selected value>اختر حالة العقار</option>
                                                    <option {{ old('sale_or_rent') == 0 ? 'selected' : null }} value="0" >للبيع</option>
                                                    <option {{ old('sale_or_rent') == 1 ? 'selected' : null }} value="1">للإجار</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-wrapper text-center--- mt-0">
                                        <!-- <button type="submit" class="btn theme-btn-1 btn-effect-1 text-uppercase" >Next Step</button> -->
                                        <a href="#" class="btn theme-btn-1 btn-effect-1 text-uppercase next-1">التالى</a>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="liton_tab_3_2">
                                <div class="ltn__product-tab-content-inner">
                                    <h6>صور العقار</h6>
                                    <input type="file" multiple id="myFile" name="images[]" class="btn theme-btn-3 mb-10" ><br>
                                    <p>
                                        <small>* الصورة تكون بحجم 500 * 500</small><br>
                                        <small>* PDF or png Or jpg</small><br>
                                        <small>* Images might take longer to be processed.</small>
                                    </p>


                                    <div class="btn-wrapper text-center--- mt-0">
                                        <!-- <button type="submit" class="btn theme-btn-1 btn-effect-1 text-uppercase" >Next Step</button> -->
                                        <a href="#" class="btn theme-btn-1 btn-effect-1 text-uppercase next-1">السابق</a>
                                        <a href="#" class="btn theme-btn-1 btn-effect-1 text-uppercase next-2">التالى</a>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="liton_tab_3_3">
                                <div class="ltn__product-tab-content-inner">
                                    <h6>موقع العقار</h6>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-item">
                                                    <select class="nice-select" id="country_id" >
                                                        <option selected value>اختر الدولة</option>
                                                        @foreach($countries as $item)
                                                            <option {{ old('city') == $item->id ? 'selected' : null }} value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="input-item d-none content-cities">
                                                <select class="nice-select" name="city_id" id="cities" >
                                                    <option selected value>اختر المدينة</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-item input-item-textarea ltn__custom-icon">
                                                <input value="{{ old('address') }}" type="text" name="address" placeholder="*العوان" >
                                            </div>
                                        </div>
{{--                                        <div class="col-lg-12">--}}
{{--                                            <div class="property-details-google-map mb-60">--}}
{{--                                                <iframe--}}
{{--                                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9334.271551495209!2d-73.97198251485975!3d40.668170674982946!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25b0456b5a2e7%3A0x68bdf865dda0b669!2sBrooklyn%20Botanic%20Garden%20Shop!5e0!3m2!1sen!2sbd!4v1590597267201!5m2!1sen!2sbd"--}}
{{--                                                    width="100%" height="100%" frameborder="0" allowfullscreen=""--}}
{{--                                                    aria-hidden="false" tabindex="0"></iframe>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}


                                    </div>
                                    <div class="btn-wrapper text-center--- mt-0">
                                        <!-- <button type="submit" class="btn theme-btn-1 btn-effect-1 text-uppercase" >Next Step</button> -->
                                        <a href="#" class="btn theme-btn-1 btn-effect-1 text-uppercase next-2">السابق</a>
                                        <a href="#" class="btn theme-btn-1 btn-effect-1 text-uppercase next-3">التالى</a>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="liton_tab_3_4">
                                <div class="ltn__product-tab-content-inner">
                                    <h6>تفاصيل الاتصال</h6>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-item input-item-textarea ltn__custom-icon">
                                                <input value="{{ old('advertiser_name') }}" type="text" name="advertiser_name" placeholder="اسم المعلن" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-item input-item-textarea ltn__custom-icon">
                                                <input type="text" name="phone" value="{{ old('phone') }}" placeholder="رقم الهاتف" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-item input-item-textarea ltn__custom-icon">
                                                <input type="text" name="second_phone" value="{{ old('second_phone') }}" placeholder="رقم هاتف بديل" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-item input-item-textarea ltn__custom-icon">
                                                <input value="{{ old('advertiser_email') }}" type="text" name="advertiser_email" placeholder="البريد الاليكترونى)" >
                                            </div>
                                        </div>
                                    </div>


                                    <div class="btn-wrapper text-center--- mt-0">
                                        <!-- <button type="submit" class="btn theme-btn-1 btn-effect-1 text-uppercase" >Next Step</button> -->
                                        <a href="#" class="btn theme-btn-1 btn-effect-1 text-uppercase next-3">السابق</a>
                                        <button  class="btn theme-btn-1 btn-effect-1 text-uppercase">اضف</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-code')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        $(document).on('click', '.next-1', function (e) {
            e.preventDefault();
            var content1 = $('#liton_tab_3_1');
            if (content1.hasClass('active show')){
                content1.removeClass('active show');
                $('#liton_tab_3_2').addClass('active show')

                return false;
            }
            $('#liton_tab_3_2').removeClass('active show')
            content1.addClass('active show');
            return false
        })
        $(document).on('click', '.next-2', function (e) {
            e.preventDefault();
            var content1 = $('#liton_tab_3_2');
            if (content1.hasClass('active show')){
                content1.removeClass('active show');
                $('#liton_tab_3_3').addClass('active show')
                return false;
            }
            $('#liton_tab_3_3').removeClass('active show')
            content1.addClass('active show');
            return false
        })
        $(document).on('click', '.next-3', function (e) {
            e.preventDefault();
            var content1 = $('#liton_tab_3_3');
            if (content1.hasClass('active show')){
                content1.removeClass('active show');
                $('#liton_tab_3_4').addClass('active show')
                return false;
            }
            $('#liton_tab_3_4').removeClass('active show')
            content1.addClass('active show');
            return false
        })
    //    Start get cities Script
        function addCities(cities) {
            $('.content-cities').removeClass('d-none')
            $('#cities').find('option').remove().end().append(`<option selected value>اختر المدينة</option>`);
            $.each(cities, function (i, item) {
                $('#cities').append(`<option value='${item.id}'>${item.name}</option>`)
            })
        }
        $(document).on('change', '#country_id', function () {
            var Id = this.value;
            if (Id == '')
            {
                $('#cities').find('option').remove().end().append(`<option selected value>اختر المدينة</option>`);
                $('.content-cities').addClass('d-none')
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
