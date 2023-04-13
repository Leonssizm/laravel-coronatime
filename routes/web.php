<?php

use App\Http\Controllers\SignInController;
use App\Http\Controllers\SignUpController;
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

Route::get('/', [SignInController::class, 'index'])->name('sign-in');
Route::get('/sign-up', [SignUpController::class, 'index'])->name('sign-up');

Route::view('/reset-password', 'password.reset-password');
Route::view('/confirmation', 'password.confirmation');
Route::view('/new-password', 'password.new-password');
Route::view('/success', 'password.success');
Route::view('/landing', 'landing-worldwide');
