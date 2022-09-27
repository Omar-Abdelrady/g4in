@extends('admin.layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @if(count($commercials) !==10)
                        <a href="{{ route('admin.commercial.create') }}" class="btn btn-success my-2">اضافة</a>
                    @endif
                </div>
                <div class="col-12">
                    <table class="table m-auto table-striped table-responsive-sm">
                        <thead>
                        <tr>
                            <td>#</td>
                            <td>اسم الاعلان</td>
                            <td>عمليات</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($commercials as $key => $item)
                            <tr>
                                <th>{{ $key+1 }}</th>
                                <th>{{ $item->name }}</th>
                                <th class="d-flex">
                                    <a href="{{ route('admin.commercial.show', $item->id) }}" class="btn btn-info mx-1">عرض</a>
                                    <a href="{{ route('admin.commercial.edit', $item->id) }}" class="btn btn-secondary mx-1">تعديل</a>
                                    <form action="{{ route('admin.commercial.destroy', $item->id) }}" method="post">
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
            </div>
        </div>
    </div>
@endsection
