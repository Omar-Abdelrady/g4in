@extends('admin.layouts.app')

@section('title', $coupon->name)

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin.store.coupons.update', $coupon->id) }}" enctype="multipart/form-data" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">اسم الكوبون</label>
                            <input value="{{ $coupon->name }}" type="text" name="name" class="form-control" placeholder="اسم الكوبون">
                        </div>
                        <div class="form-group">
                            <label for="">اسم الكوبون</label>
                            <div>
                                <img src="{{ asset('storage/'. $coupon->image) }}" width="250" alt="">
                            </div>
                            <input type="file" class="form-control-file" name="image" required>
                        </div>
                        <div class="form-group">
                            <label for=""> الكوبون</label>
                            <input value="{{ $coupon->coupon }}" type="text" name="coupon" class="form-control" placeholder="اسم الكوبون">
                        </div>
                        <div class="form-group">
                            <label for="">وصف</label>
                            <textarea class="form-control" name="description" placeholder="وصف الكوبون">{{ $coupon->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">الخصم</label>
                            <input value="{{ $coupon->discount }}" type="number" name="discount" class="form-control" placeholder="الخصم">
                        </div>
                        <div class="form-group">
                            <label for="">تاريخ صلاحيت الكوبون</label>
                            <input value="{{ $coupon->exp_date }}" type="date" name="exp_date" class="form-control"
                                   placeholder=" تاريخ صلاحيت الكوبون">
                        </div>
                        <button class="btn btn-success">اضف</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
