<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    @if($produtos->count())
        <table class="table table-bordered mt-2">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço</th>
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

        <div>
            {{ $produtos->links() }}
        </div>
    @endif

</body>

</html>