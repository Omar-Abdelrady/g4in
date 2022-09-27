@extends('admin.layouts.app')

@section('title', $message->name)

@section('content')
    <div class="conetnt">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body row">
                    <div class="p-2 col-md-6 col-12">
                        <h4>اسم المرسل</h4>
                        <p class="text-gray">
                            {{ $message->full_name }}
                        </p>
                    </div>
                    <div class="p-2 col-md-6 col-12">
                        <h4>البريد الالكتروني</h4>
                        <p class="text-gray">
                            {{ $message->email }}
                        </p>
                    </div>
                    <div class="p-2 col-md-6 col-12">
                        <h4>رقم هاتف</h4>
                        <p class="text-gray">
                            {{ $message->phone }}
                        </p>
                    </div>
                    <div class="p-2 col-md-6 col-12">
                        <h4>الرسالة</h4>
                        <p class="text-gray">
                            {{ $message->message }}
                        </p>
                    </div>
                    <a href="{{ route('admin.contact.edit', $message->id) }}" class="btn btn-danger my-3 mx-2">تم الرد</a>
                    <a href="{{ url()->previous() }}" class="btn btn-dark my-3">رجوع</a>
                </div>
            </div>
        </div>
    </div>
@endsection
