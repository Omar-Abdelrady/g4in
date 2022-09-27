@extends('admin.layouts.app')
@section('title', 'اقسام منتجات المتجر')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 my-2">
                    <a href="{{ route('admin.store.category.create') }}" class="btn btn-success">اضافة قسم</a>
                </div>
                <div class="col-12 m-auto">
                    <table class="table m-auto table-striped table-responsive-sm">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>اسم القسم</th>
                            <th>الوصف القصير</th>
                            <th>العمليات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $key => $category)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->sub_description }}</td>
                                <td class="d-flex"><a href="{{ route('admin.store.category.show', $category->slug) }}"
                                                      class="btn btn-info mx-1">عرض</a> <a
                                        href="{{ route('admin.store.category.edit', $category->slug) }}"
                                        class="btn btn-success mx-1">تعديل</a>
                                    <form method="post" action="{{ route('admin.store.category.destroy', $category->slug) }}">
                                        @csrf
                                        <button class="btn btn-danger mx-1">حذف</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="col-12 d-flex justify-content-center">
                        {!! $categories->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
