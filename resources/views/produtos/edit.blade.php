<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Produto') }}
        </h2>
    </x-slot>

    <div class="container">
        <h1>Editar Produto</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('produtos.update', $produto->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')  <!-- Método PUT para atualizar o produto -->

            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome" value="{{ $produto->nome }}">
            </div>

            <div class="form-group">
                <label for="descricao">Descrição</label>
                <textarea class="form-control" name="descricao" id="descricao">{{ $produto->descricao }}</textarea>
            </div>

            <div class="row">
                <div class="col-2 form-group" >
                    <label class="form-label" for="preco"> Preço </label>
                    <input step="0.01" name="preco" type="number" id="preco" class="form-control" value="{{ $produto->preco }}" />
                </div>
                <div class="col-6">
                    <label class="mt-4 pt-3" for="preco">R$</label>
                </div>
            </div>

            <div class="form-group">
                <label for="url_imagem">Imagem Atual</label>
                @if($produto->url_imagem)
                    <div>
                        <img src="{{ asset($produto->url_imagem) }}" alt="{{ $produto->nome }}" style="max-width: 200px;">
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="url_imagem">Alterar Imagem (opcional)</label>
                <input type="file" class="form-control" name="url_imagem" id="url_imagem">
            </div>

            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>
</x-app-layout>
