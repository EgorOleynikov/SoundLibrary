<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SoundController;
use App\Http\Controllers\AdminController;

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

Auth::routes();

Route::get('/banned', function() {
  return view('banned');
})->middleware('not_banned_control');

Route::group(['middleware' => ['auth', 'banned_control']], function() {
  Route::resource('/', SoundController::class);
  Route::get('/download/{id}', [SoundController::class, 'download']);
  Route::get('/report/{id}', [SoundController::class, 'report']);
  Route::post('/report/done', [SoundController::class, 'report_done']);
  Route::get('/ajax', [SoundController::class, 'ajax']);
  //Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

  Route::group(['middleware' => 'role_control', 'namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::get('/', function() {
      return view('admin.index');
    })->name('index');
    Route::group(['prefix' => 'publish', 'as' => 'publish.'], function() {
      Route::get('/', 'PublishController@index')->name('index');
      Route::post('/publish', 'PublishController@update')->name('publish');
      Route::post('/destroy', 'PublishController@destroy')->name('destroy');
    });
    Route::group(['prefix' => 'users', 'as' => 'users.'], function() {
      Route::get('/', 'UsersController@index')->name('index');
      Route::post('/update', 'UsersController@update')->name('update');
    });
    Route::group(['prefix' => 'sounds', 'as' => 'sounds.'], function() {
      Route::get('/', 'SoundsController@index')->name('index');
      Route::post('/update', 'SoundsController@update')->name('update');
    });
    Route::group(['prefix' => 'categories', 'as' => 'categories.'], function() {
      Route::get('/', 'CategoriesController@index')->name('index');
      Route::post('/update', 'CategoriesController@update')->name('update');
    });
    Route::group(['prefix' => 'reports', 'as' => 'reports.'], function() {
      Route::get('/', 'ReportsController@index')->name('index');
      Route::post('/destroy', 'ReportsController@destroy')->name('destroy');
    });
  });
});


// Route::get('/search', [SoundController::class, 'search']);
