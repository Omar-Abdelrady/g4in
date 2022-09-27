@extends('website.layouts.app')

@section('title', $commercial->name)

@section('description',  $commercial->sub_description)

@section('bread', $commercial->name)

@section('image', asset('storage/'. $commercial->image))

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="title-2">
                    {{ $commercial->name }}
                </h1>
            </div>
            <div class="col-12">
                {!! $commercial->description !!}
            </div>
            @isset($commercial->attachment)
            <div class="col-12">
                <h4 class="title-2">
                    مخطط بياني
                </h4>
                <div class="row">

                   <div class="col-12 mb-4">
                    <a class="theme-btn-1 btn btn-effect-1" href="{{ route('commercial.download', $commercial->slug) }}">تحميل الـ PDF<img
                            src="{{ asset('assets/front-assets/img/pdf-file-format-symbol.png') }}" width="35" alt=""></a>
                    </div>
                </div>
            </div>
            @endisset
        </div>
    </div>

@endsection
