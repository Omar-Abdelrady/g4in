@extends('admin.layouts.app')

@section('title', 'اضافة اعلان')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin.commercial.store') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">اسم الاعلان</label>
                            <input value="{{ old('name') }}" type="text" name="name" class="form-control"
                                   placeholder="اسم الاعلان">
                        </div>
                        <div class="form-group">
                            <label for="">صورة الاعلان</label>
                            <input type=file name="image" class="form-control-file"
                                   placeholder="اسم الاعلان">
                        </div>
                        <div class="form-group">
                            <label for="">ملف PDF</label>
                            <input type=file name="file" class="form-control-file"
                                   placeholder="PDF">
                        </div>
                        <div class="form-group">
                            <label for="">وصف الاعلان القصير</label>
                            <textarea placeholder="الوصف القصير" class="form-control" name="sub_description" rows="3">{{ old('sub_description') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">وصف الاعلان</label>
                            <textarea class="form-control description" name="description" rows="3">{!! old('description') !!}</textarea>
                        </div>
                        <button class="btn btn-success">اضف</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js_code')
    <script>
        $('.description').summernote()
    </script>
@endsection
