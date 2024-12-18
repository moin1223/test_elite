<?php

use App\Http\Controllers\AuthImageVideoCoontroller;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProductCodeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\CommonApiController;
use App\Http\Controllers\RequestedReviewController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\OtpController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//User Route
Route::get('/', function () {
    // return view('frontend.layouts.default');
    return view('frontend.pages.home');
});

Route::controller(FrontendController::class)->group(function () {
    Route::get('/check-authenticity', 'checkAuthenticity')->name('check-authenticity');
    Route::post('/check-code-authenticity', 'checkCodeAuthenticity')->name('check-code-authenticity');
    Route::get('/check-code-authenticity-ajax', 'checkCodeAuthenticityAjax')->name('check-code-authenticity-ajax');
    Route::get('/home-page', 'homePage')->name('home-page');
    Route::get('/products', 'product')->name('product-page');
    Route::get('/contact-us', 'contactUs')->name('contact-us');
    Route::get('/about-us', 'aboutUs')->name('about-us');
    Route::get('/reseller', 'reseller')->name('reseller');
    Route::get('/ব্যবহারবিধি', 'ব্যবহারবিধি')->name('ব্যবহারবিধি');
    Route::get('/authorized-partners', 'getAuthorizedPartbner')->name('authorized-prtbners');
      Route::get('product/{productId}/details', [ProductController::class, 'productDetails'])->name('product-details');
    Route::get('product/{productId}/review', [ReviewController::class, 'productReview'])->name('product-review');
    Route::post('/seller-search', [FrontendController::class, 'sellerSearch'])->name('seller-search');
    Route::post('request-prodruct-review', [RequestedReviewController::class, 'requestProdructReview'])->name('request-prodruct-review')->middleware(['auth', 'verified']);
});

// Common
Route::get('get-districts', [CommonApiController::class, 'getDistricts'])->name('get-districts');
Route::get('get-thanas', [CommonApiController::class, 'getThanas'])->name('get-thanas');



//Admin Route
Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::controller(ProductCodeController::class)->prefix('product-code')->name('product-code.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');

        Route::get('/generate-pdf', 'generatePdf')->name('generate-pdf');
        Route::post('/download-pdf', 'downloadPdf')->name('download-pdf');
    })->middleware(['auth', 'verified']);

    Route::group(['middleware' => ['auth']], function () {
        Route::resource('product', ProductController::class);
    });
    Route::group(['middleware' => ['auth']], function () {
        Route::resource('slider', SliderController::class);
    });
    Route::group(['middleware' => ['auth']], function () {
        Route::resource('category', CategoryController::class);
    });
    Route::group(['middleware' => ['auth']], function () {
        Route::resource('auth-image-video', AuthImageVideoCoontroller::class);
    });
    // review
    Route::group(['middleware' => ['auth']], function () {
        Route::resource('review', ReviewController::class);
    });
    Route::get('requested-review', [RequestedReviewController::class, 'requestedReview'])->name('requested-review');
    Route::get('get-requested-review-details', [RequestedReviewController::class, 'getRequestedReviewDetails'])->name('get-requested-review-details');
    Route::post('accept-review-request', [RequestedReviewController::class, 'acceptReviewRequest'])->name('accept-review-request');
    Route::delete('/{reviewId}/cancel-review-request', [RequestedReviewController::class, 'cancelReviewRequest'])->name('cancel-review-request');


    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profiles', 'editProfile')->name('profile.edit');
        Route::put('update-profile', 'updateProfile')->name('profile.update');

        Route::get('/change-password', 'changePassword')->name('change_password');
        Route::put('/update-password', 'updatePassword')->name('update_password');
    })->middleware(['auth', 'verified']);

    Route::get('/dashboard', function () {
        return view('website.pages.home');
    })->middleware(['auth', 'verified'])->name("dashboard");
});



Route::middleware(['auth', 'verified'])->group(function () {
    require __DIR__ . '/users.php';
});

Route::prefix('otp')->group(function () {
    Route::get('send', [OtpController::class, 'sendOtp'])->name("sendOtp");
    Route::get('resend', [OtpController::class, 'resendOtp'])->name("resendOtp");
    Route::get('verify', [OtpController::class, 'verifyOtp'])->name("verifyOtp");
});

require __DIR__ . '/auth.php';
