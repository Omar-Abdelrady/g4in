@extends('website.layouts.app')
@section('title', 'تسجيل مستخدم جديد - جلوبل 4 انفيست')
@section('discription', 'يمكنك الان عمل حساب مجاني في جلوبل 4 انفيست والحصول علي كل مميازته')
@section('keywords', 'جلوبل 4 انفيست ')
@section('image', asset('assets/front-assets/img/logo-2.png'))
@section('bread', 'تسجيل')

@section('content')

    <!-- Register AREA START -->
    <div class="ltn__login-area pb-110">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area text-center">
                        <h1 class="section-title">تسجيل <br>حساب</h1>
                        <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على
                            الشكل</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="account-login-inner">
                        <form action="" class="ltn__form-box contact-form-box" method="post">
                            @csrf
                            <input value="{{ old('first_name') }}" type="text" name="first_name" placeholder="الاسم الاول">
                            <input value="{{ old('last_name') }}" type="text" name="last_name" placeholder="الاسم الاخير">
                            <input value="{{ old('email') }}" type="text" name="email" placeholder="البريد الاليكترون">
                            <input value="{{ old('phone') }}" type="text" name="phone" placeholder="رقم الهاتف">
                            <input value="{{ old('country') }}" type="text" name="country" placeholder="البلد">
                            <input value="{{ old('password') }}" type="password" name="password" placeholder="كلمة المرور">
                            <input type="password" name="password_confirmation" placeholder="تاكيد كلمة المرور">
                            <label class="checkbox-inline">
                                <input type="checkbox" value="true" name="confirm">
                                هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز
                                على الشكل
                            </label>
                            <div class="btn-wrapper">
                                <button class="theme-btn-1 btn reverse-color btn-block" type="submit">انشاء الحساب
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
