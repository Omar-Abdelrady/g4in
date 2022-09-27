@extends('admin.layouts.app')

@section('title', 'اضافة مرفق')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin.estates.attachments.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">اسم المرفق</label>
                            <input type="text" name="name" id="" class="form-control" placeholder="اسم المرفق">
                        </div>
                        <button class="btn btn-success my-2">اضافة</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
