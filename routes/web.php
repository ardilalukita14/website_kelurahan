<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaranController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::middleware(['middleware'=>'PreventBackHistory'])->group(function () {
    Auth::routes();
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/', [App\Http\Controllers\BaseController::class, 'index'])->name('index');
Route::get('/profile', [App\Http\Controllers\VisiMisiController::class, 'about'])->name('visimisi.visimisi');
Route::get('/news', [App\Http\Controllers\BeritaMainController::class, 'index'])->name('berita.show');
Route::get('/team', [App\Http\Controllers\BaseController::class, 'team'])->name('team');
Route::get('/testimonial', [App\Http\Controllers\BaseController::class, 'testimonial'])->name('testimonial');
Route::get('/donate', [App\Http\Controllers\BaseController::class, 'donate'])->name('donate');
Route::get('/contact', [App\Http\Controllers\BaseController::class, 'contact'])->name('contact');

Route::group(['middleware'=>['admin','auth','PreventBackHistory']], function(){
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'admin'])->name('admin');
Route::get('/widgets', [App\Http\Controllers\AdminController::class, 'widgets'])->name('widgets');

Route::get('/saran', [App\Http\Controllers\SaranController::class, 'index'])->name('saran.index');
Route::get('/shows/{id}', [App\Http\Controllers\SaranController::class, 'show'])->name('saran.show');
Route::get('/saran/create','App\Http\Controllers\SaranController@create')->name('saran.create');
Route::post('/saran/create','App\Http\Controllers\SaranController@store')->name('saran.store');
Route::get('/saran/delete/{id}','App\Http\Controllers\SaranController@destroy')->name('saran.destroy');

Route::get('/berita','App\Http\Controllers\BeritaController@index')->name('main.berita');
Route::get('/create','App\Http\Controllers\BeritaController@create')->name('main.create');
Route::post('/create','App\Http\Controllers\BeritaController@store')->name('main.create');
Route::post('/news/berita/cari','App\Http\Controllers\BeritaController@cari')->name('main.cari');
Route::get('/news/edit/{id}','App\Http\Controllers\BeritaController@edit')->name('main.edit');
Route::post('/news/edit/{id}','App\Http\Controllers\BeritaController@update')->name('main.edit');
Route::get('/news/{id}','App\Http\Controllers\BeritaController@show')->name('main.show');
Route::get('/news/delete/{id}','App\Http\Controllers\BeritaController@destroy')->name('main.delete');

Route::get('/pengumuman','App\Http\Controllers\PengumumanController@index')->name('pengumuman.index');
Route::get('/informasi/create','App\Http\Controllers\PengumumanController@create')->name('pengumuman.create');
Route::post('/informasi/create','App\Http\Controllers\PengumumanController@store')->name('pengumuman.create');
Route::post('/informasi/berita/cari','App\Http\Controllers\PengumumanController@cari')->name('pengumuman.cari');
Route::get('/informasi/edit/{id}','App\Http\Controllers\PengumumanController@edit')->name('pengumuman.edit');
Route::post('/informasi/edit/{id}','App\Http\Controllers\PengumumanController@update')->name('pengumuman.edit');
Route::get('/informasi/{id}','App\Http\Controllers\PengumumanController@show')->name('pengumuman.show');
Route::get('/informasi/delete/{id}','App\Http\Controllers\PengumumanController@destroy')->name('pengumuman.destroy');
});

Route::get('/visi','App\Http\Controllers\VisiMisiController@index')->name('visimisi.index');
Route::get('/visimisi/create','App\Http\Controllers\VisiMisiController@create')->name('visimisi.create');
Route::post('/visimisi/create','App\Http\Controllers\VisiMisiController@store')->name('visimisi.create');
Route::get('/visimisi/edit/{id}','App\Http\Controllers\VisiMisiController@edit')->name('visimisi.edit');
Route::post('/visimisi/edit/{id}','App\Http\Controllers\VisiMisiController@update')->name('visimisi.edit');
Route::get('/show/{id}','App\Http\Controllers\VisiMisiController@show')->name('visimisi.show');
Route::get('/visimisi/delete/{id}','App\Http\Controllers\VisiMisiController@destroy')->name('visimisi.destroy');

Route::get('/history','App\Http\Controllers\SejarahController@index')->name('sejarah.index');
Route::get('/sejarah/create','App\Http\Controllers\SejarahController@create')->name('sejarah.create');
Route::post('/sejarah/create','App\Http\Controllers\SejarahController@store')->name('sejarah.create');
Route::get('/sejarah/edit/{id}','App\Http\Controllers\SejarahController@edit')->name('sejarah.edit');
Route::post('/sejarah/edit/{id}','App\Http\Controllers\SejarahController@update')->name('sejarah.edit');
Route::get('/sejarah/{id}','App\Http\Controllers\SejarahController@show')->name('sejarah.show');
Route::get('/sejarah/delete/{id}','App\Http\Controllers\SejarahController@destroy')->name('sejarah.destroy');

Route::get('/','App\Http\Controllers\MainController@index')->name('reader.show');
// Route::get('/show','App\Http\Controllers\MainController@search')->name('search');
Route::post('/user/cariberita','App\Http\Controllers\MainController@cari')->name('reader.cr_berita');
Route::get('/user/{id}','App\Http\Controllers\MainController@show')->name('reader.show_news');
Route::post('/user/{id}','App\Http\Controllers\MainController@update')->name('reader.komentar');
Route::get('/user/list/{id}','App\Http\Controllers\MainController@list')->name('reader.list');

