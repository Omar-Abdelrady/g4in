<!-- HEADER AREA START (header-5) -->
<header class="ltn__header-area ltn__header-5 ltn__header-transparent--- gradient-color-4---">
    <!-- ltn__header-top-area start -->
    <div class="ltn__header-top-area section-bg-6 top-area-color-white---">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="ltn__top-bar-menu">
                        <ul>
                            <li><a href="mailto:"><i
                                        class="icon-mail"></i> info@webmail.com</a></li>
                            <li><a><i class="icon-placeholder"></i> 15/A, Nest Tower, NYC</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="top-bar-right text-right">
                        <div class="ltn__top-bar-menu">
                            <ul>
                                <li>
                                    <!-- ltn__social-media -->
                                    <div class="ltn__social-media">
                                        <ul>
                                            <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                                            </li>
                                            <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>

                                            <li><a href="#" title="Instagram"><i class="fab fa-instagram"></i></a>
                                            </li>
                                            <li><a href="#" title="Dribbble"><i class="fab fa-dribbble"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ltn__header-top-area end -->

    <!-- ltn__header-middle-area start -->
    <div class="ltn__header-middle-area ltn__header-sticky ltn__sticky-bg-white">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="site-logo-wrap">
                        <div class="site-logo">
                            <a href="{{ route('website.index') }}"><img
                                    src="{{ asset('assets/front-assets/img/logo-2.png') }}"
                                    alt="Logo"></a>
                        </div>
                    </div>
                </div>
                <div class="col header-menu-column">
                    <div class="ltn__main-menu">
                        <ul>
                            <li class=""><a href="{{ route('website.index') }}">الرئيسية</a>

                            </li>
                            <li class=""><a href="{{ route('website.about') }}">من نحن</a>

                            </li>
                            <li class=""><a href="{{ route('website.services') }}">خدمتنا</a>

                            </li>
                            <li class=" mega-menu-parent"><a href="{{ route('website.estate') }}">عقارات</a>
                            </li>
                            <li class=" mega-menu-parent"><a href="{{ route('website.store') }}">منتجاتنا</a>
                            </li>
                            <li><a href="{{ route('website.contact') }}">اتصل بنا</a></li>

                        </ul>
                    </div>
                </div>
                <div class="ltn__header-options ltn__header-options-2 mb-sm-20">
                    <!-- user-menu -->
                    <div class="ltn__drop-menu user-menu">
                        <ul>
                            <li>
                                <a href="#"><i class="icon-user"></i></a>
                                <ul>
                                    @if(auth()->check())
                                        <li><a>{{ auth()->user()->first_name }}</a></li>
                                    @else
                                        <li><a href="{{ route('login.index') }}">تسجيل دخول</a></li>
                                        <li><a href="{{ route('register.index') }}">التسجيل</a></li>
                                    @endif
                                    <li><a href="{{ route('store.wishlist') }}">قائمة امنياتي</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- mini-cart -->
                    <div class="mini-cart-icon">
                        <a href="{{ route('cart.index') }}" class="">
                            <i class="icon-shopping-cart"></i>
                            @auth('web')
                                <sup>{{ \ShoppingCart::countRows() }}</sup>
                            @endauth
                        </a>
                    </div>
                    <!-- mini-cart -->
                    <!-- Mobile Menu Button -->
                    <div class="mobile-menu-toggle d-xl-none">
                        <a href="#ltn__utilize-mobile-menu" class="ltn__utilize-toggle">
                            <svg viewBox="0 0 800 600">
                                <path
                                    d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200"
                                    id="top"></path>
                                <path d="M300,320 L540,320" id="middle"></path>
                                <path
                                    d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190"
                                    id="bottom"
                                    transform="translate(480, 320) scale(1, -1) translate(-480, -318) "></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ltn__header-middle-area end -->
</header>
<!-- HEADER AREA END -->

<!-- Utilize Mobile Menu Start -->
<div id="ltn__utilize-mobile-menu" class="ltn__utilize ltn__utilize-mobile-menu">
    <div class="ltn__utilize-menu-inner ltn__scrollbar">
        <div class="ltn__utilize-menu-head">
            <div class="site-logo">
                <a href="index.html"><img src="{{ asset('assets/front-assets/img/logo-2.png') }}" alt="Logo"></a>
            </div>
            <button class="ltn__utilize-close">×</button>
        </div>
        <div class="ltn__utilize-menu">
            <ul>
                <li><a href="{{ route('website.index') }}">الرئيسية</a>
                </li>
                <li><a href="{{ route('website.about') }}">من نحن</a>
                </li>
                <li><a href="{{ route('website.services') }}">خدمتنا</a>
                </li>
                <li><a href="{{ route('website.estate') }}">عقارات</a></li>
                <li><a href="{{ route('website.store') }}">منتجاتنا</a>

                </li>
                <li><a href="{{ route('website.contact') }}">اتصل بنا</a>
                </li>
            </ul>
        </div>
        <div class="ltn__utilize-buttons ltn__utilize-buttons-2">
            <ul>
                <li>
                    <a href="{{ route('store.wishlist') }}" title="Wishlist">
                            <span class="utilize-btn-icon">
                                <i class="far fa-heart"></i>
                            </span>
                        قائمة امنياتي
                    </a>
                </li>
                <li>
                    <a href="{{ route('cart.index') }}" title="Shoping Cart">
                            <span class="utilize-btn-icon">
                                <i class="fas fa-shopping-cart"></i>
                                @auth('web')
                                    <sup>{{ \ShoppingCart::countRows() }}</sup>
                                @endauth
                            </span>
                        العربة
                    </a>
                </li>
            </ul>
        </div>
        <div class="ltn__social-media-2">
            <ul>
                <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                <li><a href="#" title="Instagram"><i class="fab fa-instagram"></i></a></li>
            </ul>
        </div>
    </div>
</div>
<!-- Utilize Mobile Menu End -->

<div class="ltn__utilize-overlay"></div>
