<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaranController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ProfileController;

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
Route::get('/','App\Http\Controllers\MainController@index')->name('reader.show');
Route::get('/contact', [App\Http\Controllers\BaseController::class, 'contact'])->name('contact');
Route::get('/standarpelayanan', [App\Http\Controllers\BaseController::class, 'standar'])->name('standarpelayanan');
Route::get('/visi&misi', [App\Http\Controllers\VisiMisiController::class, 'about'])->name('visimisi.visimisi');
Route::get('/histories', [App\Http\Controllers\SejarahController::class, 'history'])->name('sejarah.history');
Route::get('/tupoksikelurahan', [App\Http\Controllers\TupoksiController::class, 'tupoksi'])->name('tupoksi.main');
Route::get('/structures', [App\Http\Controllers\StrukturController::class, 'structure'])->name('struktur.main');
Route::get('/jadwalpelayanan', [App\Http\Controllers\TimeController::class, 'times'])->name('time.main');
Route::get('/employees', [App\Http\Controllers\PegawaiController::class, 'pegawai'])->name('pegawai.main');
Route::get('/maklumatpelayanan', [App\Http\Controllers\MaklumatController::class, 'maklumat'])->name('maklumat.main');
Route::get('/filesupload', [App\Http\Controllers\FileController::class, 'fileupload'])->name('file.main');
Route::get('/beritaterkini', [App\Http\Controllers\BeritaMainController::class, 'index'])->name('berita.show');
Route::get('/kamtibmas', [App\Http\Controllers\BeritaMainController::class, 'kamtibmas'])->name('kamtibmas.show');
Route::get('/kesehatan', [App\Http\Controllers\BeritaMainController::class, 'kesehatan'])->name('kesehatan.show');
Route::get('/pendidikan', [App\Http\Controllers\BeritaMainController::class, 'pendidikan'])->name('pendidikan.show');
Route::get('/ekonomi', [App\Http\Controllers\BeritaMainController::class, 'ekonomi'])->name('ekonomi.show');
Route::get('/pariwisata', [App\Http\Controllers\BeritaMainController::class, 'pariwisata'])->name('pariwisata.show');
Route::get('/karangtaruna', [App\Http\Controllers\BeritaMainController::class, 'karta'])->name('karta.show');
Route::get('/pkk', [App\Http\Controllers\BeritaMainController::class, 'pkk'])->name('pkk.show');
Route::get('/umkm', [App\Http\Controllers\BeritaMainController::class, 'umkm'])->name('umkm.show');
Route::get('/lpmk', [App\Http\Controllers\BeritaMainController::class, 'lpmk'])->name('lpmk.show');
Route::get('/bkm', [App\Http\Controllers\BeritaMainController::class, 'bkm'])->name('bkm.show');
Route::get('/kk', [App\Http\Controllers\BeritaMainController::class, 'kk'])->name('kk.show');
Route::get('/ktp', [App\Http\Controllers\BeritaMainController::class, 'ktp'])->name('ktp.show');
Route::get('/dokkel', [App\Http\Controllers\BeritaMainController::class, 'dokkel'])->name('dokkel.show');
Route::get('/pp', [App\Http\Controllers\BeritaMainController::class, 'pp'])->name('pp.show');
Route::get('/ppd', [App\Http\Controllers\BeritaMainController::class, 'ppd'])->name('ppd.show');
Route::get('/keteranganmenikah', [App\Http\Controllers\BeritaMainController::class, 'km'])->name('km.show');
Route::get('/ahliwaris', [App\Http\Controllers\BeritaMainController::class, 'kaw'])->name('kaw.show');
Route::get('/dokumenkematian', [App\Http\Controllers\BeritaMainController::class, 'dokem'])->name('dokem.show');
Route::get('/sktm', [App\Http\Controllers\BeritaMainController::class, 'ktm'])->name('ktm.show');
Route::get('/skck', [App\Http\Controllers\BeritaMainController::class, 'skck'])->name('skck.show');

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


