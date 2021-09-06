<?php

use App\Http\Controllers\CarouselController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PerbupController;
use App\Http\Controllers\PerdaController;
use App\Http\Controllers\SkBupatiController;
use App\Models\SkBupati;
use Illuminate\Support\Facades\Auth;
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
    if (Auth::check()) {
        return redirect(route('panel.news'));
    } else {
        return redirect(route('login'));
    }
});

require __DIR__ . '/auth.php';

Route::get('/news/{id}', [NewsController::class, 'show'])->name('news');

// Perda
Route::get('/perda', [PerdaController::class, 'perda'])->name('perda');

// Perbup
Route::get('/perbup', [PerbupController::class, 'perbup'])->name('perbup');

// sK
Route::get('/sk', [SkBupatiController::class, 'sk'])->name('sk');



Route::middleware(['auth'])->group(function () {
    // panel
    Route::get('/admin/perda', [PerdaController::class, 'index'])->name('panel.perda');
    Route::post('/admin/perda/store', [PerdaController::class, 'store'])->name('panel.perda.store');
    Route::post('/admin/perda/update/{id}', [PerdaController::class, 'update'])->name('panel.perda.update');
    Route::post('/admin/perda/destroy/{id}', [PerdaController::class, 'destroy'])->name('panel.perda.destroy');

    Route::get('/admin/perbup', [PerbupController::class, 'index'])->name('panel.perbup');
    Route::post('/admin/perbup/store', [PerbupController::class, 'store'])->name('panel.perbup.store');
    Route::post('/admin/perbup/update/{id}', [PerbupController::class, 'update'])->name('panel.perbup.update');
    Route::post('/admin/perbup/destroy/{id}', [PerbupController::class, 'destroy'])->name('panel.perbup.destroy');

    Route::get('/admin/sk', [SkBupatiController::class, 'index'])->name('panel.sk');
    Route::post('/admin/sk/store', [SkBupatiController::class, 'store'])->name('panel.sk.store');
    Route::post('/admin/sk/update/{id}', [SkBupatiController::class, 'update'])->name('panel.sk.update');
    Route::post('/admin/sk/destroy/{id}', [SkBupatiController::class, 'destroy'])->name('panel.sk.destroy');

    Route::get('/admin/news', [NewsController::class, 'index'])->name('panel.news');
    Route::get('/admin/news/create', [NewsController::class, 'create'])->name('panel.news.create');
    Route::get('/admin/news/edit/{id}', [NewsController::class, 'edit'])->name('panel.news.edit');
    Route::post('/admin/news/store', [NewsController::class, 'store'])->name('panel.news.store');
    Route::post('/admin/news/update/{id}', [NewsController::class, 'update'])->name('panel.news.update');
    Route::post('/admin/news/destroy/{id}', [NewsController::class, 'destroy'])->name('panel.news.destroy');

    Route::get('/admin/carousel', [CarouselController::class, 'index'])->name('panel.carousel');
    Route::post('/admin/carousel/store', [CarouselController::class, 'store'])->name('panel.carousel.store');
    Route::post('/admin/carousel/update/{id}', [CarouselController::class, 'update'])->name('panel.carousel.update');
    Route::post('/admin/carousel/destroy/{id}', [CarouselController::class, 'destroy'])->name('panel.carousel.destroy');
});


Route::post('ckeditor/upload', 'GeneralController@upload')->name('ckeditor.upload');
