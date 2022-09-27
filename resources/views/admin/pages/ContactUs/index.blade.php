@extends('admin.layouts.app')

@section('title', 'رسائل المسخدمين')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <table class="table m-auto table-striped table-responsive-sm">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>الاسم</th>
                            <th>البريد الإلكتروني</th>
                            <th>عمليات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($messages as $key => $item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->full_name }}</td>
                                <td>
                                    {{ $item->email }}
                                </td>
                                <td class="d-flex">
                                    <a href="{{ route('admin.contact.show', $item->id) }}" class="btn btn-info mx-2">عرض</a>
                                    <form action="{{ route('admin.contact.destroy', $item->id) }}" method="post">
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
                <div class="col-12-my-2">
                    {!! $messages->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
