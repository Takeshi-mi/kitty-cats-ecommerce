<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        // Obtém todos os produtos e aplica filtros de busca
        $produtos = Produto::all();
        $filters = request()->only('nome', 'descricao', 'preco_min', 'preco_max');
        $produtos = Produto::filter($filters)->paginate(10)->withQueryString();
        
        return view('home', compact('produtos'));
    }

    public function index()
    {
        $produtos = Produto::all();
        $filters = request()->only('title', 'description');
        $produtos = Produto::filter($filters)->paginate(10)->withQueryString();
        return view('dashboard', compact('produtos'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Retorna a view para criar um novo produto
        return view('produtos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Verifica autenticação
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Você precisa estar autenticado para criar um produto.');
        }
        // Valida os dados do formulário
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string',
            'preco' => 'required|numeric|min:0',
            'url_imagem' => 'nullable|file|image|mimes:jpeg,png,jpg,gif,svg|max:6144',
        ]);

        // Cria um novo produto
        $produto = Produto::create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'preco' => $request->preco,
            'criado_por' => auth()->id(), // Associa o produto ao usuário autenticado
        ]);
        $produto->storeImagem($request->file('url_imagem'));


        return redirect()->route('dashboard')->with('success', 'Produto criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        // Retorna a view para mostrar os detalhes de um produto
        return view('produtos.show', compact('produto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto)
    {
        // Retorna a view para editar um produto existente
        return view('produtos.edit', compact('produto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produto $produto)
    {
        // Valida os dados do formulário
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string',
            'preco' => 'required|numeric|min:0',
            'url_imagem' => 'nullable|file|image|mimes:jpeg,png,jpg,gif,svg|max:6144',
        ]);

        // Atualiza os dados do produto
        $produto->nome = $request->nome;
        $produto->descricao = $request->descricao;
        $produto->preco = $request->preco;
        
        if($request->file('url_imagem')){
            $produto->storeImagem($request->file('url_imagem'));
        }
        
        $produto->save();

        return redirect()->route('dashboard')->with('success', 'Produto atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {
        // Deleta o produto
        $produto->delete();
        
        return redirect()->route('dashboard')->with('success', 'Produto deletado com sucesso!');
    }

    /**
     * Search for products based on the query input.
     */
    public function search(Request $request)
    {
        // Obtém o termo de busca
        $query = $request->input('%'.'query'.'%');
        $produtos = Produto::search($query)->get();

        return view('produtos.search-results', compact('produtos'));
    }
}
