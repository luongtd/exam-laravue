<?php
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('about-us', function () {
    return view('about-us');
});

Route::get('{any}', function () {
    return view('layout.app');
})->where('any', '.*');
// Auth::routes();

