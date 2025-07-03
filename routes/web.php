<?php

use App\Http\Controllers\FinanzasController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FinanzasController::class, 'index'])->name('index');
Route::get('/impuesto', [FinanzasController::class, 'impuesto'])->name('formImpuesto');
Route::get('/descuento', [FinanzasController::class, 'descuento'])->name('formDescuento');
Route::get('/precio_final', [FinanzasController::class, 'precio'])->name('formPrecioFinal');
