<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// // Auth::routes();

// // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




/*
|--------------------------------------------------------------------------
| CLIENT ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('client.home');
})->name('home');

Route::get('/about', function () {
    return view('client.about');
});

Route::get('/contact', function () {
    return view('client.contact');
});


Route::post('/contact-submit', [HomeController::class, 'submit'])->name('contact.submit');

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {

    // ✅ MAKE THIS ROOT LOGIN PAGE
    Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');

    // login submit
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

    // logout
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->middleware('auth') // (later change to auth:admin)
        ->name('dashboard');
});