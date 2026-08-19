<?php

use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\WhatsAppController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| CLIENT ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/about', function () {
    return view('client.about');
});

Route::get('/accra', function () {
    return view('client.accra');
});

Route::get('/amplify', function () {
    return view('client.amplify');
});

Route::get('/connect', function () {
    return view('client.connect');
});



Route::get('/ignite', function () {
    return view('client.ignite');
});

Route::get('/london', function () {
    return view('client.london');
});


Route::get('/packages', function () {
    return view('client.packages');
});

Route::get('/privacy-policy', function () {
    return view('client.privacy-policy');
});

Route::get('/sitemap', function () {
    return view('client.sitemap');
});

Route::get('/terms', function () {
    return view('client.terms');
});


Route::get('/services', [HomeController::class, 'services'])->name('services');

Route::get('/works', [HomeController::class, 'work'])->name('work');

Route::get('/works/{slug}', [HomeController::class, 'workDetails'])
    ->name('details');

Route::get('/insights', [HomeController::class, 'blogs'])
    ->name('blogs.index');

Route::get('/insights/{blog:slug}', [HomeController::class, 'showBlog'])
    ->name('blogs.show');

Route::get('/author/{author:slug}', [HomeController::class, 'showAuthor'])
    ->name('author.show');
// Route::get('/contact', function () {
//     return view('client.contact');
// });



Route::get('/contact', function () {
    return view('client.contact');
})->name('contact');



Route::get('/media', [HomeController::class, 'media'])->name('media');

Route::post('/contact-submit', [HomeController::class, 'submit'])->name('contact.submit');
Route::post('/whatsapp/submit', [WhatsAppController::class, 'submit'])
    ->name('whatsapp.submit');

Route::post('/newsletter-subscribe', [HomeController::class, 'newsletterSubscribe'])
    ->name('newsletter.subscribe');

// Route::get('/unsubscribe/{id}', [HomeController::class, 'unsubscribeNewsletter'])
//     ->name('newsletter.unsubscribe');


// Route::get('/sitemap.xml', [SitemapController::class, 'index']);