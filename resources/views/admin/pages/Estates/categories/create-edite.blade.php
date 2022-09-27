@extends('admin.layouts.app')

@section('title', isset($category) ? $category->name : 'اضافة')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form
                        action="{{ isset($category) ? route('admin.estates.categories.update', $category->id) : route('admin.estates.categories.store') }}"
                        method="post">
                        @if(isset($category))
                            @method('PUT')
                        @endif
                            @csrf
                            <div class="form-group">
                                <label for="">الاسم</label>
                                <input type="text" name="name" id="" class="form-control" placeholder="الاسم"
                                       value="{{ isset($category) ? $category->name : old('name') }}"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="">الوصف</label>
                                <textarea name="sub_description" class="form-control" placeholder="الوصف"required>{{ isset($category) ? $category->sub_description : old('sub_description') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="">الكلمات الدلالية</label>
                                <textarea name="keywords" class="form-control" placeholder="الكلمات الدلالية"
                                          required>{{ isset($category) ? $category->keywords : old('keywords') }}</textarea>
                            </div>
                            <button class="btn btn-success my-2">{{ isset($category) ? 'تعديل' : "اضافة" }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
