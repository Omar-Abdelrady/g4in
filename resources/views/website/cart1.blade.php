@extends('website.layouts.app')

@section('title', 'العربة - جلوبل 4 انفيست')

@section('description', 'عربة التسوق يمكنك اضافة المنتجات الخاصة بك في عربتك الخاصة - تسوق مع جلوبل 4 انفيست')

@section('keywords', 'جلوبل 4 انفيست ')

@section('image', asset('assets/front-assets/img/logo-2.png'))

@section('bread', 'العربة')

@section('content')
    <!-- SHOPING CART AREA START -->
    <div class="liton__shoping-cart-area mb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping-cart-inner">
                        <div class="shoping-cart-table table-responsive">
                            <table class="table">
                                <!-- <thead>
                                    <th class="cart-product-remove">Remove</th>
                                    <th class="cart-product-image">Image</th>
                                    <th class="cart-product-info">Product</th>
                                    <th class="cart-product-price">Price</th>
                                    <th class="cart-product-quantity">Quantity</th>
                                    <th class="cart-product-subtotal">Subtotal</th>
                                </thead> -->
                                <tbody>
                                @foreach(\ShoppingCart::all() as $item)
                                    <tr>
                                        <td class="cart-product-remove"><a
                                                href="{{ route('cart.remove', $item->__raw_id) }}">x</a></td>
                                        <td class="cart-product-image">
                                            <a href="{{ route('product.index', \App\Models\Product::query()->findOrFail($item->id)->first()->slug) }}">
                                                <img
                                                    src="{{ asset('storage/'.\App\Models\Product::query()->findOrFail($item->id)->first()->photos[0]->image_avatar) }}"
                                                    alt="#">
                                            </a>
                                        </td>
                                        <td class="cart-product-info">
                                            <h4>
                                                <a href="{{ route('product.index', \App\Models\Product::query()->findOrFail($item->id)->first()->slug) }}">
                                                    {{ $item->name }}
                                                </a>
                                            </h4>
                                        </td>
                                        <td class="cart-product-price">ريال{{$item->price}}</td>
                                        {{--                                        <td class="cart-product-quantity">--}}
                                        {{--                                            <div class="cart-plus-minus">--}}
                                        {{--                                                <input type="text" value="02" name="qtybutton"--}}
                                        {{--                                                       class="cart-plus-minus-box">--}}
                                        {{--                                            </div>--}}
                                        {{--                                        </td>--}}
                                        <td class="cart-product-info">
                                            <h4>{{$item->qty}}</h4>
                                        </td>
                                        <td class="cart-product-subtotal">ريال{{ $item->total }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="shoping-cart-total mt-50">
                            <h4>مجموع السله</h4>
                            <table class="table">
                                <tbody>
                                @foreach(\ShoppingCart::all() as $item)
                                    <tr>
                                        <td>{{ $item->name . ' ×'. $item->qty }}</td>
                                        <td> {{ $item->total }} ريال</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td><strong>مجموع الطلب</strong></td>
                                    <td><strong>{{ \ShoppingCart::total() }} ريال</strong></td>
                                </tr>
                                </tbody>
                            </table>
                            @if(!\ShoppingCart::isEmpty())
                                <div class="btn-wrapper text-right">
                                    <a href="{{ route('payment.checkout') }}"
                                       class="theme-btn-1 btn btn-effect-1">دفع</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SHOPING CART AREA END -->
@endsection












