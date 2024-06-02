<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('clientes', ClienteController::class);
Route::get('clientes/{id}/delete', [ClienteController::class, 'delete'])->name('clientes.delete');
