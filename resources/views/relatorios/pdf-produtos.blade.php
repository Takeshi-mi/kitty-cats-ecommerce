<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Levantamento de Produtos</title>
</head>

<body>
    <table class="container">
        <tr>
            <th>
                <img src="{{ public_path('img/logo-cat.png') }}" alt="Kitty Cats logo" width="100"/>
            </th>
            <td>
                <h2>Kitty Cats ID: 3285829320</h2>
            </td>
        
        </tr>
    </table>

    @if($produtos->count())
        <table class="table table-bordered mt-2">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Imagem</th>
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
                        @if($produto->url_imagem)
                        <a href="{{ $produto->url_imagem }}" target="_blank">
                            <img src="{{ $produto->url_imagem }}" alt="{{ $produto->nome }}" style="max-width: 100px;">
                        </a>
                        @else
                        Nenhuma imagem
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    @endif

</body>

</html>