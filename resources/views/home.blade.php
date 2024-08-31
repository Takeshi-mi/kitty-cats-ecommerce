<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Página de Produtos') }}
        </h2>
    </x-slot>

    <div class="container py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-200">
                    <h1 class="font-semibold">Produtos em Destaque</h1>
                    @if ($produtos->isEmpty())
                        <p>Não há produtos disponíveis no momento.</p>
                    @else
                        <div class="row mb-5">
                            <div class="col-sm-12 col-md-8 mx-auto">
                                <div class="br-carousel" data-circular="true" aria-label="Produtos em destaque"
                                    aria-roledescription="carousel">
                                    <div class="carousel-button">
                                        <button class="br-button carousel-btn-prev terciary circle" type="button"
                                            aria-label="Anterior"><i class="fas fa-chevron-left" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                    <div class="carousel-stage">
                                        @foreach ($produtos as $produto)
                                            <div class="carousel-page" role="group"
                                                aria-roledescription="slide" aria-live="polite">
                                                <h3>{{ $produto->nome }}</h3>
                                                <div class="carousel-content bg-blue-10">
                                                    <img src="{{ $produto->url_imagem }}" alt="{{ $produto->nome }}" />
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="carousel-button">
                                        <button class="br-button carousel-btn-next terciary circle" type="button"
                                            aria-label="Próximo"><i class="fas fa-chevron-right" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                    <div class="carousel-step">
                                        <nav class="br-step" data-initial="1" data-type="simple" role="none">
                                            <div class="step-progress" role="listbox" aria-orientation="horizontal"
                                                aria-label="Lista de Opções">
                                                @foreach ($produtos as $index => $produto)
                                                    <button class="step-progress-btn" role="option" aria-posinset="{{ $index + 1 }}"
                                                        aria-setsize="{{ count($produtos) }}" type="button">
                                                        <span class="step-info">{{ $produto->nome }}</span>
                                                    </button>
                                                @endforeach
                                            </div>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <div class="row">
                        <h1>Produtos em destaque</h1>
                        @foreach ($produtos as $produto)
                        <div class="col-md-4">
                            <div class="card">
                                @if ( $produto->url_imagem )
                                <img src="{{ asset($produto->url_imagem) }}" alt="{{ $produto->nome }}" />
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
                                                <button class="br-button circle" type="button" aria-label="Adicionar"><i class="fas fa-cart-plus" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>