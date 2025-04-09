<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;


//Route::get('/', [HomeController::class, 'index']) -> name('home');



Route::get('/login', function () {
    return redirect()->route('home'); // redireciona para a view de login
})->name('login');


Route::controller(HomeController::class)->group(function () {
  Route::get('/', 'index') -> name('home');
  Route::post('/home', 'store') -> name('home.store');
  
  
});


Route::middleware('auth')->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});