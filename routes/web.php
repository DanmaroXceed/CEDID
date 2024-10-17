<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/listado', [MainController::class, 'listado'])->name('listado');
Route::get('/busqueda', function () {return view('tarjetas'); })->name('filtrado');
