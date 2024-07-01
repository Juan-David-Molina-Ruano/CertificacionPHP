<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AsistenciaController;

Route::group(['prefix' => 'asistencias', 'middleware' => 'auth_docentes'], function(){
    Route::get('/', [AsistenciaController::class, 'index'])->name('asistencias.index');
    Route::get('/create', [AsistenciaController::class, 'create'])->name('asistencias.create');
    Route::post('/create', [AsistenciaController::class, 'store'])->name('asistencias.store');
});

