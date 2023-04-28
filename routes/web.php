<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\WorldWideStatisticsController;
use App\Http\Controllers\CountryStatisticsController;
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
	Route::view('/', 'sign-in')->name('sign-in');
	Route::post('sign-up', [AuthController::class, 'register'])->name('register');
	Route::post('sign-in', [AuthController::class, 'login'])->name('login');
	Route::view('sign-up', [AuthController::class, 'sign-up'])->name('sign-up');
	Route::view('confirmation', 'auth.confirmation')->name('confirmation');

	Route::controller(ForgotPasswordController::class)->group(function () {
		Route::view('forgot-password', 'password.reset-password')->name('forgot-password');
		Route::view('password-confirmation', 'password.password-confirmation')->name('password-confirmation');
		Route::post('forgot-password', 'sendVerificationEmail')->name('password.email');
	});
});

Route::middleware('signed')->group(function () {
	Route::get('email-verified', [EmailVerificationController::class, 'validateUser'])->name('email-verified');

	Route::controller(ForgotPasswordController::class)->group(function () {
		Route::view('new-password', 'password.new-password')->name('new-password');
		Route::view('success', 'password.success')->name('success')->withoutMiddleware('signed');
		Route::post('new-password/{user}', 'changePassword')->name('change-password')->withoutMiddleware('signed');
	});
});

Route::middleware('auth')->group(function () {
	Route::post('logout', [AuthController::class, 'logout'])->name('logout');

	Route::get('landing', [WorldWideStatisticsController::class, 'index'])->name('landing');
	Route::get('landing-country', [CountryStatisticsController::class, 'index'])->name('landing-country.index');
	Route::get('landing-country/sort', [CountryStatisticsController::class, 'sort'])->name('landing-country.sort');
});
