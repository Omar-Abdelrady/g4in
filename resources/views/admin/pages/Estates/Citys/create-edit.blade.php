@extends('admin.layouts.app')

@section('title', isset($city) ? $city->name : 'اضافة')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form
                        action="{{ isset($city) ? route('admin.estates.citys.update', $city->id) : route('admin.estates.citys.store') }}"
                        method="post">
                        @if(isset($city))
                            @method('PUT')
                        @endif
                        @csrf
                        <div class="form-group">
                            <label for="name">اسم المدينة</label>
                            <input type="text" value="{{ isset($city) ? $city->name : old('name') }}" name="name"
                                   id="name" class="form-control" placeholder="اسم المدينة"
                                   required>
                        </div>
                        <div class="form-group">
                            <label for="1">الدولة</label>
                            <select class="form-control" name="country_id" id="1">
                                <option selected value>اختر الدولة</option>
                                @foreach($countries as $item)
                                    <option
                                        @if(isset($city))
                                        @if($item->id == $city->country->id)
                                        selected
                                        @endif
                                        @endif
                                        value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button class="btn btn-success my-2">{{ isset($city) ? 'تعديل' : "اضافة" }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
