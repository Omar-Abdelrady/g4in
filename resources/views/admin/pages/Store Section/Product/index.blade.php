@extends('admin.layouts.app')

@section('title', 'المنتجات')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mb-2">
                    <a href="{{ route('admin.store.products.create') }}" class="btn btn-success">اضافة</a>
                </div>
                <div class="col-12">
                    <table class="table-striped table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>اسم المنتج</th>
                            <th>الوصف القصير</th>
                            <th>سعر المنتج</th>
                            <th>عمليات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $key => $product)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->sub_description}}</td>
                                <td>{{$product->price}}</td>
                                <td class="d-flex">
                                    <a
                                        href="{{ route('admin.store.products.edit', $product->slug) }}"
                                        class="btn btn-success mx-1">تعديل</a>
                                    <a href="{{ route('admin.store.products.show', $product->slug) }}" class="btn btn-info">عرض</a>
                                    <form method="post"
                                          action="{{ route('admin.store.products.destroy', $product->slug) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger mx-1">حذف</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-12 my-2 d-flex justify-content-center">
                    {!! $products->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
