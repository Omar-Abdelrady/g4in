@extends('website.layouts.app')

@section('title', $product->name)

@section('description', $product->sub_description)

@section('keywords', $product->keywords)

@section('image', asset('storage/'.$product->photos[0]->image_medium))

@section('bread', $product->name)

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-12 overflow-hidden">
                    <div
                        style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
                        class="swiper-container mySwiper2"
                    >
                        <div class="swiper-wrapper">
                            @foreach($product->photos as $photo)
                                <div class="swiper-slide">
                                    <img src="{{ asset('storage/'.$photo->image) }}"/>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                    <div thumbsSlider="" class="swiper-container mySwiper">
                        <div class="swiper-wrapper">
                            @foreach($product->photos as $photo)
                                <div class="swiper-slide">
                                    <img src="{{ asset('storage/'.$photo->image_avatar) }}"/>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12 p-3">
                    <div class="product-ratting">
                        <ul>
                            @for($i=1; $i < $rate; $i++)
                                <li><a><i class="fas fa-star"></i></a>
                                </li>
                            @endfor
                            <li><a><i class="fas fa-star"></i></a></li>
                            <li class="review-total"><a> ( {{ $product->feedbacks->count() }} تقييم )</a></li>
                        </ul>
                    </div>
                    <h1 class="h2">
                        {{ $product->name }}
                    </h1>
                    <p>
                        {{ $product->sub_description }}
                    </p>
                    <div>
                        @if($product->discount != 0)
                            <p class="text-line-through h4 d-inline-block ">
                                {{ $product->price }}ريال
                            </p>
                            <p class="h3 ltn__secondary-color d-inline-block my-2">
                                {{ $product->price - ( $product->price * ($product->discount / 100) ) }} ريال
                            </p>
                        @else
                            <p class="h3 ltn__secondary-color ">
                                {{ $product->price }} ريال
                            </p>
                        @endif
                    </div>
                    <div>
                        <form action="{{ route('cart.add', $product->slug) }}" method="post">
                            @csrf
                            <div class="d-inline-block">
                                <select name="size" class="form-control" id="size">
                                    <option disabled selected value>اختر الحجم</option>
                                    @foreach($product->sizes as $size)
                                        <option value="{{ $size->name }}">{{ $size->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="d-inline-block mx-2">
                                <input name="qty" type="number" class="form-control" placeholder="الكمية">
                            </div>
                            <div>
                                <p class="m-0 mt-2">اختر اللون</p>
                                @foreach($product->colors as $key => $color)
                                    <label style="background: {{$color->color}};" class="label-color"
                                           for="color{{$key}}"></label>
                                    <input class="input-color" type="radio" name="color" id="color{{$key}}"
                                           value="{{ $color->name }}">
                                @endforeach
                            </div>
                            <button class="btn theme-btn-1 btn-effect-2 text-uppercase">اضف الي العربة</button>
                            <a href="{{ route('store.wishlist.add', $product->slug) }}" class="btn theme-btn-2 bg-danger btn-effect-2 text-white">اضف الي قائمة الامنيات</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- SHOP DETAILS AREA START -->
    <div class="ltn__shop-details-area pb-10">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="ltn__shop-details-inner ltn__page-details-inner mb-60">
                        <div class="ltn__blog-meta">
                            <ul>
                                <li class="ltn__blog-category">
                                    <a href="{{ route('store.category', $product->category->slug) }}">{{ $product->category->name }}</a>
                                </li>
                                <li class="ltn__blog-date">
                                    <i class="far fa-calendar-alt"></i>
                                    {{ $product->created_at->format('Y-m-d') }}
                                </li>
                            </ul>
                        </div>
                        <h1>{{ $product->name }}</h1>
                        <h4 class="title-2">الوصف</h4>

                        {!! $product->description !!}
                        @if(!$product->specifications->isEmpty())
                            <h4 class="title-2">تفاصيل </h4>
                            <table class="table table-striped">
                                <tbody>
                                @foreach($product->specifications as $specification)
                                    <tr>
                                        <td>{{$specification->name}}</td>
                                        <td>{{ $specification->body }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                        <div
                            class="ltn__shop-details-tab-content-inner--- ltn__shop-details-tab-inner-2 ltn__product-details-review-inner mt-3 mb-60">
                            <h4 class="title-2">تقيمات</h4>
                            <div class="product-ratting">
                                <ul>
                                    @for($i=1; $i < $rate; $i++)
                                        <li><a><i class="fas fa-star"></i></a>
                                        </li>
                                    @endfor
                                    <li><a><i class="fas fa-star"></i></a></li>
                                    <li class="review-total"><a> ( {{ $product->feedbacks->count() }} تقييم )</a></li>
                                </ul>
                            </div>
                            <hr>
                            <!-- comment-area -->
                            <div class="ltn__comment-area mb-30">
                                <div class="ltn__comment-inner">
                                    <ul>
                                        @foreach($product->feedbacks()->latest()->take(4)->get() as $item)
                                            <li>
                                                <div class="ltn__comment-item clearfix">
                                                    <div class="ltn__commenter-comment">
                                                        <h6>
                                                            <a>{{ $item->with('user')->first()->user->first_name.' '.$item->with('user')->first()->user->last_name }}</a>
                                                        </h6>
                                                        <div class="product-ratting">
                                                            <ul>
                                                                @for($i=0; $i < $item->evaluate; $i++)
                                                                    <li><a><i class="fas fa-star"></i></a>
                                                                    </li>
                                                                @endfor
                                                            </ul>
                                                        </div>
                                                        <p>
                                                            {{ $item->comment }}
                                                        </p>
                                                        <span
                                                            class="ltn__comment-reply-btn">{{ $item->created_at->format('Y-m-d') }}</span>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <!-- comment-reply -->
                            @if(auth()->guard('web')->check())
                                <div class="ltn__comment-reply-area ltn__form-box mb-30">
                                    <form action="{{ route('product.evaluate', $product->slug) }}" method="post">
                                        @csrf
                                        <h4>اضف تقييم</h4>
                                        <div class="mb-30">
                                            <div class="add-a-review">
                                                <h6>تقييمك:</h6>
                                                <div class="product-ratting">
                                                    <select class="form-control" name="evaluate" id="">
                                                        <option>أختر تقييم</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="input-item input-item-textarea ltn__custom-icon">
                                            <textarea name="comment" placeholder="اكتب تعليق...."></textarea>
                                        </div>
                                        <div class="btn-wrapper">
                                            <button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit">
                                                ارسال
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            @else
                                <h3><a href="{{ route('login.index') }}">سجل الدخول الان للتقييم</a></h3>
                            @endif
                        </div>

                        <h4 class="title-2">منتجات ذات صلة</h4>
                        <div class="row">
                        @foreach($product->category->products()->latest()->take(2)->get() as $product)
                            <!-- Product start -->
                                <div class="col-lg-6 col-sm-6 col-12">
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
                                                        <a href="#" title="Wishlist" data-toggle="modal"
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
                                </div>
                                <!--Product End-->
                            @endforeach
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

@endsection

@section('js-code')
    <script>
        var swiper = new Swiper(".mySwiper", {
            zoom: true,
            loop: true,
            spaceBetween: 10,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesVisibility: true,
            watchSlidesProgress: true,

        });
        var swiper2 = new Swiper(".mySwiper2", {
            zoom: true,
            loop: true,
            spaceBetween: 10,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            thumbs: {
                swiper: swiper,
            },
        });
        $('.slider-for').slick(
            {
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: true,
                asNavFor: '.slider-nav'
            }
        )
        $('.slider-nav').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.slider-for',
            dots: true,
            centerMode: true,
            focusOnSelect: true
        });
        $(document).on('click', '.label-color', function () {

            $('.label-color').removeClass('label-color-active')
            $(this).addClass('label-color-active')
        })
    </script>
@endsection
