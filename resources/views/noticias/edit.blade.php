<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criar Noticia') }}
        </h2>
    </x-slot>

    <div class="container">
        <h1>Editar Noticia</h1>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

<form action="{{ route('noticias.update', $noticia) }}" method="post" enctype="multipart/form-data">
    @csrf {{-- Adicionado para proteção contra ataques CSRF--}}
    @method('PUT')

    <div class="form-group">
        <label for="titulo">Titulo</label>
        <input type="text" class="form-control" required name="titulo" id="titulo" value="{{ $noticia->titulo}}">
    </div>
    <div class="form-group">
        <label for="descricao">Descrição</label>
        <textarea class="form-control" name="descricao" id="descricao">{{ $noticia->descricao}}</textarea>
    </div>
    <div class="form-group">
        <label for="url">Arquivo</label>
        <input type="file" class="form-control" name="arquivo" id="arquivo">
        @if ($noticia->arquivo)
        <a href="{{ asset($noticia->arquivo) }}" target="_blank">Ver arquivo atual</a>
        @endif
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
</form>
</div>
</x-app-layout>