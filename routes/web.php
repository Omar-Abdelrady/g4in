<?php

use App\Http\Controllers\Admin\Estate\CityController;
use App\Http\Controllers\Admin\Estate\AddWriteAttachmentsToAdController;
use App\Http\Controllers\Admin\Estate\AgentController;
use App\Http\Controllers\Admin\Estate\AttachedController;
use App\Http\Controllers\Admin\Estate\CategoryController;
use App\Http\Controllers\Admin\Estate\CountryControoler;
use App\Http\Controllers\Admin\Estate\GetAttachedController;
use App\Http\Controllers\Admin\Estate\GetSubCategoryController;
use App\Http\Controllers\Admin\Estate\WriteAttachmentController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Web\AdController;
use App\Http\Controllers\Web\CommercialController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'website.index')->name('website.index');
Route::view('/about', 'website.about')->name('website.about');
Route::view('/services', 'website.services')->name('website.services');
Route::view('/contact', 'website.contact')->name('website.contact');
Route::view('/faq', 'website.FAQ')->name('website.FAQ');
Route::view('/terms-conditions', 'website.terms-conditions')->name('website.terms-conditions');
Route::view('/privacy', 'website.terms-conditions')->name('website.privacy');
Route::view('/estate', 'website.estate')->name('website.estate');

Route::get('/commercial', [\App\Http\Controllers\web\PagesController::class, 'commercial'])->name('website.commercial');
Route::get('/commerical/{slug}', [CommercialController::class, 'show'])->name('commercial.show');
Route::get('/commercial/download-pdf/{slug}', [CommercialController::class, 'download'])->name('commercial.download');
Route::get('/store', [\App\Http\Controllers\web\PagesController::class, 'store'])->name('website.store');

Route::get('/register', [\App\Http\Controllers\Web\Auth\RegisterController::class, 'register'])->name('register.index');
Route::post('/register', [\App\Http\Controllers\Web\Auth\RegisterController::class, 'submit'])->name('register.submit');
Route::get('/login', [\App\Http\Controllers\Web\Auth\LoginController::class, 'login'])->name('login.index');
Route::post('/login', [\App\Http\Controllers\Web\Auth\LoginController::class, 'submit'])->name('login.submit');
Route::get('/products', [\App\Http\Controllers\Web\Store\StoreController::class, 'index'])->name('store.index');
Route::get('/store/category/{slug}', [\App\Http\Controllers\Web\Store\StoreController::class, 'category'])->name('store.category');
Route::get('store/product/{slug}', [\App\Http\Controllers\Web\Store\ProductController::class, 'index'])->name('product.index');
Route::get('store/search/', [\App\Http\Controllers\Web\Store\ProductController::class, 'search'])->name('product.search');
Route::get('store/wishlist', [\App\Http\Controllers\Web\Store\WishlistController::class, 'index'])->name('store.wishlist');
Route::get('store/wishlist/{slug}', [\App\Http\Controllers\Web\Store\WishlistController::class, 'add'])->name('store.wishlist.add');
Route::get('store/wishlist/remove/{id}', [\App\Http\Controllers\Web\Store\WishlistController::class, 'remove'])->name('store.wishlist.remove');
Route::get('coupons', [\App\Http\Controllers\Web\CouponController::class, 'index'])->name('coupon.index');
Route::get('coupons/search/', [\App\Http\Controllers\Web\CouponController::class, 'search'])->name('coupon.search');
Route::get('/ads', [\App\Http\Controllers\Web\AdController::class, 'index'])->name('ads.index');
Route::get('/ad/search/', [\App\Http\Controllers\Web\AdController::class, 'search'])->name('ads.search');
Route::get('/ads/country/{country_id}', [AdController::class, 'countryAd'])->name('ads.country');
Route::get('/ads/{slug}', [\App\Http\Controllers\Web\AdController::class, 'show'])->name('ads.show');
Route::get('/ad/{slug}', [\App\Http\Controllers\Web\AdController::class, 'dwonload'])->name('ads.chart_download');
Route::get('/service/{slug}', [\App\Http\Controllers\Web\ServicesController::class, 'show'])->name('service.show');
Route::post('/contact/store', [\App\Http\Controllers\Admin\ContactUsController::class, 'store'])->name('contact.store');


Route::get('/cities/{id}', [\App\Http\Controllers\Web\AdController::class, 'getCities'])->name('ads.cities');
Route::group(['middleware' => 'auth:web'], function () {
    //    Start Cart Routers
    Route::get('/my-cart', [\App\Http\Controllers\Web\Store\CartController::class, 'index'])->name('cart.index');
    Route::post('/my-cart/add/{slug}', [\App\Http\Controllers\Web\Store\CartController::class, 'add'])->name('cart.add');
    Route::get('my-cart/remove/{id}', [\App\Http\Controllers\Web\Store\CartController::class, 'remove'])->name('cart.remove');
    //    End Cart Routers

    //    Start Checkout Routers
    Route::get('/store/payment-checkout', [\App\Http\Controllers\Web\Store\PaymentController::class, 'index'])->name('payment.checkout');
    Route::get('/store/payment-checkout/shopper', [\App\Http\Controllers\Web\Store\PaymentController::class, 'shopper'])->name('payment.shopper');
    Route::view('/store/payment-done', 'website.checkout-status')->name('payment.status');

    //    Start Order Information Route
    Route::post('/store/order-information', [\App\Http\Controllers\Web\Store\OrderController::class, 'store'])->name('order.store');
    Route::post('/store/order-information/update', [\App\Http\Controllers\Web\Store\OrderController::class, 'update'])->name('order.update');

    //    Start Evaluate Routers
    Route::post('/store/product/{slug}/evaluate', [\App\Http\Controllers\Web\Store\EvaluateController::class, 'store'])->name('product.evaluate');
    //    Start Get Coupon Route
    Route::get('coupons/get/{id}', [\App\Http\Controllers\Web\CouponController::class, 'get'])->name('coupon.get');

    //    Start Routes of Ads
    Route::get('/estate/create', [\App\Http\Controllers\Web\AdController::class, 'create'])->name('ads.create');

    Route::post('/estate/submit', [\App\Http\Controllers\Web\AdController::class, 'store'])->name('ads.store');

    //    get cities

});

