<?php

use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\VacanteController;
use Illuminate\Support\Facades\Route;

Route::get('/',HomeController::class)->name('home');

Route::get('/dashboard',[VacanteController::class,'index'])->middleware(['auth', 'verified','rol.reclutador'])->name('vacantes.index');
Route::get('/vacantes/create',[VacanteController::class,'create'])->middleware(['auth', 'verified','rol.reclutador'])->name('vacantes.create');
Route::get('/vacantes/{vacante}/edit',[VacanteController::class,'edit'])->middleware(['auth', 'verified','rol.reclutador'])->name('vacantes.edit');
Route::get('/vacantes/{vacante}',[VacanteController::class,'show'])->name('vacantes.show');

Route::get('/candidatos/{vacante}',[CandidatoController::class, 'index'])->middleware(['auth', 'verified','rol.reclutador'])->name('candidatos.index');

Route::get('/notificaciones', NotificacionController::class)->middleware(['auth','verified','rol.reclutador'])->name('notificaciones');

require __DIR__.'/auth.php';
