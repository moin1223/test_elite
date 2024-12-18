<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes for User Dashboard
|--------------------------------------------------------------------------
|
*/

Route::group(['middleware' => ['can:accept_request', 'auth']], function () {
    Route::get('check-request', [UserController::class, 'checkRequest'])->name('checkRequest');
    Route::post('accept-registration-request', [UserController::class, 'acceptRegistrationRequest'])->name('acceptRegistrationRequest');
    Route::get('check-edit-request', [UserController::class, 'checkEditRequest'])->name('checkEditRequest');
    Route::post('accept-edit-request/{userEditRequest}', [UserController::class, 'acceptEditRequest'])->name('acceptEditRequest');
});
