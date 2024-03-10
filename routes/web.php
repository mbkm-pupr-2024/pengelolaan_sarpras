<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertiesController;
use App\Http\Controllers\TransactionController;

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

    // Calon tidak terpakai
    Route::get('/wisma', [TransactionController::class, 'wisma_show_admin'])->name('wisma-admin');
    // ===============================

    Route::get('/transactions', [TransactionController::class, 'index'])
            ->name('transactions');
    Route::post('/transactions/wisma', [TransactionController::class, 'wisma_store'])
            ->name('transactions.wisma.store');
});

// prefik untuk wisma
Route::prefix('wisma')->group(function () {
    Route::get('/', function () {
        return view('wisma.index');
    })->name('wisma');

    Route::get('/rooms', [TransactionController::class, 'wisma_show'])->name('wisma-rooms');
});

Route::get('calendar', function () {
    return view('calendar');
})->name('calendar');

Route::fallback(function () {
    return view('errors.404');
});