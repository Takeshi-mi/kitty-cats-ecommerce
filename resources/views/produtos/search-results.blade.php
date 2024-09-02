<div>
    <x-app-layout title="Resultados da busca">
        <div class="container mt-5 d-flex justify-content-center">
            <a href="{{ url()->previous() }}" class="br-button terciary justify-content-end"> Voltar </a>            
                <a href="{{ url()->current() }}" class="br-button secondary">Limpar Filtros</a>
         </div>
    
<h2> Query = {{ request('query')}} </h2>
        @if ($produtos->isNotEmpty())
        <div class="row">
            <h1 class="text-center"    >Resultados da busca</h1>
            @foreach ($produtos as $produto)
                <div class="col-md-4">
                    <div class="card">
                        @if ($produto->url_imagem)
                            <a href="{{ route('produtos.show', $produto->id) }}">
                                <img src="{{ asset($produto->url_imagem) }}"
                                    alt="{{ $produto->nome }}" />
                            </a>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $produto->nome }}</h5>

                            <p class="card-text">{{ $produto->descricao }}</p>
                            <h5 class="card-title"><strong>{{ $produto->preco }}</strong></h5>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex">
                                <div class="br-magic-button medium">
                                    <button class="br-button" type="button">Compre agora
                                    </button>
                                </div>
                                <div class="ml-auto">
                                    <div class="br-magic-button">
                                        <button class="br-button circle" type="button"
                                            aria-label="Adicionar"><i class="fas fa-cart-plus"
                                                aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div> <!-- row -->
        @else
            <h2>Nenhum resultado econtrado para "{{ request('query') }}"</h2>
        @endif
    </x-app-layout>
</div>
