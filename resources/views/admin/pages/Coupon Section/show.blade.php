@extends('admin.layouts.app')

@section('title', $coupon->name)

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="body p-4">
                            <div class="my-2">
                                <h4>الاسم</h4>
                                <p>{{ $coupon->name }}</p>
                            </div>
                            <div class="my-2">
                                <h4>الوصف</h4>
                                <p>{{ $coupon->description }}</p>
                            </div>
                            <div class="my-2">
                                <h4>الخصم</h4>
                                <p>{{ $coupon->discount }}</p>
                            </div>
                            <div class="my-2">
                                <h4>تاريخ الصلاحية</h4>
                                <p>{{ $coupon->exp_date }}</p>
                            </div>
                            <div class="my-2">
                                <a class="btn btn-dark" href="{{ url()->previous() }}">العودة</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
