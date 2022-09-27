@extends('admin.layouts.app')

@section('title', 'الوكلاء')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('admin.estates.agents.create') }}" class="my-2 btn btn-success">اضافة</a>
                </div>
                <div class="col-12">
                    <table class="table m-auto table-striped table-responsive-sm">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>الاسم</th>
                            <th>البريد الالكتروني</th>
                            <th>الهاتف</th>
                            <th>عمليات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($agents as $key => $item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('admin.estates.agents.edit', $item->id) }}" class="btn btn-info mx-2">تعديل</a>
                                    <form action="{{ route('admin.estates.agents.destroy', $item->id) }}" method="post">
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
                    {!! $agents->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
