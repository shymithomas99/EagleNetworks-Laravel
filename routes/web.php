<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/accra', function () {
    return view('client.accra');
});

Route::get('/amplify', function () {
    return view('client.amplify');
});

Route::get('/connect', function () {
    return view('client.connect');
});

Route::get('/details', function () {
    return view('client.details');
});

Route::get('/ignite', function () {
    return view('client.ignite');
});

Route::get('/london', function () {
    return view('client.london');
});

Route::get('/media', function () {
    return view('client.media');
});

Route::get('/packages', function () {
    return view('client.packages');
});

Route::get('/privacy-policy', function () {
    return view('client.privacy-policy');
});

Route::get('/services', function () {
    return view('client.services');
});

Route::get('/sitemap', function () {
    return view('client.sitemap');
});

Route::get('/terms-of-use', function () {
    return view('client.terms-of-use');
});

Route::get('/contact', function () {
    return view('client.contact');
});



Route::get('/work', [HomeController::class, 'work']);


Route::post('/contact-submit', [HomeController::class, 'submit'])->name('contact.submit');
