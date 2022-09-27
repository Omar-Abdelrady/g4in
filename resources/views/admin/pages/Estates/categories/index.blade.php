@extends('admin.layouts.app')

@section('title', 'اضافة')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('admin.estates.categories.create') }}" class="my-2 btn btn-success">اضافة</a>
                </div>
                <div class="col-12">
                    <table class="table m-auto table-striped table-responsive-sm">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>الاسم</th>
                            <th>الوصف</th>
                            <th>عمليات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $key => $item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ \Illuminate\Support\Str::limit($item->sub_description, 50) }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('admin.estates.categories.edit', $item->id) }}"
                                       class="btn btn-info">تعديل</a>
                                    <form class="mx-2"
                                          action="{{ route('admin.estates.categories.destroy', $item->id) }}"
                                          method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">حذف</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-12 my-2">
                    {!! $categories->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
