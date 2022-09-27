@extends('admin.layouts.app')

@section('title', 'الاحجام')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('admin.store.sizes.create') }}" class="btn btn-success mb-2">اضافة</a>
                </div>
                <div class="col-12">
                    <table class="table m-auto table-striped table-responsive-sm">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>المقاس</th>
                            <th>عمليات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sizes as $key => $size)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $size->name }}</td>
                                <td class="d-flex"><a
                                        href="{{ route('admin.store.sizes.edit', $size->id) }}"
                                        class="btn btn-success mx-1">تعديل</a>
                                    <form method="post" action="{{ route('admin.store.sizes.destroy', $size->id) }}">
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
                <div class="col-12 d-flex justify-content-center my-2">
                    {{ $sizes->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
