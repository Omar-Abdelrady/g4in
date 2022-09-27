@extends('admin.layouts.app')

@section('title', isset($sub_category) ? $sub_category->name : 'اضافة')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form
                        action="{{ isset($sub_category) ? route('admin.estates.sub-category.update', $sub_category->id) : route('admin.estates.sub-category.store') }}"
                        method="post">
                        @if(isset($sub_category))
                            @method('PUT')
                        @endif
                        @csrf
                        <div class="form-group">
                            <label for="">الاسم</label>
                            <input type="text" name="name" id="" class="form-control" placeholder="الاسم"
                                   value="{{ isset($sub_category) ? $sub_category->name : old('name') }}"
                                   required>
                        </div>
                        <div class="form-group">
                            <label for="c">قسم القسم</label>
                            <select class="form-control" name="category_id" id="c">
                                @if(!isset($sub_category))
                                    <option selected value>اختر القسم</option>
                                @endif
                                @foreach($categories as $category)
                                    <option {{ isset($sub_category) ? $sub_category->id == $category->id ? 'selected': null : null }} value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button class="btn btn-success my-2">{{ isset($sub_category) ? 'تعديل' : "اضافة" }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
