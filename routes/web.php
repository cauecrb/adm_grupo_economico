<?php

use Illuminate\Support\Facades\Route;
use App\Livewire;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/counter', \App\Livewire\Counter::class);
Route::get('/adm-grupos', \App\Livewire\AdmGrupos::class);
Route::get('/adm-bandeiras', \App\Livewire\AdmBandeiras::class);
Route::get('/adm-unidades', \App\Livewire\AdmUnidades::class);
Route::get('/adm-colaboradores', \App\Livewire\Colaboradores::class);

