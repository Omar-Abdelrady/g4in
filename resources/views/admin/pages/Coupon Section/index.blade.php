@extends('admin.layouts.app')

@section('title', 'الكوبونات')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 my-3">
                    <a href="{{ route('admin.store.coupons.create') }}" class="btn btn-success">اضافة</a>
                </div>
                <div class="col-12">
                    <table class="table m-auto table-striped table-responsive-sm">
                        <thead>
                        <tr>
                            <td>#</td>
                            <td>اسم الكوبون</td>
                            <td>عمليات</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($coupons as $key => $item)
                            <tr>
                                <th>{{ $key+1 }}</th>
                                <th>{{ $item->name }}</th>
                                <th class="d-flex">
                                    <a href="{{ route('admin.store.coupons.show', $item->id) }}" class="btn btn-info mx-1">عرض</a>
                                    <a href="{{ route('admin.store.coupons.edit', $item->id) }}" class="btn btn-secondary mx-1">تعديل</a>
                                    <form action="{{ route('admin.store.coupons.destroy', $item->id) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger mx-1">حذف</button>
                                    </form>
                                </th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-12 my-2 d-flex justify-content-center">
                    {!! $coupons->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
