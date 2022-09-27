@extends('admin.layouts.app')

@section('title', isset($user) ? 'تعديل بيانات المستخدم' : "اضافة مستخدم جديد")

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="">
                        <div class="form-group">
                            <label for="name">الاسم </label>
                            <input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control"
                                   placeholder="الاسم"
                                   required>
                        </div>
                        <div class="form-group">
                            <label for="emai"></label>
                            <input type="email" name="email" id="email" class="form-control"
                                   placeholder="البريد الالكتروني"
                                   required>
                        </div>
                        <hr>
                        <div class="form-group">
                            @if(isset($user))
                                <h5 class="my-3">تغير كلمة السر</h5>
                                <label for="password">كلمة السر القديمة</label>
                                <input type="password" name="password" id="passowrd" class="form-control"
                                       placeholder="كلمة السر القديمة"
                                >
                                <label for="new_passowrd" class="my-3">كلمة السر الجديدة</label>
                                <input type="password" placeholder="كلمة السر الجديدة" class="form-control"
                                       name="new_passowrd">
                                <label for="password_confirmation" class="my-3">تأكيد كلمة السر الجديدة</label>
                                <input type="password" name="password_confirmation"
                                       placeholder="تأكيد كلمة السر الجديدة" class="form-control">

                            @else
                                <label for="new_passowrd">كلمة السر الجديدة</label>
                                <input type="password" class="form-control" name="new_password">
                                <label for="password_confirmation">تأكيد كلمة السر الجديدة</label>
                                <input type="password" name="password_confirmation"
                                       placeholder="تأكيد كلمة السر الجديدة" class="form-control">
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">الصورة الشخصية</label>
                            <input type="file" name="image" id="" class="form-control-file" placeholder="">
                        </div>
                        @if(isset($user))
                            @if($user->image)
                                <img src="{{ asset('storage'. $user->image) }}" class="img-fluid" alt="">
                            @else
                                <h6>لا يوجد صورة لك حتى الان</h6>
                            @endif
                        @endif
                        <button class="btn btn-success my-4">{{ isset($user) ? 'تعديل' :  "اضافة" }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
