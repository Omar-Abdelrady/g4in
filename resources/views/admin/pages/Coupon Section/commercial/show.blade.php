@extends('admin.layouts.app')

@section('title', $commercial->name)

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="body p-4">
                            <div class="my-2">
                                <h4>الاسم</h4>
                                <p>{{ $commercial->name }}</p>
                            </div>
                            <div class="my-2">
                                <h4>الصورة</h4>
                                <p>
                                    <img class="rounded" src="{{ asset('storage/'. $commercial->image) }}" width="350" alt="">
                                </p>
                            </div>
                            <div class="my-2">
                                <h4>الوصف القصير</h4>
                                <p>{{ $commercial->sub_description }}</p>
                            </div>
                            <div class="my-2">
                                <h4>الوصف</h4>
                                <p>{!! $commercial->description !!}</p>
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