Route::get('/pegawai','App\Http\Controllers\PegawaiController@index')->name('pegawai.index');
Route::get('/employee/create','App\Http\Controllers\PegawaiController@create')->name('pegawai.create');
Route::post('/employee/create','App\Http\Controllers\PegawaiController@store')->name('pegawai.create');
Route::post('/employee/berita/cari','App\Http\Controllers\PegawaiController@cari')->name('pegawai.cari');
Route::get('/employee/edit/{id}','App\Http\Controllers\PegawaiController@edit')->name('pegawai.edit');
Route::post('/employee/edit/{id}','App\Http\Controllers\PegawaiController@update')->name('pegawai.edit');
Route::get('/employee/{id}','App\Http\Controllers\PegawaiController@show')->name('pegawai.show');
Route::get('/employee/delete/{id}','App\Http\Controllers\PegawaiController@destroy')->name('pegawai.destroy');

Route::get('/komentar','App\Http\Controllers\KomentarController@index')->name('komentar.komentar');
Route::get('/detail_komen/{id}','App\Http\Controllers\KomentarController@show')->name('komentar.edit_komen');
Route::post('edit_komen/{id}','App\Http\Controllers\KomentarController@update')->name('komentar.do_editkomen');
Route::get('/delete_komen/{id}','App\Http\Controllers\KomentarController@destroy')->name('komentar.delete_komen');

Route::get('/visi','App\Http\Controllers\VisiMisiController@index')->name('visimisi.index');
Route::get('/visimisi/create','App\Http\Controllers\VisiMisiController@create')->name('visimisi.create');
Route::post('/visimisi/create','App\Http\Controllers\VisiMisiController@store')->name('visimisi.create');
Route::get('/visimisi/update/{id}','App\Http\Controllers\VisiMisiController@edit')->name('visimisi.edit');
Route::post('/visimisi/update/{id}','App\Http\Controllers\VisiMisiController@update')->name('visimisi.edit');
Route::get('/show/{id}','App\Http\Controllers\VisiMisiController@show')->name('visimisi.show');
Route::get('/visimisi/delete/{id}','App\Http\Controllers\VisiMisiController@destroy')->name('visimisi.destroy');

Route::get('/struktur','App\Http\Controllers\StrukturController@index')->name('struktur.index');
Route::get('/structure/create','App\Http\Controllers\StrukturController@create')->name('struktur.create');
Route::post('/structure/create','App\Http\Controllers\StrukturController@store')->name('struktur.create');
Route::get('/structure/update/{id}','App\Http\Controllers\StrukturController@edit')->name('struktur.edit');
Route::post('/structure/update/{id}','App\Http\Controllers\StrukturController@update')->name('struktur.edit');
Route::get('/structure/show/{id}','App\Http\Controllers\StrukturController@show')->name('struktur.show');
Route::get('/structure/delete/{id}','App\Http\Controllers\StrukturController@destroy')->name('struktur.destroy');

Route::get('/maklumat','App\Http\Controllers\MaklumatController@index')->name('maklumat.index');
Route::get('/maklumatlayanan/create','App\Http\Controllers\MaklumatController@create')->name('maklumat.create');
Route::post('/maklumatlayanan/create','App\Http\Controllers\MaklumatController@store')->name('maklumat.create');
Route::get('/maklumatlayanan/update/{id}','App\Http\Controllers\MaklumatController@edit')->name('maklumat.edit');
Route::post('/maklumatlayanan/update/{id}','App\Http\Controllers\MaklumatController@update')->name('maklumat.edit');
Route::get('/maklumatlayanan/show/{id}','App\Http\Controllers\MaklumatController@show')->name('maklumat.show');
Route::get('/maklumatlayanandelete/{id}','App\Http\Controllers\MaklumatController@destroy')->name('maklumat.destroy');

Route::get('/history','App\Http\Controllers\SejarahController@index')->name('sejarah.index');
Route::get('/sejarah/create','App\Http\Controllers\SejarahController@create')->name('sejarah.create');
Route::post('/sejarah/create','App\Http\Controllers\SejarahController@store')->name('sejarah.create');
Route::get('/sejarah/edit/{id}','App\Http\Controllers\SejarahController@edit')->name('sejarah.edit');
Route::post('/sejarah/edit/{id}','App\Http\Controllers\SejarahController@update')->name('sejarah.edit');
Route::get('/sejarah/{id}','App\Http\Controllers\SejarahController@show')->name('sejarah.show');
Route::get('/sejarah/delete/{id}','App\Http\Controllers\SejarahController@destroy')->name('sejarah.destroy');