Route::view('/admin', 'admin.index');


Route::group(['middleware' => 'auth:admin', 'as' => 'admin.', 'name' => 'admin', 'prefix' => 'admin'], function () {
    Route::get('/', ['App\Http\Controllers\Admin\AdminController', 'index'])->name('index');

    Route::group(['as' => 'store.', 'name' => 'admin', 'prefix' => '/store'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\Store\StoreController::class, 'index'])->name('store.index');
        Route::get('/categories/create', [\App\Http\Controllers\Admin\Store\CategoryController::class, 'create'])->name('category.create');
        Route::post('/categories/store', [\App\Http\Controllers\Admin\Store\CategoryController::class, 'store'])->name('category.store');
        Route::get('/categories', [\App\Http\Controllers\Admin\Store\CategoryController::class, 'index'])->name('category');
        Route::get('/categories/{slug}', [\App\Http\Controllers\Admin\Store\CategoryController::class, 'show'])->name('category.show');
        Route::get('/categories/edit/{slug}', [\App\Http\Controllers\Admin\Store\CategoryController::class, 'edit'])->name('category.edit');
        Route::post('/categories/update/{id}', ['App\Http\Controllers\Admin\Store\CategoryController', 'update'])->name('category.update');
        Route::post('categories/delete/{slug}', [\App\Http\Controllers\Admin\Store\CategoryController::class, 'destroy'])->name('category.destroy');
        Route::resource('sizes', \App\Http\Controllers\Admin\Store\SizeController::class)->parameters(['sizes' => 'id']);
        Route::resource('colors', \App\Http\Controllers\Admin\Store\ColorController::class)->parameters(['colors' => 'id']);
        Route::resource('products', \App\Http\Controllers\Admin\Store\ProductController::class)->parameters(['products' => 'slug']);
        Route::resource('orders', \App\Http\Controllers\Admin\Store\OrderController::class)->parameters(['orders' => 'id']);
        Route::resource('coupons', \App\Http\Controllers\Admin\CouponController::class)->parameters(['orders' => 'id']);
    });

    Route::resource('/service', ServiceController::class)->parameters(['service' => 'slug']);
    Route::group(['as' => 'estates.', 'name' => 'admin', 'prefix' => '/estate'], function () {
        Route::resource('/citys', CityController::class)->parameters(['citys' => 'id']);
        Route::resource('/categories', CategoryController::class)->parameters(['categories' => 'id']);
        Route::resource('/sub-category', SubCategoryController::class)->parameters(['categories' => 'id']);
        Route::resource('/countries', CountryControoler::class)->parameters(['countries' => 'id']);
        Route::resource('/ads', \App\Http\Controllers\Admin\Estate\AdController::class)->parameters(['ads' => 'id']);
        Route::get('/ads/status/{id}', [\App\Http\Controllers\Admin\Estate\AdController::class, 'status'])->name('ads.status');
        Route::resource('/agents', AgentController::class)->parameters(['agents' => 'id']);
        Route::resource('/attacheds', AttachedController::class)->parameters(['attacheds' => 'id']);
        Route::resource('/attachments', WriteAttachmentController::class)->parameters(['attachments' => 'id']);
        Route::get('/add/attachments/{slug}', [AddWriteAttachmentsToAdController::class, 'create'])->name('attachment.ad.add');
        Route::post('/create/attachments/{slug}', [AddWriteAttachmentsToAdController::class, 'store'])->name('attachment.ad.store');
        Route::post('/get-attached', [GetAttachedController::class, 'get'])->name('attachments.get');
        Route::get('/get/sub-category/{id}', [GetSubCategoryController::class, 'get'])->name('sub-categories.get');
    });

    Route::group(['as' => 'profile', 'prefix' => 'profile', 'name' => 'profile'], function () {
        Route::get('/index', [\App\Http\Controllers\Admin\ProfileController::class, 'index'])->name('.index');
        Route::get('/edit/', [\App\Http\Controllers\Admin\ProfileController::class, 'edit'])->name('.edit');
    });

    Route::resource('/partner', \App\Http\Controllers\Admin\PartnerControoler::class)->parameters(['partner' => 'id']);
    Route::resource('/contact', \App\Http\Controllers\Admin\ContactUsController::class)->except('store')->parameters(['contact' => 'id']);
    Route::resource('/commercial', \App\Http\Controllers\CommercialController::class)->parameters(['commercial' => 'id']);

    Route::get('admin/logout', [\App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->name('admin.logout');
});

Route::get('admin/login', [\App\Http\Controllers\Admin\Auth\LoginController::class, 'login'])->name('admin.login');
Route::post('admin/login/submit', [\App\Http\Controllers\Admin\Auth\LoginController::class, 'submit'])->name('admin.submit');
