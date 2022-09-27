@extends('admin.layouts.app')

@section('title', 'اضافة')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('admin.estates.sub-category.create') }}" class="my-2 btn btn-success">اضافة</a>
                </div>
                <div class="col-12">
                    <table class="table m-auto table-striped table-responsive-sm">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>الاسم</th>
                            <th>عمليات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sub_categories as $key => $item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('admin.estates.sub-category.edit', $item->id) }}"
                                       class="btn btn-info">تعديل</a>
                                    <form class="mx-2"
                                          action="{{ route('admin.estates.sub-category.destroy', $item->id) }}"
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
                    {!! $sub_categories->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
