@include('layouts.navigation')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="container mt-5">
    {{-- <form method="GET" action="{{ route('noticias.index') }}" class="form-inline"> --}}
    <form method="GET" action="{{ route('noticias.search-results') }}" class="form-inline">

        <div class="br-form-group mb-2">
            <label for="query" class="sr-only">Buscar</label>
            <input type="text" name="query" id="description" class="form-control form-control-sm form-control-custom mr-2" placeholder="Descrição" value="{{ request('description') }}">
        </div>
        <button type="submit" class="br-button primary">Filtrar</button>
        <a href="{{ route('noticias.index') }}" class="br-button secondary">Limpar Filtros</a>
    </form>
    </div>


    <div class="container">
        <h1>Noticias</h1>
        <a href="{{ route('noticias.create') }}" class="br-button primary">Criar Noticia</a>
        @if ($message = Session::get('success'))
            <div class="alert alert-success mt-2">
                <p>{{ $message }}</p>
            </div>
        @endif

        @if($noticias->count())
        <table class="table table-bordered mt-2">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Descrição</th>
                    <th>URL</th>
                    <th>Ações</th>
                </tr>
            </thead>
                @foreach ($noticias as $noticia)
                    <tr>
                            <td>{{ $noticia->id }}</td>
                            <td>{{ $noticia->titulo }}</td>
                            <td>{{ $noticia->descricao }}</td>
                            <td><a href="{{ $noticia->url }}" target="_blank">{{ $noticia->url }}</a></td>
                            <td>
                                <form action="{{ route('noticias.destroy', $noticia->id) }}" method="post">
                                    <div class="p-3 flex"></div>
                                    <a class="br-button circle secondary m-2" href="{{ route('noticias.show', $noticia->id) }}"><i class="fas fa-eye"></i></a>
                                    <a class="br-button circle secondary m-2" href="{{ route('noticias.edit', $noticia->id) }}"><i class="fas fa-edit"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="br-button circle secondary m-2"><i class="fas fa-spin fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                @endforeach
        </table>

            <div>
            {{ $noticias->links() }}
            </div>

        @else
            <p>Nenhuma noticia cadastrada</p>
        @endif
</x-app-layout>
