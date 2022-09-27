@extends('admin.layouts.app')

@section('title', 'اضافة مرفق')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin.estates.attacheds.store') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">اسم المرفق</label>
                            <input type="text" name="attached" id="" class="form-control" placeholder="اسم المرفق">
                        </div>
                        <div class="form-group">
                            <label for="">Icon</label>
                            <input type="file" name="icon" class="form-control-file" required>
                        </div>
                        <button class="btn btn-success my-2">اضافة</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
