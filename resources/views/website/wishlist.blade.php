@extends('website.layouts.app')

@section('title', 'قائمة امنياتي - جلوبل 4 انفيست')

@section('description', 'قائمة امنياتك - جلوبل 4 انفيست')

@section('keywords', 'جلوبل 4 انفيست ')

@section('image', asset('assets/front-assets/img/logo-2.png'))

@section('content')
   <!-- WISHLIST AREA START -->
   <div class="liton__wishlist-area mb-105">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping-cart-inner">
                    <div class="shoping-cart-table table-responsive">
                        <table class="table">
                            <!-- <thead>
                                <th class="cart-product-remove">X</th>
                                <th class="cart-product-image">Image</th>
                                <th class="cart-product-info">Title</th>
                                <th class="cart-product-price">Price</th>
                                <th class="cart-product-quantity">Quantity</th>
                                <th class="cart-product-subtotal">Subtotal</th>
                            </thead> -->
                            <tbody>
                            @foreach(\Cart::instance('wishlist')->content() as $item)
                                <tr>
                                    <td class="cart-product-remove"><a href="{{ route('store.wishlist.remove', $item->rowId) }}">x</a></td>
                                    <td class="cart-product-image">
                                        <a href="{{ route('product.index', $item->options->slug) }}">
                                            <img src="{{ asset('storage/'. $item->options->image) }}" alt="#">
                                        </a>
                                    </td>
                                    <td class="cart-product-info">
                                        <h4><a href="{{ route('product.index', $item->options->slug) }}">{{ $item->name }}</a></h4>
                                    </td>
                                    <td class="cart-product-price">ريال{{ $item->price }}</td>
                                    <td class="cart-product-add-cart">
                                        <a class="submit-button-1" href="{{ route('product.index', $item->options->slug) }}" title="Add to Cart" data-toggle="modal" data-target="#add_to_cart_modal">اضف للسله</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- WISHLIST AREA START -->
@endsection
