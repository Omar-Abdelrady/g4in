@extends('admin.layouts.app')

@section('title', 'عرض معلومات القسم')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="p-2 ">
                                <h4>الاسم</h4>
                                <p class="text-gray">
                                    {{ $category->name }}
                                </p>
                            </div>
                            <div class="p-2 ">
                                <h4>الصورة</h4>
                                <p class="text-gray">
                                    <img src="{{ asset('storage/'. $category->image) }}" alt="">
                                </p>
                            </div>
                            <div class="p-2 ">
                                <h4>الوصف القصير</h4>
                                <p class="text-gray">
                                    {{ $category->sub_description }}
                                </p>
                            </div>
                            <div class="p-2 ">
                                <h4>الكلمات الدلالية</h4>
                                <p class="text-gray">
                                    {{ $category->keywords }}
                                </p>
                            </div>
                            <hr>
                            <a href="{{ route('admin.store.category.edit', $category->slug) }}" class="btn btn-info">تعديل</a>
                            <a href="{{ url()->previous() }}" class="btn badge-dark">رجوع</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
