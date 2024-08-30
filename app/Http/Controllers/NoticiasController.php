<?php

namespace App\Http\Controllers;
use App\Models\Noticia;
use Illuminate\Http\Request;

class NoticiasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $noticias = Noticia::all();
        $filters = request()->only('title', 'description');
        $noticias = Noticia::filter($filters)->paginate(10)->withQueryString();
        return view('dashboard', compact('noticias'));

    }
    
    public function home()
    {
        $noticias = Noticia::all();
        return view('home', compact('noticias'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $noticias = Noticia::search($query)->get();

        return view('noticias.search-results', compact('noticias'));

    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('noticias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'arquivo' => 'required|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $noticia = Noticia::create([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
        ]);

        $noticia->storeArquivo($request->file('arquivo'));

        return redirect()->route('dashboard')->with('success', 'Notícia cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Noticia $noticia)
    {
        return view('noticias.show', compact('noticia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Noticia $noticia)
    {
        return view('noticias.edit', compact('noticia'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Noticia $noticia)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string|max:255',
            'arquivo' => 'file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $noticia->titulo = $request->titulo;
        $noticia->descricao = $request->descricao;

        if($request->file('arquivo')) {
            $noticia->storeArquivo($request->file('arquivo'));
        }

        $noticia->save();

        return redirect()->route('dashboard')->with('success', 'Notícia atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Noticia $noticia)
    {
        $noticia->delete();
        
        return redirect()->route('dashboard')->with('success', 'Notícia deletada com sucesso!');
    }

}
