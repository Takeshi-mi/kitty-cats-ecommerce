<?php

use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PdfController;
use Illuminate\Support\Facades\Route;

// Rota para a página inicial que lista os produtos
Route::get('/', [ProdutosController::class, 'home'])->name('home');

// CRUD de produtos
Route::resource('produtos', ProdutosController::class); // serve para criar, editar, deletar e listar produtos

// Rota para a página de administração do dashboard de produtos
Route::get('/dashboard', [ProdutosController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Rota para mostrar detalhes de um produto específico
Route::get('/produtos/{produto}', [ProdutosController::class, 'show'])->name('produtos.show');

// Rota para atualizar um produto específico
Route::put('/produtos/{produto}', [ProdutosController::class, 'update'])->name('produtos.update');

// Rota para pesquisa de produtos usando Algolia ou qualquer outro método
Route::get('/search', [ProdutosController::class, 'search'])->name('produtos.search');


Route::middleware('auth')->group(function () {
    // Outras rotas que precisam de autenticação
});

// Rotas para o perfil do usuário
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit'); // serve para editar o perfil
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update'); // serve para atualizar o perfil
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); // serve para deletar o perfil
    Route::resource('produtos', ProdutosController::class);
});

Route::get('/generate-pdf', [PdfController::class, 'generatepdf'])->name('relatorio');

require __DIR__.'/auth.php';
