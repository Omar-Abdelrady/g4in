@extends('admin.layouts.app')

@section('title', 'الخدمات')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('admin.service.create') }}" class="btn btn-success mb-3">اضافة</a>
                </div>
                <div class="col-12">
                    <table class="table m-auto table-striped table-responsive-sm">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>الاسم</th>
                            <th>الوصف القصير</th>
                            <th>عمليات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($services as $key => $item)
                            <tr>
                                <td>{{$key}}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->short_description }}</td>
                                <td class="d-flex">
                                    <a
                                        href="{{ route('admin.service.edit', $item->slug) }}"
                                        class="btn btn-success mx-1">تعديل</a>
                                    <a href="{{ route('admin.service.show', $item->slug) }}" class="btn btn-info">عرض</a>
                                    <form method="post"
                                          action="{{ route('admin.service.destroy', $item->id) }}">
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
            </div>
        </div>
    </div>
@endsection
