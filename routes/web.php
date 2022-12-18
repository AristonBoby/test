<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Mailer\Transport\Smtp\Auth\LoginAuthenticator;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('home');
Route::get('/ubahpassword', [App\Http\Livewire\Ubahpassword\Formubahpassword::class, 'show'])->middleware('auth')->name('ubah.password');
Route::post('logout',[LoginController::class,'logout'])->middleware('auth')->name('logout');


/// Route Petugas Pendaftaran ///
Route::group(['prefix'=>'pendaftaran','middleware'=>'pendaftaran'],function(){
Route::get('/daftar',[App\Http\Livewire\Pendaftaran\Pasien\Components\Pasienbaru::class, 'index']) ->name('pendaftaran.pendaftaranPasien');
Route::get('/datapasien',[App\Http\Livewire\Pendaftaran\Pasien\Components\Datapasien::class,'show'])->name('pendaftaran.showdatapasien');
Route::get('/printpasien/{id}',[App\Http\Livewire\Pendaftaran\Pasien\Cetak::class,'cetak'])->name('pendaftaran.printPasien');
Route::get('/kunjungan',[App\Http\Livewire\Pendaftaran\Kunjungan\Index::class,'index'])->name('pendaftaran.Kunjungan');
Route::get('/updatePasien',[App\Http\Livewire\Pendaftaran\Pasien\Components\EditdataPasien::class,'index'])->name('pendaftaran.updatePasien');
Route::get('/ubahpassword', [App\Http\Livewire\Ubahpassword\Formubahpassword::class, 'show'])->middleware('auth')->name('pendaftaran.password');
Route::get('/laporanPetugas',[App\Http\Livewire\Laporan\laporan::class,'laporanPasienBaru'])->middleware('auth')->name('pendaftaran.laporanPetugas');
Route::get('/laporanPasien',[App\Http\Livewire\Laporan\laporan::class,'laporanDomisili'])->middleware('auth')->name('pendaftaran.laporanDomisili');
Route::get('/laporanKunjungan',[App\Http\Livewire\Laporan\laporan::class,'laporanKunjungan'])->middleware('auth')->name('pendaftaran.laporanKunjungan');

});
/////END////

Route::group(['prefix'=>'admin','middleware'=>'admin'],function(){
    Route::get('/datapasien',[App\Http\Livewire\Pendaftaran\Pasien\Components\Datapasien::class,'show'])->name('admin.showdatapasien');
    Route::get('/daftar',[App\Http\Livewire\Pendaftaran\Pasien\Components\Pasienbaru::class, 'index']) ->name('admin.pendaftaranPasien');
    Route::get('/printpasien/{id}',[App\Http\Livewire\Pendaftaran\Pasien\Cetak::class,'cetak'])->name('admin.printPasien');
    Route::get('/kunjungan',[App\Http\Livewire\Pendaftaran\Kunjungan\Index::class,'index'])->name('admin.Kunjungan');
    Route::get('/updatePasien',[App\Http\Livewire\Pendaftaran\Pasien\Components\EditdataPasien::class,'index'])->name('admin.updatePasien');
    Route::get('/diagnosa',[App\Http\Livewire\Diagnosa\Index::class,'index'])->name('admin.diagnosa');
    Route::get('/tambahuser',[App\Http\Livewire\Tambahuser\Index::class,'index'])->name('admin.tambahuser');
    Route::get('/poli',[App\Http\Livewire\Poli\index::class,'show'])->name('admin.poli');
    Route::get('/jaminan',[App\Http\Livewire\Jaminan\Index::class,'show'])->name('admin.jaminan');
    Route::get('/laporanPetugas',[App\Http\Livewire\Laporan\laporan::class,'laporanPasienBaru'])->middleware('auth')->name('admin.laporanPetugas');
    Route::get('/laporanKunjungan',[App\Http\Livewire\Laporan\laporan::class,'laporanKunjungan'])->middleware('auth')->name('admin.laporanKunjungan');
    Route::get('/laporanPasien',[App\Http\Livewire\Laporan\laporan::class,'laporanDomisili'])->middleware('auth')->name('admin.laporanDomisili');
    Route::get('/cetakKunjungan/{tglMulai}/{tglSampai}',[App\Http\Livewire\Laporan\kunjungan\Cetakpdf::class,'cetakPdf'])->middleware('auth')->name('admin.cetakKunjungan');
    Route::get('/ubahpassword', [App\Http\Livewire\Ubahpassword\Formubahpassword::class, 'show'])->middleware('auth')->name('admin.password');
    });

//sistem login//
Route::get('/',[LoginController::class,'showLoginForm'])->middleware('guest')->name('login.redirect');
Route::post('/login',[LoginController::class,'login'])->middleware('guest')->name('login');
// end login





