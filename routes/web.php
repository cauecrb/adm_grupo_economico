<?php

use Illuminate\Support\Facades\Route;
use App\Livewire;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/counter', \App\Livewire\Counter::class);
Route::get('/adm-grupos', \App\Livewire\AdmGrupos::class);
//Route::get('/bandeiras', \App\Livewire\Bandeiras::class);

