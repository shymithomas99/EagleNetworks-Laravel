<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\VideoCategoryController;
use App\Http\Controllers\Admin\VideoProjectController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\InsightsPageController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\LondonPageController;
use App\Http\Controllers\Admin\AccraPageController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\PackagesPageController;
use App\Http\Controllers\Admin\ServicesPageController;
use App\Http\Controllers\Admin\WorkPageController;
use App\Http\Controllers\Admin\WorkCategoryController;
use App\Http\Controllers\Admin\WorkController;
use App\Http\Controllers\Admin\AboutPageController;
use App\Http\Controllers\Admin\ContactPageController;
use App\Http\Controllers\Admin\CookiePreferencePageController;
use App\Http\Controllers\Admin\HomePageController;
use App\Http\Controllers\Admin\MediaPageController;
use App\Http\Controllers\Admin\PrivacyPolicyController;
use App\Http\Controllers\Admin\TermsPageController;

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
    Route::resource('blogs', BlogController::class);
    Route::patch('blogs/{id}/toggle-publish', [BlogController::class, 'togglePublish'])->name('blogs.toggle-publish');

    // Work Categories
    Route::resource('work-category', WorkCategoryController::class);
    Route::patch('work-category/{id}/toggle-publish', [WorkCategoryController::class, 'togglePublish'])->name('work-category.toggle-publish');

    // Work
    Route::resource('works', WorkController::class);
    Route::patch('works/{id}/toggle-publish', [WorkController::class, 'togglePublish'])->name('works.toggle-publish');
    Route::get('works/{id}/gallery-images-form', 'WorkController@galleryImagesForm')->name('works.gallery-images-form');
    Route::post('delete-image', ['as' => 'delete-image', 'uses' => 'WorkController@deleteImage']);
    Route::post('upload-image', ['as' => 'upload-image', 'uses' => 'WorkController@uploadImage']);

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
            Route::patch('/{servicesPage}/toggle-publish', [ServicesPageController::class, 'togglePublish'])->name('services-page.toggle-publish');
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
            Route::patch('/{packagesPage}/toggle-publish', [PackagesPageController::class, 'togglePublish'])->name('packages-page.toggle-publish');
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
            Route::patch('/{package}/toggle-publish', [PackageController::class, 'togglePublish'])->name('packages.toggle-publish');
        });

    Route::prefix('london-page/{section}/{is_card}')
        ->where(['section' => '1|2|3|4|5|6|7|8|9|10|11', 'is_card' => '0|1'])
        ->group(function () {
            Route::get('/', [LondonPageController::class, 'index'])->name('london-page.index');
            Route::get('/create', [LondonPageController::class, 'create'])->name('london-page.create');
            Route::post('/', [LondonPageController::class, 'store'])->name('london-page.store');
            Route::get('/{londonPage}', [LondonPageController::class, 'show'])->name('london-page.show');
            Route::get('/{londonPage}/edit', [LondonPageController::class, 'edit'])->name('london-page.edit');
            Route::put('/{londonPage}', [LondonPageController::class, 'update'])->name('london-page.update');
            Route::delete('/{londonPage}', [LondonPageController::class, 'destroy'])->name('london-page.destroy');
            Route::patch('/{londonPage}/toggle-publish', [LondonPageController::class, 'togglePublish'])->name('london-page.toggle-publish');
        });

    Route::prefix('accra-page/{section}/{is_card}')
        ->where(['section' => '1|2|3|4|5|6|7|8|9|10|11', 'is_card' => '0|1'])
        ->group(function () {
            Route::get('/', [AccraPageController::class, 'index'])->name('accra-page.index');
            Route::get('/create', [AccraPageController::class, 'create'])->name('accra-page.create');
            Route::post('/', [AccraPageController::class, 'store'])->name('accra-page.store');
            Route::get('/{accraPage}', [AccraPageController::class, 'show'])->name('accra-page.show');
            Route::get('/{accraPage}/edit', [AccraPageController::class, 'edit'])->name('accra-page.edit');
            Route::put('/{accraPage}', [AccraPageController::class, 'update'])->name('accra-page.update');
            Route::delete('/{accraPage}', [AccraPageController::class, 'destroy'])->name('accra-page.destroy');
            Route::patch('/{accraPage}/toggle-publish', [AccraPageController::class, 'togglePublish'])->name('accra-page.toggle-publish');
        });

    Route::prefix('about-page/{section}/{is_card}')
        ->where(['section' => '1|2|3|4|5|6|7|8|9|10|11', 'is_card' => '0|1'])
        ->group(function () {
            Route::get('/', [AboutPageController::class, 'index'])->name('about-page.index');
            Route::get('/create', [AboutPageController::class, 'create'])->name('about-page.create');
            Route::post('/', [AboutPageController::class, 'store'])->name('about-page.store');
            Route::get('/{aboutPage}', [AboutPageController::class, 'show'])->name('about-page.show');
            Route::get('/{aboutPage}/edit', [AboutPageController::class, 'edit'])->name('about-page.edit');
            Route::put('/{aboutPage}', [AboutPageController::class, 'update'])->name('about-page.update');
            Route::delete('/{aboutPage}', [AboutPageController::class, 'destroy'])->name('about-page.destroy');
            Route::patch('/{aboutPage}/toggle-publish', [AboutPageController::class, 'togglePublish'])->name('about-page.toggle-publish');
        });

    Route::prefix('contact-page/{section}/{is_card}')
        ->where(['section' => '1|2|3|4|5', 'is_card' => '0|1'])
        ->group(function () {
            Route::get('/', [ContactPageController::class, 'index'])->name('contact-page.index');
            Route::get('/create', [ContactPageController::class, 'create'])->name('contact-page.create');
            Route::post('/', [ContactPageController::class, 'store'])->name('contact-page.store');
            Route::get('/{contactPage}', [ContactPageController::class, 'show'])->name('contact-page.show');
            Route::get('/{contactPage}/edit', [ContactPageController::class, 'edit'])->name('contact-page.edit');
            Route::put('/{contactPage}', [ContactPageController::class, 'update'])->name('contact-page.update');
            Route::delete('/{contactPage}', [ContactPageController::class, 'destroy'])->name('contact-page.destroy');
            Route::patch('/{contactPage}/toggle-publish', [ContactPageController::class, 'togglePublish'])->name('contact-page.toggle-publish');
        });

    Route::prefix('work-page/{section}/{is_card}')
        ->where(['section' => '1|2|3|4|5|6', 'is_card' => '0|1'])
        ->group(function () {
            Route::get('/', [WorkPageController::class, 'index'])->name('work-page.index');
            Route::get('/create', [WorkPageController::class, 'create'])->name('work-page.create');
            Route::post('/', [WorkPageController::class, 'store'])->name('work-page.store');
            Route::get('/{workPage}', [WorkPageController::class, 'show'])->name('work-page.show');
            Route::get('/{workPage}/edit', [WorkPageController::class, 'edit'])->name('work-page.edit');
            Route::put('/{workPage}', [WorkPageController::class, 'update'])->name('work-page.update');
            Route::delete('/{workPage}', [WorkPageController::class, 'destroy'])->name('work-page.destroy');
            Route::patch('/{workPage}/toggle-publish', [WorkPageController::class, 'togglePublish'])->name('work-page.toggle-publish');
        });

    Route::prefix('insights-page/{section}/{is_card}')
        ->where(['section' => '1|3', 'is_card' => '0'])
        ->group(function () {
            Route::get('/{insightsPage}/edit', [InsightsPageController::class, 'edit'])->name('insights-page.edit');
            Route::put('/{insightsPage}', [InsightsPageController::class, 'update'])->name('insights-page.update');
            Route::delete('/{insightsPage}', [InsightsPageController::class, 'destroy'])->name('insights-page.destroy');
            Route::patch('/{insightsPage}/toggle-publish', [InsightsPageController::class, 'togglePublish'])->name('insights-page.toggle-publish');
        });

    Route::prefix('home-page/{section}/{is_card}')
        ->where(['section' => '1|2|3|4|5|6|7|8|9|10', 'is_card' => '0|1'])
        ->group(function () {
            Route::get('/', [HomePageController::class, 'index'])->name('home-page.index');
            Route::get('/create', [HomePageController::class, 'create'])->name('home-page.create');
            Route::post('/', [HomePageController::class, 'store'])->name('home-page.store');
            Route::get('/{homePage}', [HomePageController::class, 'show'])->name('home-page.show');
            Route::get('/{homePage}/edit', [HomePageController::class, 'edit'])->name('home-page.edit');
            Route::put('/{homePage}', [HomePageController::class, 'update'])->name('home-page.update');
            Route::delete('/{homePage}', [HomePageController::class, 'destroy'])->name('home-page.destroy');
            Route::patch('/{homePage}/toggle-publish', [HomePageController::class, 'togglePublish'])->name('home-page.toggle-publish');
        });

    Route::prefix('terms-page/{section}/{is_card}')
        ->where([
            'section' => '1|2|3|4|5|6|7|8|9|10',
            'is_card' => '0|1',
        ])
        ->group(function () {

            /*
        |--------------------------------------------------------------------------
        | INDEX
        |--------------------------------------------------------------------------
        */

            Route::get('/', [TermsPageController::class, 'index'])
                ->name('terms-page.index');


            /*
        |--------------------------------------------------------------------------
        | CREATE
        |--------------------------------------------------------------------------
        */

            Route::get('/create', [TermsPageController::class, 'create'])
                ->name('terms-page.create');


            /*
        |--------------------------------------------------------------------------
        | STORE
        |--------------------------------------------------------------------------
        */

            Route::post('/', [TermsPageController::class, 'store'])
                ->name('terms-page.store');


            /*
        |--------------------------------------------------------------------------
        | SHOW
        |--------------------------------------------------------------------------
        */

            Route::get('/{termsPage}', [TermsPageController::class, 'show'])
                ->name('terms-page.show');


            /*
        |--------------------------------------------------------------------------
        | EDIT
        |--------------------------------------------------------------------------
        */

            Route::get('/{termsPage}/edit', [TermsPageController::class, 'edit'])
                ->name('terms-page.edit');


            /*
        |--------------------------------------------------------------------------
        | UPDATE
        |--------------------------------------------------------------------------
        */

            Route::put('/{termsPage}', [TermsPageController::class, 'update'])
                ->name('terms-page.update');


            /*
        |--------------------------------------------------------------------------
        | DELETE
        |--------------------------------------------------------------------------
        */

            Route::delete('/{termsPage}', [TermsPageController::class, 'destroy'])
                ->name('terms-page.destroy');


            /*
        |--------------------------------------------------------------------------
        | PUBLISH / UNPUBLISH
        |--------------------------------------------------------------------------
        */

            Route::patch(
                '/{termsPage}/toggle-publish',
                [TermsPageController::class, 'togglePublish']
            )->name('terms-page.toggle-publish');
        });

    Route::prefix('privacy-policy/{section}/{is_card}')
        ->where([
            'section' => '1|2|3|4|5|6|7|8|9|10|11',
            'is_card' => '0|1',
        ])
        ->group(function () {

            /*
        |--------------------------------------------------------------------------
        | INDEX
        |--------------------------------------------------------------------------
        */

            Route::get('/', [PrivacyPolicyController::class, 'index'])
                ->name('privacy-policy.index');


            /*
        |--------------------------------------------------------------------------
        | CREATE
        |--------------------------------------------------------------------------
        */

            Route::get('/create', [PrivacyPolicyController::class, 'create'])
                ->name('privacy-policy.create');


            /*
        |--------------------------------------------------------------------------
        | STORE
        |--------------------------------------------------------------------------
        */

            Route::post('/', [PrivacyPolicyController::class, 'store'])
                ->name('privacy-policy.store');


            /*
        |--------------------------------------------------------------------------
        | SHOW
        |--------------------------------------------------------------------------
        */

            Route::get('/{privacyPolicy}', [PrivacyPolicyController::class, 'show'])
                ->name('privacy-policy.show');


            /*
        |--------------------------------------------------------------------------
        | EDIT
        |--------------------------------------------------------------------------
        */

            Route::get('/{privacyPolicy}/edit', [PrivacyPolicyController::class, 'edit'])
                ->name('privacy-policy.edit');


            /*
        |--------------------------------------------------------------------------
        | UPDATE
        |--------------------------------------------------------------------------
        */

            Route::put('/{privacyPolicy}', [PrivacyPolicyController::class, 'update'])
                ->name('privacy-policy.update');


            /*
        |--------------------------------------------------------------------------
        | DELETE
        |--------------------------------------------------------------------------
        */

            Route::delete('/{privacyPolicy}', [PrivacyPolicyController::class, 'destroy'])
                ->name('privacy-policy.destroy');


            /*
        |--------------------------------------------------------------------------
        | PUBLISH / UNPUBLISH
        |--------------------------------------------------------------------------
        */

            Route::patch(
                '/{privacyPolicy}/toggle-publish',
                [PrivacyPolicyController::class, 'togglePublish']
            )->name('privacy-policy.toggle-publish');
        });



    // Cookie Preferences
    Route::get(
        '/cookie-preference-page/edit',
        [CookiePreferencePageController::class, 'edit']
    )->name('cookie-preference-page.edit');

    Route::put(
        '/cookie-preference-page',
        [CookiePreferencePageController::class, 'update']
    )->name('cookie-preference-page.update');

    Route::prefix('media-page')
        ->name('media-page.')
        ->group(function () {

            Route::get('/{section}/edit', [
                MediaPageController::class,
                'edit'
            ])->name('edit');

            Route::post('/{section}', [
                MediaPageController::class,
                'store'
            ])->name('store');

            Route::put('/{section}', [
                MediaPageController::class,
                'update'
            ])->name('update');

            Route::patch('/{section}/toggle-publish', [
                MediaPageController::class,
                'togglePublish'
            ])->name('toggle-publish');
        });
});