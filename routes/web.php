<?php

use App\Http\Controllers\CountryStatisticsController;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\LanguageController;
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

Route::get('/change.locale/{locale}', [LanguageController::class, 'changeLocale'])->name('locale.change');

Route::middleware('guest')->group(function () {
	Route::view('sign-up', [SignUpController::class, 'sign-up'])->name('sign-up');
	Route::post('sign-up', [SignUpController::class, 'register'])->name('register');

	Route::get('/', [SignInController::class, 'index'])->name('sign-in');
	Route::post('sign-in', [SignInController::class, 'login'])->name('login');

	Route::view('confirmation', 'auth.confirmation')->name('confirmation');

	Route::controller(ForgotPasswordController::class)->group(function () {
		Route::view('forgot-password', 'password.reset-password')->name('forgot-password');
		Route::post('forgot-password', 'sendVerificationEmail')->name('password.email');
		Route::view('password-confirmation', 'password.password-confirmation')->name('password-confirmation');
	});
});

Route::middleware('signed')->group(function () {
	Route::get('email-verified', [EmailVerificationController::class, 'validateUser'])->name('email-verified');

	Route::controller(ForgotPasswordController::class)->group(function () {
		Route::view('new-password', 'password.new-password')->name('new-password');
		Route::post('new-password', 'changePassword')->name('change-password')->withoutMiddleware('signed');
		Route::view('success', 'password.success')->name('success')->withoutMiddleware('signed');
	});
});

Route::middleware('auth')->group(function () {
	Route::get('landing', [WorldWideStatisticsController::class, 'index'])->name('landing');

	Route::post('logout', [LogOutController::class, 'logout'])->name('logout');

	Route::get('countries', [CountryStatisticsController::class, 'index'])->name('countries');
});
