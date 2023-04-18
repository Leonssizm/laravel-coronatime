<?php

use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\LogOutController;
use App\Http\Controllers\SignInController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\WorldWideStatisticsController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('guest')->group(function () {
	Route::controller(SignUpController::class)->group(function () {
		Route::get('sign-up', 'index')->name('sign-up');
		Route::post('sign-up', 'register')->name('register');
	});

	Route::controller(SignInController::class)->group(function () {
		Route::get('/', 'index')->name('sign-in');
		Route::get('confirmation', 'verifyEmail')->name('confirmation');
		Route::post('sign-in', 'login')->name('login');
	});
});

Route::middleware('auth')->group(function () {
	Route::controller(WorldWideStatisticsController::class)->group(function () {
		Route::get('/landing', 'index')->name('landing');
	});
	Route::controller(LogOutController::class)->group(function () {
		Route::post('/logout', 'logout')->name('logout');
	});
});

Route::controller(EmailVerificationController::class)->group(function () {
	Route::get('email-verified', 'validateUser')->name('email-verified');
});

// WIP, for testing
Route::view('/reset-password', 'password.reset-password');
Route::view('/new-password', 'password.new-password');
Route::view('/success', 'password.success');
