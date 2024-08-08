<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\TuteeAuthController;
use App\Http\Controllers\Auth\TutorAuthController;
use App\Http\Controllers\TutorController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TutorDashboardController;

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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth'])->group(function (){
    Route::resource('tutor', TutorController::class);

    // Route::get('register', function () {
    //     return view('auth.register');
    // })->name('register.form');

    // Route::post('register', [RegisterController::class, 'register'])->name('register');
});
