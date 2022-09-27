@extends('admin.layouts.app')

@section('title', $ad->title)

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body row">
                            <div class="p-2 col-md-6 col-12">
                                <h4>اسم المعلن</h4>
                                <p class="text-gray">
                                    {{ $ad->advertiser_name }}
                                </p>
                            </div>
                            <div class="p-2 col-md-6 col-12">
                                <h4>البريد الالكتروني للمعلن</h4>
                                <p class="text-gray">
                                    {{ $ad->advertiser_email }}
                                </p>
                            </div>
                            <div class="p-2 col-md-6 col-12">
                                <h4>رقم هاتف المعلن الاول</h4>
                                <p class="text-gray">
                                    {{ $ad->phone }}
                                </p>
                            </div>
                            <div class="p-2 col-md-6 col-12">
                                <h4>رقم هاتف المعلن الثاني</h4>
                                <p class="text-gray">
                                    {{ $ad->second_phone }}
                                </p>
                            </div>
                            <div class="col-12">
                                <hr>
                            </div>
                            <div class="p-2 col-md-6 col-12">
                                <h4>عنوان الاعلان</h4>
                                <p class="text-gray">
                                    {{ $ad->title }}
                                </p>
                            </div>
                            <div class="p-2 col-md-6 col-12">
                                <h4>السعر</h4>
                                <p class="text-gray">
                                    {{ $ad->price }}
                                </p>
                            </div>
                            <div class="p-2 col-md-6 col-12">
                                <h4>المساحة</h4>
                                <p class="text-gray">
                                    {{ $ad->space }}
                                </p>
                            </div>
                            <div class="p-2 col-md-6 col-12">
                                <h4>حالة الاعلان</h4>
                                <p class="text-gray">
                                    {{ $ad->ad_status == 0 ? 'للبيع' : 'للإيجار' }}
                                </p>
                            </div>
                            <div class="p-2 col-md-6 col-12">
                                <h4>عنوان الاعلان الجغرافي</h4>
                                <p class="text-gray">
                                    {{ $ad->address }}
                                </p>
                            </div>
                            <div class="p-2 col-md-6 col-12">
                                <h4>البلد</h4>
                                <p class="text-gray">
                                    {{ $ad->city->country->name }}
                                </p>
                            </div>
                            <div class="p-2 col-md-6 col-12">
                                <h4>المدينة</h4>
                                <p class="text-gray">
                                    {{ $ad->city->name }}
                                </p>
                            </div>
                            <div class="p-2 col-md-6 col-12">
                                <h4>القسم</h4>
                                <p class="text-gray">
                                    {{ $ad->category->name }}
                                </p>
                            </div>
                            <div class="col-12">
                                <hr>
                            </div>
                            <div class="col-12">
                                <a href="{{ route('admin.estates.ads.edit', $ad->id) }}" class="btn btn-info">تعديل</a>
                                <a href="{{ url()->previous() }}" class="btn badge-dark">رجوع</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
