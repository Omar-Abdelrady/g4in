@extends('admin.layouts.app')

@section('title', $commercial->name)

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin.commercial.update', $commercial->id) }}" enctype="multipart/form-data"
                          method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">اسم الاعلان</label>
                            <input value="{{ old('name') ?? $commercial->name }}" type="text" name="name"
                                   class="form-control"
                                   placeholder="اسم الاعلان">
                        </div>
                        <div class="form-group">
                            <label for="">صورة الاعلان</label>
                            <div class="my-2">
                                <img src="{{ asset('storage/'.$commercial->image) }}" class="rounded" width="350"
                                     alt="">
                            </div>
                            <input type=file name="image" class="form-control-file">
                        </div>
                        <div class="form-group">
                            <label for="">ملف PDF</label>
                            <input type=file name="file" class="form-control-file"
                                   placeholder="PDF">
                        </div>
                        <div class="form-group">
                            <label for="">وصف الاعلان القصير</label>
                            <textarea placeholder="الوصف القصير" class="form-control" name="sub_description"
                                      rows="3">{{ old('sub_description')?? $commercial->sub_description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">وصف الاعلان</label>
                            <textarea class="form-control description" name="description"
                                      rows="3">{!! old('description')?? $commercial->description !!}</textarea>
                        </div>
                        <button class="btn btn-success mb-2">اضف</button>
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
