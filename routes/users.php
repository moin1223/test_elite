<?php

use App\Http\Controllers\AuthorizedPartnerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes for User Dashboard
|--------------------------------------------------------------------------
|
*/


Route::get('/dashboard', function () {

    // Auth::logout();
    // return redirect()->route('login');
    return view('website.pages.home');
})->name('dashboard');

// USER RELATED ROUTE
Route::get('get-role-based-user', [UserController::class, 'getRoleBasedUser'])->name('getRoleBasedUser');
Route::post('assign-user', [UserController::class, 'assignUser'])->name('assignUser');
Route::get('check-user-id', [UserController::class, 'checkUserId'])->name('checkUserId');

Route::get('assigned-users', [UserController::class, 'assignedUsers'])->name('assignedUsers');
Route::group(['middleware' => ['auth', 'role:admin']], function () {
// new
Route::get('requested-user', [UserController::class, 'requestedUser'])->name('requested-user');
Route::get('get-requested-user-details', [UserController::class, 'getRequestedUserDetails'])->name('get-requested-user-details');
Route::post('accept-user-register-request', [UserController::class, 'acceptUserRegisterRequest'])->name('accept-user-register-request');
Route::delete('/{userId}/cancel-user-register-request',[UserController::class, 'cancelUserRegisterRequest'])->name('cancel-user-register-request');
// Route::group(['middleware' => ['permission:can_add_user|can_edit_user|can_delete_user']], function () {
Route::resource('user', UserController::class);
Route::get('get-seller-list', [UserController::class, 'getSellerList'])->name('get-seller-list');
Route::resource('authorized-partner', AuthorizedPartnerController::class);
Route::resource('event', EventController::class);
// });
});

require __DIR__ . '/admin.php';
