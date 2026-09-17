<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\VideoCategoryController;
use App\Http\Controllers\Admin\VideoProjectController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\PackagesPageController;
use App\Http\Controllers\Admin\ServicesPageController;
use App\Http\Controllers\Admin\WorkCategoryController;
use App\Http\Controllers\Admin\WorkController;
use Illuminate\Support\Facades\Route;

// ✅ LOGIN ROUTES (no auth middleware)
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
});

// ✅ PROTECTED ROUTES (auth middleware)
Route::middleware('auth')->group(function () {
    // Logout route
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

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
    Route::patch('categories/{id}/toggle-publish', [VideoCategoryController::class, 'togglePublish'])->name('categories.toggle-publish');

    // Videos
    Route::get('/videos', [VideoProjectController::class, 'index'])->name('videos.index');
    Route::get('/videos/new', [VideoProjectController::class, 'create'])->name('videos.create');
    Route::post('/videos', [VideoProjectController::class, 'store'])->name('videos.store');
    Route::get('/videos/edit/{id}', [VideoProjectController::class, 'edit'])->name('videos.edit');
    Route::put('/videos/{id}', [VideoProjectController::class, 'update'])->name('videos.update');
    Route::delete('/videos/{id}', [VideoProjectController::class, 'destroy'])->name('videos.delete');
    Route::patch('videos/{id}/toggle-publish', [VideoProjectController::class, 'togglePublish'])->name('videos.toggle-publish');

    Route::resource('authors', AuthorController::class);

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
    Route::get('work/{id}/gallery-images-form', 'WorkController@galleryImagesForm')->name('work.gallery-images-form');
    Route::post('delete-image', ['as'=>'delete-image','uses'=>'WorkController@deleteImage']);
    Route::post('upload-image', ['as'=>'upload-image','uses'=>'WorkController@uploadImage']);

    //Services Page
    Route::prefix('services-page/{section}/{is_card}')
        ->where(['section' => '1|2|3|4|5|7|8|9', 'is_card' => '0|1'])
        ->group(function () {
            Route::get('/', [ServicesPageController::class, 'index'])->name('services-page.index');
            Route::get('/create', [ServicesPageController::class, 'create'])->name('services-page.create');
            Route::post('/', [ServicesPageController::class, 'store'])->name('services-page.store');
            Route::get('/{servicesPage}', [ServicesPageController::class, 'show'])->name('services-page.show');
            Route::get('/{servicesPage}/edit', [ServicesPageController::class, 'edit'])->name('services-page.edit');
            Route::put('/{servicesPage}', [ServicesPageController::class, 'update'])->name('services-page.update');
            Route::delete('/{servicesPage}', [ServicesPageController::class, 'destroy'])->name('services-page.destroy');
            Route::patch('{servicesPage}/toggle-publish', [ServicesPageController::class, 'togglePublish'])->name('services-page.toggle-publish');
        });

    // Packages Page
    Route::prefix('packages-page/{section}/{is_card}')
        ->where(['section' => '1|2|3|4|5|6|7', 'is_card' => '0|1'])
        ->group(function () {
            Route::get('/', [PackagesPageController::class, 'index'])->name('packages-page.index');
            Route::get('/create', [PackagesPageController::class, 'create'])->name('packages-page.create');
            Route::post('/', [PackagesPageController::class, 'store'])->name('packages-page.store');
            Route::get('/{packagesPage}', [PackagesPageController::class, 'show'])->name('packages-page.show');
            Route::get('/{packagesPage}/edit', [PackagesPageController::class, 'edit'])->name('packages-page.edit');
            Route::put('/{packagesPage}', [PackagesPageController::class, 'update'])->name('packages-page.update');
            Route::delete('/{packagesPage}', [PackagesPageController::class, 'destroy'])->name('packages-page.destroy');
            Route::patch('{packagesPage}/toggle-publish', [PackagesPageController::class, 'togglePublish'])->name('packages-page.toggle-publish');
        });
    
    // Packages
    Route::prefix('packages/{packagesPage}/{section}/{is_card}')
        ->where(['section' => '1|2|3|4|5', 'is_card' => '0|1'])
        ->group(function () {
            Route::get('/', [PackageController::class, 'index'])->name('packages.index');
            Route::get('/create', [PackageController::class, 'create'])->name('packages.create');
            Route::post('/', [PackageController::class, 'store'])->name('packages.store');
            Route::get('/{package}', [PackageController::class, 'show'])->name('packages.show');
            Route::get('/{package}/edit', [PackageController::class, 'edit'])->name('packages.edit');
            Route::put('/{package}', [PackageController::class, 'update'])->name('packages.update');
            Route::delete('/{package}', [PackageController::class, 'destroy'])->name('packages.destroy');
            Route::patch('{package}/toggle-publish', [PackageController::class, 'togglePublish'])->name('packages.toggle-publish');
        });
});
