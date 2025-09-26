<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PaginaController;
use App\Http\Controllers\GlobalController;


Route::get('/', [PageController::class, 'showEnglish'])->name('home');
Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

Route::get('locale/{locale}', function ($locale) {
    session()->put('locale', $locale);
    return redirect()->back();
})->name('locale');


Route::prefix('admin/paginas')->middleware(['auth'])->group(function () {
    Route::get('/en', [PaginaController::class, 'editarEn'])->name('paginas.editar.en');
    Route::get('/es', [PaginaController::class, 'editarglobal'])->name('paginas.editar.es');
    Route::post('/en', [PaginaController::class, 'updateEn'])->name('contenido-ingles.update');


});
Route::get('/admin/global', [GlobalController::class, 'index'])->name('global.index');
Route::post('/admin/global/update', [GlobalController::class, 'update'])->name('global.update');


Route::get('/home-english', [PageController::class, 'showEnglish'])->name('home-english');


require __DIR__.'/auth.php';
