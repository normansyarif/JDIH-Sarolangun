<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PerbupController;
use App\Http\Controllers\PerdaController;
use App\Http\Controllers\SkBupatiController;
use App\Models\SkBupati;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/news/{id}', [NewsController::class, 'show'])->name('news');

// Perda
Route::get('/perda', [PerdaController::class, 'perda'])->name('perda');

// Perbup
Route::get('/perbup', [PerbupController::class, 'perbup'])->name('perbup');

// sK
Route::get('/sk', [SkBupatiController::class, 'sk'])->name('sk');