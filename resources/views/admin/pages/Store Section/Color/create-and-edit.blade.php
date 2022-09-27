@extends('admin.layouts.app')

@section('title', isset($color) ? 'تعديل' : 'اضافة');

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form method="post" class="form" action="{{ isset($color) ? route('admin.store.colors.update', $color->id) : route('admin.store.colors.store') }}">
                        @csrf
                        @if(isset($color))
                            @method('PUT')
                        @endif
                        <div class="form-group">
                            <label for="name">اسم اللون</label>
                            <input type="text" value="{{ isset($color) ? $color->name: null}}" id="colorName" placeholder="اسم اللون" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="color">اسم اللون</label>
                            <input type="color" value="{{ isset($color) ? $color->color: null}}" placeholder="اللون" name="color" class="form-control">
                        </div>
                        <button class="btn btn-success">{{ isset($color) ? 'تعديل' : 'اضافة' }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
