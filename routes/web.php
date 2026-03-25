<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ExplorerController;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/login', [PageController::class, 'login'])->name('login');
Route::get('/register', [PageController::class, 'register'])->name('register');
Route::get('/search', [PageController::class, 'search'])->name('search');

Route::get('/transaction/create', [TransactionController::class, 'create'])->name('transaction.create');

Route::post('/transaction/store',[TransactionController::class,'store'])->name('transaction.store');
Route::get('/transaction/{id}', [TransactionController::class, 'show'])->name('transaction.show');
Route::get('/explorer',[ExplorerController::class,'index'])->name('explorer');