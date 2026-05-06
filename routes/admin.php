<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\VideoCategoryController;
use App\Http\Controllers\Admin\VideoProjectController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\WorkCategoryController;
use App\Http\Controllers\Admin\WorkController;
use Illuminate\Support\Facades\Route;

// ✅ LOGIN ROUTES (no auth middleware)
Route::middleware('guest')->group(function () {
    Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
});

// Logout route
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// ✅ PROTECTED ROUTES (auth middleware)
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Leads
    Route::get('/leads', [ContactController::class, 'index'])->name('leads');
    Route::get('/leads/export', [ContactController::class, 'export'])->name('leads.export');
    Route::post('/leads/delete/{id}', [ContactController::class, 'delete'])->name('leads.delete');
    Route::post('/leads/bulk-delete', [ContactController::class, 'bulkDelete'])->name('leads.bulk-delete');

    // Video Categories
    Route::get('/categories', [VideoCategoryController::class, 'index'])->name('categories.index');
    Route::post('/categories', [VideoCategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/edit/{id}', [VideoCategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{id}', [VideoCategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{id}', [VideoCategoryController::class, 'destroy'])->name('categories.delete');

    // Videos
    Route::get('/videos', [VideoProjectController::class, 'index'])->name('videos.index');
    Route::get('/videos/new', [VideoProjectController::class, 'create'])->name('videos.create');
    Route::post('/videos', [VideoProjectController::class, 'store'])->name('videos.store');
    Route::get('/videos/edit/{id}', [VideoProjectController::class, 'edit'])->name('videos.edit');
    Route::put('/videos/{id}', [VideoProjectController::class, 'update'])->name('videos.update');
    Route::delete('/videos/{id}', [VideoProjectController::class, 'destroy'])->name('videos.delete');
    Route::patch('videos/{id}/toggle-publish', [VideoProjectController::class, 'togglePublish'])->name('videos.toggle-publish');

    // Blog Categories
    Route::resource('blog-category', BlogCategoryController::class);
    Route::patch('blog-category/{id}/toggle-publish', [BlogCategoryController::class, 'togglePublish'])->name('blog-category.toggle-publish');

    // Blog
    Route::resource('blog', BlogController::class);
    Route::patch('blog/{id}/toggle-publish', [BlogController::class, 'togglePublish'])->name('blog.toggle-publish');

    // Work Categories
    Route::resource('work-category', WorkCategoryController::class);
    Route::patch('work-category/{id}/toggle-publish', [WorkCategoryController::class, 'togglePublish'])->name('work-category.toggle-publish');

    // Work
    Route::resource('work', WorkController::class);
    Route::patch('work/{id}/toggle-publish', [WorkController::class, 'togglePublish'])->name('work.toggle-publish');
});
