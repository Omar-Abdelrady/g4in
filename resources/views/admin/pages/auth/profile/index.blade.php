@extends('admin.layouts.app')

@section('title', 'الصفحة الشخصية')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-center flex-column align-items-center">
                                <h4 class="">الصورة الشخصية</h4>
                                <p>
                                    <img src="{{ asset('storage/', auth()->guard('admin')->user()->image) }}" alt="الصورة الشخصية"
                                         class="rounded-circle img-fluid">
                                </p>
                                <h5>الاسم</h5>
                                <p class="text-gray">{{ auth()->guard('admin')->user()->name }}</p>
                                <h5>البريد الالكتروني</h5>
                                <p class="text-gray">{{ auth()->guard('admin')->user()->email }}</p>
                            </div>
                            <a href="{{ route('adminprofile.edit') }}" class="btn btn-success">تعديل</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
