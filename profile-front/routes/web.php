<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MailController;

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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

Route::get('/profile/form', [ProfileController::class, 'createForm'])->name('profile-form');

Route::post('/profile/generate-profile-url', [ProfileController::class, 'generateProfileUrl'])->name('generate-profile-url');

Route::get('/mail', [MailController::class, 'showMailForm'])->name('mail');

Route::post('/send-email', [MailController::class, 'sendEmail'])->name('send-email');

Route::view('/success', 'success')->name('success');

Route::view('/error', 'error')->name('error');