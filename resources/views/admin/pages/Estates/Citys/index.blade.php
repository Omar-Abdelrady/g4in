@extends('admin.layouts.app')

@section('title', 'المدن')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('admin.estates.citys.create') }}" class="btn btn-success my-2">اضافة مدينة</a>
                </div>
                <div class="col-12">
                    <table class="table m-auto table-striped table-responsive-sm">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>اسم المدينة</th>
                            <th>عمليات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($citys as $key => $item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td class="d-flex">
                                    <a class="btn btn-info" href="{{ route('admin.estates.citys.edit', $item->id) }}">تعديل</a>
                                    <form class="mx-2" action="{{ route('admin.estates.citys.destroy', $item->id) }}" method="post">
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
                <div class="col-12">
                    {!! $citys->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
