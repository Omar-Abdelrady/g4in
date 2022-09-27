@extends('admin.layouts.app')

@section('title', isset($size) ? 'تعديل' : 'اضافة')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form method="post" action="{{ isset($size) ? route('admin.store.sizes.update', $size->id) : route('admin.store.sizes.store') }}">
                        @csrf
                        @isset($size)
                            @method('PUT')
                        @endisset
                        <div class="form-group">
                            <label for="name">الاسم</label>
                            <input placeholder="اسم المقاس" type="text" name="name" class="form-control" value="{{ isset($size) ? $size->name : null }}" required>
                        </div>
                        <button class="btn btn-success">{{ isset($size) ? 'تعديل' : 'اضافة' }}</button>
                        <a href="{{ url()->previous() }}" class="btn btn-dark">رجوع</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
