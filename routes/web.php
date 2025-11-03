<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', [AuthController::class, 'formLogin'])->name('login');
Route::post('/login-proses', [AuthController::class, 'authenticate'])->name('login.proses');

Route::get('/pendaftaran', [HomeController::class, 'formPendaftaran'])->name('pendaftaran.form');
Route::post('/pendaftaran', [HomeController::class, 'prosesPendaftaran'])->name('pendaftaran.proses');


Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/dashboard/konten-hero', [DashboardController::class, 'KontenHero'])->name('dashboard.kontenHero');
    Route::put('/konten-hero', [DashboardController::class, 'updateKontenHero'])->name('dashboard.kontenHero.update');

    Route::get('/dashboard/konten-profil', [DashboardController::class, 'kontenProfil'])->name('dashboard.kontenProfil');
    Route::get('/dashboard/konten-profil', [DashboardController::class, 'kontenProfil'])->name('dashboard.kontenProfil');
    Route::put('/dashboard/konten-profil', [DashboardController::class, 'updateKontenProfil'])->name('dashboard.kontenProfil.update');

    Route::get('/dashboard/program-studi', [DashboardController::class, 'programStudi'])->name('dashboard.programStudi');
    Route::get('/dashboard/program-studi', [DashboardController::class, 'programStudi'])->name('dashboard.programStudi');
    Route::post('/dashboard/program-studi', [DashboardController::class, 'storeProgramStudi'])->name('dashboard.programStudi.store');
    Route::put('/dashboard/program-studi/{programStudi}', [DashboardController::class, 'updateProgramStudi'])->name('dashboard.programStudi.update');
    Route::delete('/dashboard/program-studi/{programStudi}', [DashboardController::class, 'destroyProgramStudi'])->name('dashboard.programStudi.destroy');

    Route::get('/dashboard/pimpinan', [DashboardController::class, 'pimpinan'])->name('dashboard.pimpinan');
    Route::get('/dashboard/pimpinan', [DashboardController::class, 'pimpinan'])->name('dashboard.pimpinan');
    Route::post('/dashboard/pimpinan', [DashboardController::class, 'storePimpinan'])->name('dashboard.pimpinan.store');
    Route::put('/dashboard/pimpinan/{pimpinan}', [DashboardController::class, 'updatePimpinan'])->name('dashboard.pimpinan.update'); 
    Route::delete('/dashboard/pimpinan/{pimpinan}', [DashboardController::class, 'destroyPimpinan'])->name('dashboard.pimpinan.destroy');

    Route::get('/dashboard/testimoni', [DashboardController::class, 'testimoni'])->name('dashboard.testimoni');
    Route::post('/dashboard/testimoni', [DashboardController::class, 'storeTestimoni'])->name('dashboard.testimoni.store');
    Route::put('/dashboard/testimoni/{testimoni}', [DashboardController::class, 'updateTestimoni'])->name('dashboard.testimoni.update');
    Route::delete('/dashboard/testimoni/{testimoni}', [DashboardController::class, 'destroyTestimoni'])->name('dashboard.testimoni.destroy');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

});



