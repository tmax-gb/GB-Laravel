<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddNewsController;
use App\Http\Controllers\NewsController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

// Route::get('/news', function () {
//     return view('news');
// })->name('news');

Route::get('/news', [NewsController::class, 'index'])
	->name('newsIndex');
Route::get('/news/{id}', [NewsController::class, 'show'])
	->where('id', '\d+')
	->name('newsShow');

Route::get('/addnews', function () {
    return view('addnews');
})->name('addnews');

Route::post('/addnews/submit', [AddNewsController::class, 'submit' ])->name('news-form');