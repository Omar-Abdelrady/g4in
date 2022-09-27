<div
                            class="ltn__product-item ltn__product-item-4 ltn__product-item-5 text-center---">
                            <div class="product-img">
                                <a href="{{ route('product.index', $product->slug) }}">
                                    <img
                                        class="w-100"
                                        src="{{ asset('storage/'. $product->photos[0]->image_medium) }}"
                                        alt="{{ $product->name }}">
                                </a>
                                <div class="real-estate-agent">
                                    <div class="agent-img">
                                        @if($product->discount != 0)
                                            <a href="{{ route('product.index', $product->slug) }}"
                                               class="disount-class">
                                                {{ $product->discount . '%' }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="product-info">
                                <h2 class="product-title">
                                    <a href="{{ route('product.index', $product->slug) }}">
                                        {{ $product->name }}
                                    </a>
                                </h2>
                                <ul class="ltn__list-item-2--- ltn__list-item-2-before--- ltn__plot-brief">
                                    <p>
                                        {{ $product->sub_description }}
                                    </p>
                                </ul>
                                <div class="product-hover-action">
                                    <ul>
                                        <li>
                                            <a href="{{ route('store.wishlist.add', $product->slug) }}" title="Wishlist"
                                               data-toggle="modal"
                                               data-target="#liton_wishlist_modal">
                                                <i class="flaticon-heart-1"></i></a>
                                        </li>
                                        <li>
                                            <a href="{{ route('product.index', $product->slug) }}"
                                               title="Product Details">
                                                <i class="flaticon-add"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-info-bottom">
                                <div class="product-price">
                                    <span
                                        class="{{ $product->discount != 0 ? 'text-line-through text-gray-dark': null }}">ريال{{ $product->price }}<label></label></span>
                                </div>
                                @if($product->discount != 0)
                                    <div class="product-price ">
                                        <span>ريال{{ $product->price - ( $product->price * ($product->discount / 100) ) }}<label></label></span>
                                    </div>
                                @endif
                            </div>
                        </div>
