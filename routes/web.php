<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WarehouseController;

Route::get('/pda/home', [HomeController::class, 'index'])->name('home');

Route::get('/', [UserController::class, 'index'])->name('index');
Route::post('/login', [UserController::class, 'login'])->name('login');

Route::post('/pda/changeURL', [HomeController::class,'changeURL'])->name('changeURL');
Route::post('/pda/changeURLSubmit', [HomeController::class,'changeURLSubmit'])->name('changeURLSubmit');

Route::get('/warehouse', [WarehouseController::class, 'warehouse'])->name('warehouse'); 
