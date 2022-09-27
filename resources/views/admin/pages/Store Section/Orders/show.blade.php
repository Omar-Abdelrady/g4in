@extends('admin.layouts.app')

@section('title', 'طلب')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="p-2">
                                <h2>تفاصيل الطلب</h2>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="p-2">
                                        <h4>الاسم الاول</h4>
                                        <p>
                                            {{ $order->user->order_information->first_name }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="p-2">
                                        <h4>الاسم الثاني</h4>
                                        <p>
                                            {{ $order->user->order_information->last_name }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="p-2">
                                        <h4>البريد الالكتروني</h4>
                                        <p>
                                            {{ $order->user->order_information->email }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="p-2">
                                        <h4>رقم الهاتف</h4>
                                        <p>
                                            {{ $order->user->order_information->phone }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="p-2">
                                        <h4>العنوان</h4>
                                        <p>
                                            {{ $order->user->order_information->address }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="p-2">
                                        <h4>البلد</h4>
                                        <p>
                                            {{ $order->user->order_information->country }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="p-2">
                                        <h4>المدينة</h4>
                                        <p>
                                            {{ $order->user->order_information->city }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="p-2">
                                        <h4>الرمز البريدي</h4>
                                        <p>
                                            {{ $order->user->order_information->zip }}
                                        </p>
                                    </div>
                                </div>
                                @if($order->user->order_information->comment != null)
                                    <div class="col-12">
                                        <div class="p-2">
                                            <h4>ملاحظة</h4>
                                            <p>
                                                {{ $order->user->order_information->comment }}
                                            </p>
                                        </div>
                                    </div>
                                @endif
                                <div class="col-6"></div>
                            </div>
                            <div class="p-2">
                                <h2>
                                    المنتجات
                                </h2>
                                <table class="table m-auto table-striped table-responsive-sm">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>اسم المنتج</th>
                                        <th>سعر المنتج</th>
                                        <th>عدد القطع</th>
                                        <th>اللون</th>
                                        <th>الحجم</th>
                                        <th>السعر الاجمالي</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($order->products as $key => $product)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $product->product->name }}</td>
                                            <td>{{ $product->product->discount != 0 ?$product->product->price - ( $product->product->price * ($product->product->discount / 100) ) : $product->product->price }}</td>
                                            <td>{{ $product->qty }}</td>
                                            <td>{{ $product->color }}</td>
                                            <td>{{ $product->size }}</td>
                                            <td class="price">{{ ($product->product->discount != 0 ?$product->product->price - ( $product->product->price * ($product->product->discount / 100) ) : $product->product->price) * $product->qty }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="my-2">
                                    <h2>رقم عملية الدفع</h2>
                                    <span>Bank Transaction ID</span>
                                    <h3>{{ $order->bank_transaction_id }}</h3>
                                </div>
                                <form action="{{ route('admin.store.orders.destroy', $order->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-success">تم التوصيل</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js_code')
    <script>
        $(document).ready(function () {
            console.log($('.price').text())
        })
    </script>
@endsection
