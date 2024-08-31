<?php

use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarrinhoController;

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

// Exibe o carrinho de compras
Route::get('/carrinho', [CarrinhoController::class, 'index'])->name('carrinho.index');

// Adiciona um produto ao carrinho
Route::post('/carrinho/comprar/{id}', [CarrinhoController::class, 'comprar'])->name('carrinho.comprar');

// Adiciona um produto ao carrinho
Route::post('/carrinho/adicionar/{id}', [CarrinhoController::class, 'adicionar'])->name('carrinho.adicionar');

// Atualiza a quantidade de um produto no carrinho
Route::put('/carrinho/atualizar/{id}', [CarrinhoController::class, 'atualizar'])->name('carrinho.atualizar');

// Remove um produto do carrinho
Route::delete('/carrinho/remover/{id}', [CarrinhoController::class, 'remover'])->name('carrinho.remover');

// Limpa o carrinho
Route::delete('/limpar', [CarrinhoController::class, 'limpar'])->name('carrinho.limpar');

// Redireciona para a tela de pagamento
Route::get('/pagamento', [CarrinhoController::class, 'pagamento'])->name('pagamento');





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

require __DIR__.'/auth.php';
