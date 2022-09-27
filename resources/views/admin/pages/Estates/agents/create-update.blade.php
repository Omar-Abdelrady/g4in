@extends('admin.layouts.app')

@section('title', isset($agent)? $agent->name: 'اضافة' )

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="{{ isset($agent) ? route('admin.estates.agents.update', $agent->id) : route('admin.estates.agents.store') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        @if(isset($agent))
                            @method('PUT')
                        @endif
                        <div class="form-group">
                            <label for="">الاسم</label>
                            <input value="{{ isset($agent) ? $agent->name : old('name') }}" type="text" name="name" id="" class="form-control" placeholder="اسم الوكيل"
                                   aria-describedby="helpId" required>
                        </div>
                        <div class="form-group">
                            <label for="">صورة الوكيل</label>
                            @if(isset($agent))
                                <img src="{{ asset('storage/'. $agent->image) }}" width="250" class="img-fluid rounded" alt="">
                            @endif
                            <input type="file" name="image" id="" class="form-control-file" placeholder="صورة الوكيل"
                                   aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="">البريد الالكتروني</label>
                            <input value="{{ isset($agent) ? $agent->email : old('email') }}" type="text" name="email" id="" class="form-control-file" placeholder="البريد الالكتروني"
                                   aria-describedby="helpId" required>
                        </div>
                        <div class="form-group">
                            <label for="">الوصف</label>
                            <textarea name="description" rows="3" class="form-control">{{ isset($agent) ? $agent->description: old('description') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">البلد</label>
                            <input name="city" class="form-control" type="text" value="{{ isset($agent)? $agent->city: old('city') }}" />
                        </div>
                        <div class="form-group">
                            <label for="">التقييم</label>
                            <select name="rate" class="form-control">
                                <option
                                    @if(isset($agent))
                                        {{ $agent->rate == 1 ? 'selected': null }}
                                    @endif
                                    value="1">1</option>
                                <option
                                    @if(isset($agent))
                                    {{ $agent->rate == 2 ? 'selected': null }}
                                    @endif
                                    value="2">2</option>
                                <option
                                    @if(isset($agent))
                                    {{ $agent->rate == 3 ? 'selected': null }}
                                    @endif
                                    value="3">3</option>
                                <option
                                    @if(isset($agent))
                                    {{ $agent->rate == 4 ? 'selected': null }}
                                    @endif
                                    value="4">4</option>
                                <option
                                    @if(isset($agent))
                                    {{ $agent->rate == 5 ? 'selected': null }}
                                    @endif
                                    value="5">5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">رقم الهاتف</label>
                            <input value="{{ isset($agent) ? $agent->phone : old('phone') }}" type="text" name="phone" id="" class="form-control" placeholder="رقم الهاتف"
                                   aria-describedby="helpId" required>
                        </div>
                        <button class="btn btn-success">{{ isset($agent) ? 'تعديل' : 'اضافة' }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
