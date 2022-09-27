<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('assets/admin-assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Global4in</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if(Auth::user()->photo)
                    <img src='{{ asset('assets/admin-assets/dist/img/user2-160x160.jpg') }}'
                         class='img-circle elevation-2' alt='User Image'>
                @else
                    <i class="fa fa-user" style="font-size: 30px"></i>
                @endif
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item has-treeview {{ Route::is('admin.store.*') ? 'active menu-open' : null }}">
                    <a href="#" class="nav-link {{ Route::is('admin.store.*') ? 'active' : null }} ">
                        <i class="nav-icon fas fa-store-alt"></i>
                        <p>
                            اﻟﻤﺘﺠﺮ
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.store.products.index') }}"
                               class="nav-link {{ Route::is('admin.store.products.*') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>اﻟﻤﻨﺘﺠﺎﺕ</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.store.category') }}"
                               class="nav-link {{ Route::is('admin.store.category.*') || Route::is('admin.store.category') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>اﻻﻗﺴﺎﻡ</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.store.colors.index') }}"
                               class="nav-link {{ Route::is('admin.store.colors.*') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>اﻻﻟﻮاﻥ</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.store.sizes.index') }}"
                               class="nav-link {{ Route::is('admin.store.sizes.*') ? 'active': null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>اﻟﻤﻘﺎﺳﺎﺕ</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.store.orders.index') }}"
                               class="nav-link {{ Route::is('admin.store.sizes.*') ? 'active': null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p> اﻟﻄﻠﺒﺎﺕ@if(\App\Models\Order::query()->where('read', 0)->count() > 0) <span class="bg-danger rounded px-2">{{\App\Models\Order::query()->where('read', 0)->count()}}</span> @endif</p>
                            </a>
                        </li>
                    </ul>
                <li class="nav-item">
                    <a href="{{ route('admin.service.index') }}" class="nav-link {{ Route::is('admin.service.*') ? 'active' : null }} ">
                        <i class="fas fa-star nav-icon"></i>
                        <p>ﺧﺪﻣﺎﺕ</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.partner.index') }}" class="nav-link {{ Route::is('admin.partner.*') ? 'active' : null }} ">
                        <i class="fas fa-star nav-icon"></i>
                        <p>اﻟﺸﺮﻛﺎء</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.store.coupons.index') }}" class="nav-link {{ Route::is('admin.store.coupons.*') ? 'active' : null }} ">
                        <i class="fas fa-star nav-icon"></i>
                        <p>اﻟﻜﻮﺑﻮﻧﺎﺕ</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.commercial.index') }}" class="nav-link {{ Route::is('admin.commercial.*') ? 'active' : null }} ">
                        <i class="fas fa-star nav-icon"></i>
                        <p>اﻟﺪﻋﺎﻳﺔ</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.contact.index') }}" class="nav-link {{ Route::is('admin.contact.*') ? 'active' : null }} ">
                        <i class="fas fa-star nav-icon"></i>
                        <p>اﻟﺮﺳﺎﺋﻞ@if(\App\Models\Contact::query()->where('is_read', 0)->count() > 0) <span class="bg-danger rounded px-2">{{\App\Models\Contact::query()->where('is_read', 0)->count()}}</span> @endif</p>
                    </a>
                </li>
                <li class="nav-item has-treeview {{ Route::is('admin.estates.*') ? 'active menu-open' : null }}">
                    <a href="#" class="nav-link {{ Route::is('admin.estates.*') ? 'active' : null }} ">
                        <i class="nav-icon fas fa-store-alt"></i>
                        <p>
                            اﻟﻌﻘﺎﺭاﺕ
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.estates.countries.index') }}"
                               class="nav-link {{ Route::is('admin.estates.countries.*') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>اﻟﺪﻭﻝ</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.estates.citys.index') }}"
                               class="nav-link {{ Route::is('admin.estates.citys.*') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>اﻟﻤﺪﻥ</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.estates.agents.index') }}"
                               class="nav-link {{ Route::is('admin.estates.agents.*') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>اﻟﻮﻛﻼء</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.estates.attacheds.index') }}"
                               class="nav-link {{ Route::is('admin.estates.attacheds.*') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>اﻟﻤﺮﻓﻘﺎﺕ</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.estates.attachments.index') }}"
                               class="nav-link {{ Route::is('admin.estates.attachments.*') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>اﻟﻤﺮﻓﻘﺎﺕ اﻟﻜﺘﺎﺑﻴﺔ</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.estates.categories.index') }}"
                               class="nav-link {{ Route::is('admin.estates.categories.*') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>نوع العقار</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.estates.sub-category.index') }}"
                               class="nav-link {{ Route::is('admin.estates.sub-category.*') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>صفة العقار</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.estates.ads.index') }}"
                               class="nav-link {{ Route::is('admin.estates.ads.*') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>اﻋﻼﻧﺎﺕ اﻟﻌﻘﺎﺭاﺕ</p>
                            </a>
                        </li>
                    </ul>
                <li class="nav-item">
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
