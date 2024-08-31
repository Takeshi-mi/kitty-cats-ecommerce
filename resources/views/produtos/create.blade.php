<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criar Produto') }}
        </h2>
    </x-slot>

    <div class="container">
        <h1>Criar Produto</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('produtos.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome">
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <textarea class="form-control" name="descricao" id="descricao"></textarea>
            </div>

            <div class="row">
                <div class="col-2 form-group" >
                    <label class="form-label" for="preco"> Preço </label>
                    <input step="0.01" name="preco" placeholder="00,00" type="number" id="preco" class="form-control trailing" />
                </div>
                <div class="col-6">
                    <label class="mt-4 pt-3"  for="preco">R$</label>
                </div>
            </div>

            <div class="form-group">
                <label for="arquivo">Imagem</label>
                <input type="file" class="form-control" name="url_imagem" id="arquivo">
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</x-app-layout>
