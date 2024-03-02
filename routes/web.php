<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertiesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('auth.login');
});

// prefik untuk admin
Route::prefix('admin')->group(function () {
    Route::get('/properties', [PropertiesController::class, 'index'])->name('properties');
    Route::post('/properties/store', [PropertiesController::class, 'store'])->name('properties.store');
    Route::patch('/properties/{id}', [PropertiesController::class, 'update'])->name('properties.update');
    Route::delete('/properties/{id}', [PropertiesController::class, 'destroy'])->name('properties.destroy');

    Route::get('/wisma', function () {
        return view('admin.index-wisma');
    })->name('wisma');
    Route::get('/transactions', function () {
        return view('admin.transactions');
    });
    Route::get('/users', function () {
        return view('admin.users');
    });
});

// prefik untuk wisma
Route::prefix('wisma')->group(function () {
    Route::get('/', function () {
        return view('wisma.index');
    })->name('wisma');
    Route::get('/rooms', function () {
        return view('wisma.wisma-rooms');
    })->name('wisma-rooms');
});