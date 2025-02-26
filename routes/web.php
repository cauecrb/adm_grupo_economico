<?php

use Illuminate\Support\Facades\Route;
use App\Livewire;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/counter', \App\Livewire\Counter::class);
