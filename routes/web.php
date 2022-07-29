<?php

use Illuminate\Support\Facades\Route;

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
Route::get('logout', function ()
{
    auth()->logout();
    Session()->flush();

    return Redirect::to('/');
})->name('logout');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/pendaftaran',[App\Http\Livewire\Pendaftaran\Pasien\Components\Pasienbaru::class, 'index'])->name('pendaftaranPasien');
Route::get('/updatePasien',[App\Http\livewire\pendaftaran\Pasien\Components\EditdataPasien::class,'index'])->name('updatePasien');
Route::get('/printpasien/{id}',[App\Http\livewire\pendaftaran\Pasien\Cetak::class,'cetak'])->name('printPasien');
Route::get('/kunjungan',[App\Http\livewire\pendaftaran\Kunjungan\index::class,'index'])->middleware('auth')->name('Kunjungan');
Route::get('/diagnosa',[App\Http\livewire\Diagnosa\index::class,'index'])->name('diagnosa')->middleware('auth');
Route::get('/laporan',[App\Http\Livewire\Laporan::class,'index'])->name('laporan');

