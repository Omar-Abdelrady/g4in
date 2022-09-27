@extends('admin.layouts.app')

@section('title', 'الالوان')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 my-2">
                    <a href="{{ route('admin.store.colors.create') }}" class="btn-success btn">اضاقة لون</a>
                </div>
                <div class="col-12">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>اسم اللون</th>
                            <th>اللون</th>
                            <th>عمليات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($colors as $key => $color)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $color->name }}</td>
                                <td>
                                    <div style="width: 35px; height: 35px; background: {{ $color->color }};" class="m-1 rounded"></div>
                                </td>
                                <td class="d-flex"><a
                                        href="{{ route('admin.store.colors.edit', $color->id) }}"
                                        class="btn btn-success mx-1">تعديل</a>
                                    <form method="post" action="{{ route('admin.store.colors.destroy', $color->id) }}">
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
                    {!! $colors->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
