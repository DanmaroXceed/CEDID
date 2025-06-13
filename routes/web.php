<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Livewire\Login;

Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/listado', [MainController::class, 'listado'])->name('listado');
Route::get('/busqueda', function () {return view('tarjetas'); })->name('filtrado');
Route::get('/login', [MainController::class, 'login'])->name('login');

Route::middleware(['auth'])->group(function () {
    Route::get('/listado-admin', [MainController::class, 'listado_admin'])->name('listado-admin');
    Route::get('/listado-completo', [MainController::class, 'listado_completo'])->name('listado-completo');
    Route::post('/recuperado/{dato}', [MainController::class, 'recuperado'])->name('recuperado');
    Route::post('/fr/{dato}', [MainController::class, 'fr'])->name('fr');
    Route::post('/logout', [MainController::class, 'logout'])->name('logout');
    Route::get('/captura', [MainController::class, 'captura'])->name('captura');
    Route::get('/usrs', [MainController::class, 'usrs'])->name('usrs');
    Route::get('/usrs/reg-usr', [MainController::class, 'reg_usr'])->name('reg-usr');
});