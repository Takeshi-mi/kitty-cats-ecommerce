<div>
    <x-app-layout title="Resultados da busca">
        @if ($produtos->isNotEmpty())
            <h2>Resultados da busca para "{{ request('query') }}"</h2>
            @foreach ($produtos as $produto)
                <div>
                    <h3> {{ $produto->nome }} </h3>
                    <p>{{ $produto->descricao }}</p>
                    <p>{{ $produto->preco}}</p>
                </div>
            @endforeach
        @else
            <h2>Nenhum resultado econtrado para "{{ request('query') }}"</h2>
        @endif
    </x-app-layout>
</div>
