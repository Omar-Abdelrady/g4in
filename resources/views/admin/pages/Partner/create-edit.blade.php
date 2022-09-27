@extends('admin.layouts.app')

@section('title', 'اضافة')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="{{route('admin.partner.store') }}"
                          method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <label>الاسم</label>
                                <input type="text" name="name" class="form-control" placeholder="الاسم">
                            </div>
                            <div class="form-group">
                                <label>اللوجو</label>
                                <input type="file" name="logo" class="form-control-file">
                            </div>
                            <button class="btn btn-success">اضافة</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
