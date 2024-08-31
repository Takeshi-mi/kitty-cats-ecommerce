@include('layouts.navigation')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard de Produtos') }}
        </h2>
    </x-slot>

    <div class="container mt-5">
        <form method="GET" action="{{ route('produtos.search') }}" class="form-inline">
            <div class="br-form-group mb-2">
                <label for="query" class="sr-only">Buscar</label>
                <input type="text" name="query" id="query" class="form-control form-control-sm form-control-custom mr-2" placeholder="Nome ou Descrição" value="{{ request('query') }}">
            </div>
            <button type="submit" class="br-button primary">Filtrar</button>
            <a href="{{ route('dashboard') }}" class="br-button secondary">Limpar Filtros</a>
        </form>
    </div>

    <div class="container">
        <h1>Produtos</h1>
        <a href="{{ route('produtos.create') }}" class="br-button primary">Criar Produto</a>
        @if ($message = Session::get('success'))
            <div class="alert alert-success mt-2">
                <p>{{ $message }}</p>
            </div>
        @endif

        @if($produtos->count())
        <table class="table table-bordered mt-2">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Categoria</th>
                    <th>Imagem</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produtos as $produto)
                    <tr>
                        <td>{{ $produto->id }}</td>
                        <td>{{ $produto->nome }}</td>
                        <td>{{ $produto->descricao }}</td>
                        <td>{{ $produto->preco }}</td>
                        <td> 
                            <div class="d-flex align-items-center"><span class="br-tag bg-mint-cool-vivid-70" aria-describedby="tag-text01"><i class="fas fa-tag" aria-hidden="true"></i><span id="tag-text01">  {{ $produto->categoria->nome }}  </span></span>
                            
                        </div>
                        </td>
                        <td>
                            @if($produto->url_imagem)
                                <a href="{{ $produto->url_imagem }}" target="_blank">
                                    <img src="{{ $produto->url_imagem }}" alt="{{ $produto->nome }}" style="max-width: 100px;">
                                </a>
                            @else
                                Nenhuma imagem
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('produtos.destroy', $produto->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <a class="br-button circle secondary m-2" href="{{ route('produtos.show', $produto->id) }}"><i class="fas fa-eye"></i></a>
                                <a class="br-button circle secondary m-2" href="{{ route('produtos.edit', $produto->id) }}"><i class="fas fa-edit"></i></a>
                                <button type="submit" class="br-button circle secondary m-2"><i class="fas fa-spin fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div>
            {{ $produtos->links() }}
        </div>

        @else
            <p>Nenhum produto cadastrado</p>
        @endif
    </div>
</x-app-layout>
