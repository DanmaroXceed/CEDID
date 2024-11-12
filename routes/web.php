<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Livewire\Login;

Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/listado', [MainController::class, 'listado'])->name('listado');
Route::get('/busqueda', function () {return view('tarjetas'); })->name('filtrado');
Route::get('/login', [MainController::class, 'login'])->name('login');

Route::middleware(['auth', 'web'])->group(function () {
    Route::get('/listado-admin', [MainController::class, 'listado_admin'])->name('listado-admin');
    Route::post('/recuperado/{dato}', [MainController::class, 'recuperado'])->name('recuperado');
    Route::post('/logout', [MainController::class, 'logout'])->name('logout');
});