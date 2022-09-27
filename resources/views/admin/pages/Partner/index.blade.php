@extends('admin.layouts.app')

@section('title', 'الشركاء')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('admin.partner.create') }}" class="btn btn-success mb-2">اضافة</a>
                </div>
                <div class="col-12">
                    <table class="table m-auto table-striped table-responsive-sm">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>الاسم</th>
                            <th>اللوجو</th>
                            <th>عمليات</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($partners as $key => $item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <img src="{{ asset('storage/'. $item->logo ) }}" width="80" height="80" class="img-fluid p-2" alt="">
                                    </td>
                                    <td class="d-flex">
                                        <form action="{{ route('admin.partner.destroy', $item->id) }}" method="post">
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
            </div>
        </div>
    </div>
@endsection
