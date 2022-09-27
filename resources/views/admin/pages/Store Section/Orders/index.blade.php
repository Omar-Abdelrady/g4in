@extends('admin.layouts.app')

@section('title', 'طلبات المستخدمين')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <table class="table m-auto table-striped table-responsive-sm">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>اسم المستخدم</th>
                            <th>التاريخ</th>
                            <th>العمليات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $key => $order)
                            <tr class="{{ $order->read == 0 ? 'text-danger h3' : null }}">
                                <td>{{ $key+1 }}</td>
                                <td>{{ $order->with('user')->first()->user->first_name . ' '. $order->with('user')->first()->user->last_name }}</td>
                                <td>{{ $order->created_at->format('Y-m-d') }}</td>
                                <td>
                                    <a href="{{ route('admin.store.orders.show', $order->id) }}" class="btn btn-info">عرض
                                        الطلب</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-12 d-flex justify-content-center my-2">
                    {!! $orders->links()  !!}
                </div>
            </div>
        </div>
    </div>
@endsection
