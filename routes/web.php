<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddNewsController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\SourceController as AdminSourceController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Account\IndexController as AccountController;
use App\Http\Controllers\Admin\ProfileeController as updateProfile;





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
    return view('homenews');
})->name('homenews');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/newslist', [NewsController::class, 'index'])
	->name('news.index');
Route::get('/news/{news}', [NewsController::class, 'show'])
	->where('news', '\d+')
	->name('news.show');

//admin
Route::group(['middleware' => 'auth'], function() {
	Route::get('/account', AccountController::class)->name('account');
	Route::get('/account/logout', function() {
		\Auth::logout();
		return redirect()->route('login');
	})->name('account.logout');
	Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function() {
		Route::view('/', 'admin.index')->name('index');
		Route::resource('/categories', AdminCategoryController::class);
		Route::resource('/news', AdminNewsController::class);
		Route::resource('/sources', AdminSourceController::class);
		Route::resource('/profiles', AdminProfileController::class);
		Route::match(['post','get'], 'admin.profilee', [
			'uses' => 'App\Http\Controllers\Admin\ProfileeController@update',
			'as' => 'updateProfile'
		]);
	});
});

Route::resource('/feedback', FeedbackController::class);

Route::resource('/order', OrderController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');