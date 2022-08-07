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


Auth::routes();//['register'=>false,'showLoginForm '=>false,'password.update'=>false,'reset'=>false,'confirm'=>false]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/pendaftaran',[App\Http\Livewire\Pendaftaran\Pasien\Components\Pasienbaru::class, 'index'])->name('pendaftaranPasien');
Route::get('/updatePasien',[App\Http\Livewire\Pendaftaran\Pasien\Components\EditdataPasien::class,'index'])->name('updatePasien');
Route::get('/printpasien/{id}',[App\Http\Livewire\Pendaftaran\Pasien\Cetak::class,'cetak'])->name('printPasien');
Route::get('/kunjungan',[App\Http\Livewire\Pendaftaran\Kunjungan\Index::class,'index'])->middleware('auth')->name('Kunjungan');
//Route::get('/',[LoginController::class,'showLoginForm'])->name('login');

Route::middleware(['auth','admin'])->group(function(){
    Route::get('/diagnosa',[App\Http\Livewire\Diagnosa\Index::class,'index'])->name('diagnosa');
    Route::get('/tambahuser',[App\Http\Livewire\Tambahuser\Index::class,'index'])->name('tambahuser');
});
Route::get('/laporan',[App\Http\Livewire\Laporan\home::class,'index'])->name('laporan');



