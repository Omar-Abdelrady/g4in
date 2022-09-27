@extends('admin.layouts.app')

@section('title', $product->name)

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="p-2">
                                <h4>اسم النتج</h4>
                                <p class="text-gray">{{ $product->name }}</p>
                            </div>
                            <div class="p-2">
                                <h4>صور المنتج</h4>
                                <div class="row">
                                    @foreach($product->photos  as $image)
                                        <div class="col-md-3">
                                            <div class="p-2">
                                                <img class="img-fluid rounded"
                                                     src="{{ asset('storage/'. $image->image_avatar) }}" alt="">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="p-2">
                                <h4>سعر المنتج</h4>
                                <p class="text-gray">{{ $product->price }}</p>
                            </div>
                            <div class="p-2">
                                <h4>الخصم</h4>
                                <p class="text-gray">{{ $product->discount }}</p>
                            </div>
                            <div class="p-2">
                                <h4>السعر بعد الخصم</h4>
                                <p class="text-gray">{{ $product->price - ( $product->price * ($product->discount / 100) ) }}</p>
                            </div>
                            <div class="p-2">
                                <h4>قسم المنتج</h4>
                                <p class="text-gray">{{ \App\Models\Category::find($product->category_id)->name }}</p>
                            </div>
                            <div class="p-2">
                                <h4>الوان المنتج</h4>
                                <p class="text-gray">@foreach($product->colors as $color) {{ $color->name.' ,' }} @endforeach</p>
                            </div>
                            <div class="p-2">
                                <h4>احجام المنتج</h4>
                                <p class="text-gray">@foreach($product->sizes as $size) {{ $size->name.' ,' }} @endforeach</p>
                            </div>
                            <div class="p-2">
                                <h4>وصف المنتج القصير</h4>
                                <p class="text-gray">{{ $product->sub_description }}</p>
                            </div>
                            <div class="p-2">
                                <h4>وصف المنتج</h4>
                                <p class="text-gray">{!! $product->description !!}</p>
                            </div>
                            <div class="p-2">
                                <h4>مواصفات المنتج</h4>
                                <table class="table table-striped">
                                    <tbody>
                                    @foreach($product->specifications as $specification)
                                        <tr>
                                            <td>{{$specification->name}}</td>
                                            <td>{{ $specification->body }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <a href="{{ url()->previous() }}" class="btn btn-dark my-2">رجوع</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