Route::get('/tupoksi','App\Http\Controllers\TupoksiController@index')->name('tupoksi.index');
Route::get('/detailtupoksi/create','App\Http\Controllers\TupoksiController@create')->name('tupoksi.create');
Route::post('/detailtupoksi/create','App\Http\Controllers\TupoksiController@store')->name('tupoksi.create');
Route::get('/detailtupoksi/edit/{id}','App\Http\Controllers\TupoksiController@edit')->name('tupoksi.edit');
Route::post('/detailtupoksi/edit/{id}','App\Http\Controllers\TupoksiController@update')->name('tupoksi.edit');
Route::get('/detailtupoksi/{id}','App\Http\Controllers\TupoksiController@show')->name('tupoksi.show');
Route::get('/detailtupoksi/delete/{id}','App\Http\Controllers\TupoksiController@destroy')->name('tupoksi.destroy');

// Route::get('/show','App\Http\Controllers\MainController@search')->name('search');
Route::post('/detail/cariberita','App\Http\Controllers\MainController@cari')->name('reader.cr_berita');
Route::get('/detail/{id}','App\Http\Controllers\MainController@show')->name('reader.show_news');
Route::post('/detail/{id}','App\Http\Controllers\MainController@update')->name('reader.komentar');
Route::get('/detail/list/{id}','App\Http\Controllers\MainController@list')->name('reader.list');

Route::get('/kategori','App\Http\Controllers\KategoriController@index')->name('kategori.index');
Route::get('/category/create','App\Http\Controllers\KategoriController@create')->name('kategori.do_ketagori');
Route::post('/category/create','App\Http\Controllers\KategoriController@store')->name('kategori.do_ketagori');
Route::get('/admin/hapus/{id}','App\Http\Controllers\KategoriController@destroy')->name('kategori.delete_kategori');
Route::post('/admin/kategori/cari','App\Http\Controllers\KategoriController@search')->name('kategori.carikategori');
Route::get('/category/{id}','App\Http\Controllers\KategoriController@edit')->name('kategori.edit_kategori');
Route::post('/category/{id}','App\Http\Controllers\KategoriController@update')->name('kategori.do_edit_kategori');

Route::get('/layanan','App\Http\Controllers\LayananController@index')->name('layanan.index');
Route::get('/service/create','App\Http\Controllers\LayananController@create')->name('layanan.do_layanan');
Route::post('/service/create','App\Http\Controllers\LayananController@store')->name('layanan.do_layanan');
Route::get('/services/hapus/{id}','App\Http\Controllers\LayananController@destroy')->name('layanan.delete_layanan');
Route::post('/services/service/cari','App\Http\Controllers\LayananController@search')->name('layanan.carilayanan');
Route::get('/service/{id}','App\Http\Controllers\LayananController@edit')->name('layanan.edit_layanan');
Route::post('/service/{id}','App\Http\Controllers\LayananController@update')->name('layanan.do_edit_layanan');

Route::get('/maincontent','App\Http\Controllers\ContentController@index')->name('content.index');
Route::get('/contents/create','App\Http\Controllers\ContentController@create')->name('content.do_content');
Route::post('/contents/create','App\Http\Controllers\ContentController@store')->name('content.do_content');
Route::get('/contents/hapus/{id}','App\Http\Controllers\ContentController@destroy')->name('content.delete_content');
Route::post('/contents/cari','App\Http\Controllers\ContentController@search')->name('content.caricontent');
Route::get('/contents/{id}','App\Http\Controllers\ContentController@edit')->name('content.edit_content');
Route::post('/contents/{id}','App\Http\Controllers\ContentController@update')->name('content.do_edit_content');
Route::get('/contentshow/{id}','App\Http\Controllers\ContentController@show')->name('content.show');
Route::get('/contents/delete/{id}','App\Http\Controllers\ContentController@destroy')->name('content.delete');

Route::resource('files', FileController::class);
Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');

Route::get('/time','App\Http\Controllers\TimeController@index')->name('time.index');
Route::get('/times/create','App\Http\Controllers\TimeController@create')->name('time.create');
Route::post('/times/create','App\Http\Controllers\TimeController@store')->name('time.create');
Route::get('/times/update/{id}','App\Http\Controllers\TimeController@edit')->name('time.edit');
Route::post('/times/update/{id}','App\Http\Controllers\TimeController@update')->name('time.edit');
Route::get('/times/show/{id}','App\Http\Controllers\TimeController@show')->name('time.show');
Route::get('/times/delete/{id}','App\Http\Controllers\TimeController@destroy')->name('time.destroy');

});