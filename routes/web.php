<?php

use App\Http\Controllers\CountryStatisticsController;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\ForgotPasswordController;
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
		Route::view('sign-up', 'sign-up')->name('sign-up');
		Route::post('sign-up', 'register')->name('register');
	});

	Route::controller(SignInController::class)->group(function () {
		Route::get('/', 'index')->name('sign-in');
		Route::post('sign-in', 'login')->name('login');
	});
	Route::view('confirmation', 'auth.confirmation')->name('confirmation');
	Route::controller(ForgotPasswordController::class)->group(function () {
		Route::view('forgot-password', 'password.reset-password')->name('forgot-password');
		Route::post('forgot-password', 'sendVerificationEmail')->name('password.email');
		Route::view('password-confirmation', 'password.password-confirmation')->name('password-confirmation');
	});
});

Route::middleware('signed')->group(function () {
	Route::controller(EmailVerificationController::class)->group(function () {
		Route::get('email-verified', 'validateUser')->name('email-verified');
	});

	Route::controller(ForgotPasswordController::class)->group(function () {
		Route::view('new-password', 'password.new-password')->name('new-password');
		Route::post('new-password', 'changePassword')->name('change-password')->withoutMiddleware('signed');
		Route::view('success', 'password.success')->name('success')->withoutMiddleware('signed');
	});
});

Route::middleware('auth')->group(function () {
	Route::controller(WorldWideStatisticsController::class)->group(function () {
		Route::get('landing', 'index')->name('landing');
	});
	Route::controller(LogOutController::class)->group(function () {
		Route::post('logout', 'logout')->name('logout');
	});
});

// WIP
Route::get('/countries', [CountryStatisticsController::class, 'index']);
