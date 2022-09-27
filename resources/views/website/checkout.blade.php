@extends('website.layouts.app')

@section('title', 'عملية الدفع - جلوبل 4 انفيست')

@section('description', 'تمنحك جلوبل 4 انفيست عملية دفع مؤمنة ')

@section('keywords', 'جلوبل 4 انفيست ')

@section('image', asset('assets/front-assets/img/logo-2.png'))

@section('bread', 'عملية الدفع')

@section('content')
    <!-- WISHLIST AREA START -->
    <div class="ltn__checkout-area mb-105">
        <div class="container">
            <div class="row">
                @if(auth()->guard('web')->user()->with('order_information')->first()->order_information == null)
                    <div class="col-lg-12">


                        <div class="ltn__checkout-inner">
                            <div class="ltn__checkout-single-content ltn__returning-customer-wrap">
                                <h3>من فضلك قم بإدخال بيانات النقل اولا</h3>

                            </div>

                            <div class="ltn__checkout-single-content mt-50">
                                <h4 class="title-2">تفاصيل الفاتورة</h4>
                                <div class="ltn__checkout-single-content-info">
                                    <form action="{{ route('order.store') }}" method="post">
                                        @csrf
                                        <h6>تفاصيل</h6>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-item input-item-name ltn__custom-icon">
                                                    <input value="{{ old('first_name') }}" type="text" name="first_name"
                                                           placeholder="الاسم الاول">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-item input-item-name ltn__custom-icon">
                                                    <input value="{{ old('last_name') }}" type="text" name="last_name"
                                                           placeholder="الاسم الاخير">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-item input-item-email ltn__custom-icon">
                                                    <input type="email" value="{{ old('email') }}" name="email"
                                                           placeholder="البريد الاليكتروني">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-item input-item-phone ltn__custom-icon">
                                                    <input type="text" name="phone" value="{{ old('phone') }}"
                                                           placeholder="الهاتف">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <h6>البلد</h6>
                                                <div class="input-item">
                                                    <input type="text" placeholder="المدينة" value="{{ old('country') }}"
                                                           name="country">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <h6>المدينه</h6>
                                                <div class="input-item">
                                                    <input type="text" placeholder="المدينة" value="{{ old('city') }}"
                                                           name="city">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <h6>الرقم البريدي</h6>
                                                <div class="input-item">
                                                    <input type="text" name="zip" value="{{ old('zip') }}" placeholder="1253" >
                                                </div>
                                            </div>
                                        </div>
                                        <h6>العنوان</h6>
                                        <div class="input-item">
                                                        <textarea name="address"
                                                                  placeholder="العنوان التفصيلي">{{ old('address') }}</textarea>
                                        </div>
                                        <h6>ملاحظات الطلب</h6>
                                        <div class="input-item input-item-textarea ltn__custom-icon">
                                            <textarea name="comment"
                                                      placeholder="ملاحظات الطلب">{{ old('comment') }}</textarea>
                                        </div>
                                        <button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit">حفظ
                                            البيانات
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-lg-12">


                        <div class="ltn__checkout-inner">
                            <div class="ltn__checkout-single-content ltn__returning-customer-wrap">
                                <h3>يمكنك التعديل علي تفاصيل عنوان الفاتورة</h3>
                            </div>

                            <div class="ltn__checkout-single-content mt-50">
                                <h4 class="title-2">تفاصيل الفاتورة</h4>
                                <div class="ltn__checkout-single-content-info">
                                    <form action="{{ route('order.update') }}" method="post">
                                        @csrf
                                        <h6>تفاصيل</h6>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-item input-item-name ltn__custom-icon">
                                                    <input
                                                        value="{{ old('first_name') ? old('first_name') : auth()->guard('web')->user()->order_information->first_name }}"
                                                        type="text" name="first_name" placeholder="الاسم الاول">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-item input-item-name ltn__custom-icon">
                                                    <input
                                                        value="{{  old('last_name') ? old('last_name') : auth()->guard('web')->user()->order_information->last_name}}"
                                                        type="text" name="last_name" placeholder="الاسم الاخير">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-item input-item-email ltn__custom-icon">
                                                    <input type="email"
                                                           value="{{ old('email') ? old('email') : auth()->guard('web')->user()->order_information->email }}"
                                                           name="email"
                                                           placeholder="البريد الاليكتروني">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-item input-item-phone ltn__custom-icon">
                                                    <input type="text" name="phone"
                                                           value="{{ old('phone') ? old('phone') : auth()->guard('web')->user()->order_information->phone }}"
                                                           placeholder="الهاتف">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <h6>البلد</h6>
                                                <div class="input-item">
                                                    <select class="nice-select" name="country">
                                                        <option selected
                                                                value="{{ auth()->guard('web')->user()->order_information->country }}">{{ auth()->guard('web')->user()->order_information->country }}</option>
                                                        <option value="جدة">جدة</option>
                                                        <option value="جدة">جدة</option>
                                                        <option value="جدة">جدة</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <h6>المدينه</h6>
                                                <div class="input-item">
                                                    <input type="text" placeholder="المدينة"
                                                           value="{{ old('city') ? old('city') : auth()->guard('web')->user()->order_information->city }}"
                                                           name="city">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <h6>الرقم البريدي</h6>
                                                <div class="input-item">
                                                    <input type="text"
                                                           name="zip" value="{{ old('zip') ? old('zip') : auth()->guard('web')->user()->order_information->zip }}"
                                                    " placeholder="١٢٣">
                                                </div>
                                            </div>
                                        </div>
                                        <h6>العنوان</h6>
                                        <div class="input-item">
                                                        <textarea name="address"
                                                                  placeholder="العنوان التفصيلي">{{ old('address') ? old('address') : auth()->guard('web')->user()->order_information->address }}</textarea>
                                        </div>
                                        <h6>ملاحظات الطلب</h6>
                                        <div class="input-item input-item-textarea ltn__custom-icon">
                                            <textarea name="comment"
                                                      placeholder="ملاحظات الطلب">{{ old('comment') ? old('comment') : auth()->guard('web')->user()->order_information->comment }}</textarea>
                                        </div>
                                        <button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit">
                                            تعديل
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if(auth()->guard('web')->user()->with('order_information')->first()->order_information == null)
                @else
                    <div class="col-lg-6">
                        <div class="ltn__checkout-payment-method mt-50">
                            <h4 class="title-2">بيانات الدفع</h4>
                            <div id="checkout_accordion_1">
                            <!-- card -->
                                <div class="card">
                                    <h5 class="collapsed ltn__card-title" data-toggle="collapse"
                                        data-target="#faq-item-2-3"
                                        aria-expanded="true">
                                        كردت كارت <img src="{{ asset('assets/front-assets/img/icons/payment-3.png') }}"
                                                       alt="#">
                                    </h5>
                                    <div id="faq-item-2-3" class="collapse" data-parent="#checkout_accordion_1">
                                        <div class="card-body">
                                            <form action="{{ route('payment.shopper') }}" class="paymentWidgets"
                                                  data-brands="VISA MASTER"></form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ltn__payment-note mt-30 mb-30">
                                <p>Your personal data will be used to process your order, support your experience
                                    throughout
                                    this website, and for other purposes described in our privacy policy.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="shoping-cart-total mt-50">
                            <h4 class="title-2">السله</h4>
                            <table class="table">
                                <tbody>
                                @foreach(\ShoppingCart::all() as $item)
                                    <tr>
                                        <td>{{ $item->name . ' ×'. $item->qty }}</td>
                                        <td> {{ $item->total }} ريال</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td><strong>مجموع الطلب</strong></td>
                                    <td><strong>{{ \ShoppingCart::total() }} ريال</strong></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- WISHLIST AREA START -->
@endsection

@section('js-code')
    <script src="https://eu-test.oppwa.com/v1/paymentWidgets.js?checkoutId={{$res['id']}}"></script>
@endsection


