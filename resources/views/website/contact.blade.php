@extends('website.layouts.app')

@section('title', 'اتصل بنا - جلوبل 4 انفيست')

@section('description', 'اتصل بنا - جلوبل 4 انفيست')

@section('keywords', 'اتصل بـ جلوبل 4 انفيست ')

@section('bread', 'اتصل بنا ')

@section('image', asset('assets/front-assets/img/logo-2.png'))
@section('content')


<div class="ltn__contact-address-area mb-90">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="ltn__contact-address-item ltn__contact-address-item-3 box-shadow">
                    <div class="ltn__contact-address-icon">
                        <img src="{{ asset('assets/front-assets/img/icons/10.png') }}" alt="Icon Image">
                    </div>
                    <h3 class="animated fadeIn">البريد الاليكترونى</h3>
                    <p>info@globl4invest.com <br>
                        jobs@globl4invest.com</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="ltn__contact-address-item ltn__contact-address-item-3 box-shadow">
                    <div class="ltn__contact-address-icon">
                        <img src="{{ asset('assets/front-assets/img/icons/11.png') }}" alt="Icon Image">
                    </div>
                    <h3 class="animated fadeIn">ارقام الهاتف</h3>
                    <p>+966 0525 52558 <br> +966 5552 5585</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="ltn__contact-address-item ltn__contact-address-item-3 box-shadow">
                    <div class="ltn__contact-address-icon">
                        <img src="{{ asset('assets/front-assets/img/icons/12.png') }}" alt="Icon Image">
                    </div>
                    <h3 class="animated fadeIn">عنوان</h3>
                    <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة</p>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="ltn__contact-message-area mb-120 mb--100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__form-box contact-form-box box-shadow white-bg" style="margin-bottom: 170px">
                    <h4 class="title-2">تواصل</h4>
                    <form id="contact-form" action="{{ route('contact.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-item input-item-name ltn__custom-icon">
                                    <input value="{{ old('full_name') }}" type="text" name="full_name" placeholder="الاسم">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-item input-item-email ltn__custom-icon">
                                    <input value="{{ old('email') }}" type="email" name="email" placeholder="البريد الاليكترونى">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-item input-item-phone ltn__custom-icon">
                                    <input value="{{ old('phone') }}" type="text" name="phone" placeholder="رقم الهاتف">
                                </div>
                            </div>
                        </div>
                        <div class="input-item input-item-textarea ltn__custom-icon">
                            <textarea name="message" placeholder="الرسالة">{{ old('message') }}</textarea>
                        </div>
                        <div class="btn-wrapper mt-0">
                            <button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit">ارسال</button>
                        </div>
                        <p class="form-messege mb-0 mt-20"></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
