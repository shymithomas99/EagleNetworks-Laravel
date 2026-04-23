<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\WorkCategoryController;
use App\Http\Controllers\Admin\WorkController;
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
    
    Route::resource('blog-category', BlogCategoryController::class);
    Route::controller(BlogCategoryController::class)->group(function () {
        Route::get('blog-category/{id}/publish', 'publish')->name('blog-category.publish');
        Route::get('blog-category/{id}/unpublish', 'unpublish')->name('blog-category.unpublish');
    });
    Route::resource('blog', BlogController::class);
    Route::controller(BlogController::class)->group(function () {
        Route::get('blog/{id}/publish', 'publish')->name('blog.publish');
        Route::get('blog/{id}/unpublish', 'unpublish')->name('blog.unpublish');
    });
    Route::resource('work-category', WorkCategoryController::class);
    Route::controller(WorkCategoryController::class)->group(function () {
        Route::get('work-category/{id}/publish', 'publish')->name('work-category.publish');
        Route::get('work-category/{id}/unpublish', 'unpublish')->name('work-category.unpublish');
    });
    Route::resource('work', WorkController::class);
    Route::controller(WorkController::class)->group(function () {
        Route::get('work/{id}/publish', 'publish')->name('work.publish');
        Route::get('work/{id}/unpublish', 'unpublish')->name('work.unpublish');
    });
});