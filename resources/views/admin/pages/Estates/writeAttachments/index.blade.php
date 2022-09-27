@extends('admin.layouts.app')

@section('title', 'مرفقات')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('admin.estates.attachments.create') }}" class="btn btn-success my-2">اضافة</a>
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
                        @foreach($attachments as $key => $item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td class="d-flex">
                                    <form action="{{ route('admin.estates.attachments.destroy', $item->id) }}" method="post">
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
                <div class="col-12 my-3">
                    {!! $attachments->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
