@extends('admin.layouts.app')

@section('title', isset($country))

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="{{ isset($country) ? route('admin.estates.countries.update', $country->id) : route('admin.estates.countries.store') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        @if(isset($country))
                            @method('PUT')
                        @endif
                        <div class="form-group">
                            <label for="">اسم الدولة</label>
                            <input value="{{ isset($country) ? $country->name : old('name') }}" type="text" name="name" id="" class="form-control" placeholder="أسم الدولة"
                                   aria-describedby="helpId" required>
                        </div>
                        <div class="form-group">
                            <label for="">صورة الدولة</label>
                            @if(isset($country))
                                <img src="{{ asset('storage/'. $country->image) }}" class="img-fluid rounded m-3 p-3" alt="">
                            @endif
                            <input type="file" class="form-control-file" name="image" required>
                        </div>
                        <button class="btn btn-success">{{ isset($country) ? 'تعديل' : 'اضافة' }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
