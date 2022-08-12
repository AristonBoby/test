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

Route::group(['prefix'=>'pendaftaran','middleware'=>'auth','pendaftaran'],function(){
Route::get('/daftar',[App\Http\Livewire\Pendaftaran\Pasien\Components\Pasienbaru::class, 'index']) ->name('pendaftaranPasien');
Route::get('/datapasien',[App\Http\Livewire\Pendaftaran\Pasien\Components\Datapasien::class,'show'])->name('showdatapasien');
Route::get('/printpasien/{id}',[App\Http\Livewire\Pendaftaran\Pasien\Cetak::class,'cetak'])->name('printPasien');
Route::get('/kunjungan',[App\Http\Livewire\Pendaftaran\Kunjungan\Index::class,'index'])->name('Kunjungan');
Route::post('logout',[LoginController::class,'logout'])->name('logout');
});

Route::group(['prefix'=>'admin','middleware'=>'auth','admin'],function(){
    Route::get('/daftar',[App\Http\Livewire\Pendaftaran\Pasien\Components\Pasienbaru::class, 'index']) ->name('pendaftaranPasien');
    Route::get('/datapasien',[App\Http\Livewire\Pendaftaran\Pasien\Components\Datapasien::class,'show'])->name('showdatapasien');
    Route::get('/printpasien/{id}',[App\Http\Livewire\Pendaftaran\Pasien\Cetak::class,'cetak'])->name('printPasien');
    Route::get('/kunjungan',[App\Http\Livewire\Pendaftaran\Kunjungan\Index::class,'index'])->name('Kunjungan');
    Route::post('logout',[LoginController::class,'logout'])->name('logout');
    });
//sistem login//
Route::get('/',[LoginController::class,'showLoginForm'])->middleware('guest')->name('login.redirect');
Route::post('login',[LoginController::class,'login'])->name('login');

Route::get('/updatePasien',[App\Http\Livewire\Pendaftaran\Pasien\Components\EditdataPasien::class,'index'])->name('updatePasien');


Route::middleware(['auth','admin'])->group(function(){
    Route::get('/diagnosa',[App\Http\Livewire\Diagnosa\Index::class,'index'])->name('diagnosa');
    Route::get('/tambahuser',[App\Http\Livewire\Tambahuser\Index::class,'index'])->name('tambahuser');
});
Route::get('/laporan',[App\Http\Livewire\Laporan\home::class,'index'])->name('laporan');



