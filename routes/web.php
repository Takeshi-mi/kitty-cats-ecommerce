<?php

use App\Http\Controllers\NoticiasController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('home');
}); */
Route::get('/', [NoticiasController::class, 'home'])->name('home'); //serve para listar as noticias
Route::resource('noticias', NoticiasController::class); //serve para criar, editar, deletar e listar noticias

Route::get('/dashboard', [NoticiasController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard'); //serve para listar as noticias
Route::get('/noticias/{noticia}', [NoticiasController::class, 'show'])->name('noticias.show'); //serve para mostrar uma noticia
Route::put('/noticias/{noticia}', [NoticiasController::class, 'update'])->name('noticias.update'); //serve para atualizar uma noticia
Route::get('/search', [NoticiasController::class, 'search'])->name('noticias.search-results'); //pesquisar notícia com algolia

/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');*/


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit'); //serve para editar o perfil
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update'); //serve para atualizar o perfil
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); //serve para deletar o perfil
});

require __DIR__.'/auth.php';
