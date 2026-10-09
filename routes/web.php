<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AccraController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LondonController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InsightsController;
use App\Http\Controllers\PackagesController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\WhatsAppController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| CLIENT ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('about', [AboutController::class, 'index'])->name('about.index');

Route::get('contact', [ContactController::class, 'index'])->name('contact.index');

Route::get('accra', [AccraController::class, 'index'])->name('accra.index');

Route::get('london', [LondonController::class, 'index'])->name('london.index');

Route::get('services', [ServicesController::class, 'index'])->name('services.index');

Route::get('packages', [PackagesController::class, 'index'])->name('packages.index');

Route::get('packages/{packagesPage:slug}', [PackagesController::class, 'show'])
    ->name('packages.show');

Route::get('/works', [WorkController::class, 'index'])->name('works.index');

Route::get('/works/{slug}', [WorkController::class, 'show'])
    ->name('works.show');

Route::get('/insights', [InsightsController::class, 'index'])
    ->name('insights.index');

Route::get('/insights/{blog:slug}', [InsightsController::class, 'show'])
    ->name('insights.show');

Route::get('/author/{author:slug}', [InsightsController::class, 'author'])
    ->name('insights.author');

// Route::get('/privacy-policy', function () {
//     return view('client.privacy-policy');
// });


Route::get('/privacy-policy', [HomeController::class, 'privacyPolicy'])
    ->name('privacy-policy');

Route::get('/sitemap', function () {
    return view('client.sitemap');
});

// Route::get('/terms', function () {
//     return view('client.terms');
// });

Route::get('/terms', [HomeController::class, 'terms'])
    ->name('terms');

Route::get('/media', [HomeController::class, 'media'])->name('media');

Route::post('/contact-submit', [HomeController::class, 'submit'])->name('contact.submit');
Route::post('/whatsapp/submit', [WhatsAppController::class, 'submit'])
    ->name('whatsapp.submit');

Route::post('/newsletter-subscribe', [HomeController::class, 'newsletterSubscribe'])
    ->name('newsletter.subscribe');

// Route::get('/unsubscribe/{id}', [HomeController::class, 'unsubscribeNewsletter'])
//     ->name('newsletter.unsubscribe');


// Route::get('/sitemap.xml', [SitemapController::class, 'index']);

// use Illuminate\Support\Facades\Artisan;

// Route::get('/generate-app-key', function () {
//     Artisan::call('key:generate', [
//         '--force' => true,
//     ]);

//     return 'Application key generated successfully.';
// });



// Route::get('/generate-sitemap', function () {
//     Artisan::call('sitemap:generate');

//     return 'Sitemap generated successfully.';
// });