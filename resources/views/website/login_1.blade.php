@extends('website.layouts.app')

@section('title', 'تسجيل الدخول - جلوبل 4 انفيست')

@section('description', 'تسجيل الدخول في جلوبل 4 انفيست ')

@section('keywords', 'جلوبل 4 انفيست ')

@section('image', asset('assets/front-assets/img/logo-2.png'))

@section('bread', 'تسجيل الدخول')
@section('content')
    <!-- LOGIN AREA START -->
    <div class="ltn__login-area pb-65">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area text-center">
                        <h1 class="section-title">تسجيل دخول</h1>
                        <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي  <br>
                             ن التركيز على الشكل الخارجي للنص أو شكل توضع</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="account-login-inner">
                        <form action="{{ route('login.submit') }}" class="ltn__form-box contact-form-box" method="post">
                            @csrf
                            <input type="text" name="email" placeholder="البريد الليكترونى">
                            <input type="password" name="password" placeholder="كلمة المرور">
                            <div class="btn-wrapper mt-0">
                                <button class="theme-btn-1 btn btn-block" type="submit">تسجيل</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="account-create text-center pt-50">
                        <h4>ليس لديا حساب</h4>
                        <p>ن التركيز على الشكل الخارجي للنص أو شكل توضع <br>
                            ة منذ زمن طويل وهي أن المحتوى المقر</p>
                        <div class="btn-wrapper">
                            <a href="{{ route('register.index') }}" class="theme-btn-1 btn black-btn">انشاء حساب</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- LOGIN AREA END -->
@endsection
