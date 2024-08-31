<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Página de Noticias') }}
        </h2>
    </x-slot>

    <div class="container py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">
                <div class="p-6 text-gray-600  ">
                    <h1 class="font-semibold">Lançamentos</h1>
                    @if ($noticias->isEmpty())
                    <p>Não há noticias disponiveís no momento.</p>
                    @else
                    <div class="row mb-5">
                        <div class="col-sm-12 col-md-8 mx-auto">
                            <div class="br-carousel" data-circular="true" aria-label="Notícias recentes"
                                aria-roledescription="carousel">
                                <div class="carousel-button">
                                    <button class="br-button carousel-btn-prev terciary circle" type="button"
                                        aria-label="Anterior"><i class="fas fa-chevron-left" aria-hidden="true"></i>
                                    </button>
                                </div>
                                <div class="carousel-stage">
                                    <div class="carousel-page" active="active" role="group"
                                        aria-roledescription="slide" aria-live="polite">
                                        <h3> {{ $noticias[0]->titulo }} </h3>
                                        <div class="carousel-content bg-blue-10">
                                            <img src="{{ asset($noticias[0]->url) }}"
                                                alt="{{ $noticias[0]->titulo }}" />
                                        </div>

                                    </div>
                                    <div class="carousel-page" role="group" aria-roledescription="slide"
                                        aria-live="polite">
                                        <h3> {{ $noticias[1]->titulo }} </h3>
                                        <div class="carousel-content bg-violet-warm-10">
                                            <img src="{{ asset($noticias[1]->url) }}"
                                                alt="{{ $noticias[1]->titulo }}" />
                                        </div>
                                    </div>
                                    <div class="carousel-page" role="group" aria-roledescription="slide"
                                        aria-live="polite">
                                        <h3> {{ $noticias[2]->titulo }} </h3>
                                        <div class="carousel-content bg-yellow-5">
                                            <img src="{{ asset($noticias[2]->url) }}"
                                                alt="{{ $noticias[2]->titulo }}" />
                                        </div>
                                    </div>
                                    <div class="carousel-page" role="group" aria-roledescription="slide"
                                        aria-live="polite">
                                        <h3> {{ $noticias[3]->titulo }} </h3>
                                        <div class="carousel-content bg-green-cool-10">
                                            <img src="{{ asset($noticias[3]->url) }}"
                                                alt="{{ $noticias[3]->titulo }}" />
                                        </div>
                                    </div>
                                    <div class="carousel-page" role="group" aria-roledescription="slide"
                                        aria-live="polite">
                                        <h3> {{ $noticias[4]->titulo }} </h3>
                                        <div class="carousel-content bg-orange-vivid-10">
                                            <img src="{{ asset($noticias[4]->url) }}"
                                                alt="{{ $noticias[4]->titulo }}" />
                                        </div>

                                    </div>
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
                                            <button class="btn-primary" role="option" aria-posinset="1"
                                                aria-setsize="5" type="button"><span class="step-info">Exemplo de
                                                    Rótulo 1</span></button>
                                            <button class="step-progress-btn" role="option" aria-posinset="2"
                                                aria-setsize="5" type="button"><span class="step-info">Exemplo de
                                                    Rótulo 2</span></button>
                                            <button class="step-progress-btn" role="option" aria-posinset="3"
                                                aria-setsize="5" type="button"><span class="step-info">Exemplo de
                                                    Rótulo 3</span></button>
                                            <button class="step-progress-btn" role="option" aria-posinset="4"
                                                aria-setsize="5" type="button"><span class="step-info">Exemplo de
                                                    Rótulo 4</span></button>
                                            <button class="step-progress-btn" role="option" aria-posinset="5"
                                                aria-setsize="5" type="button"><span class="step-info">Exemplo de
                                                    Rótulo 5</span></button>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <h1>Produtos em destaque</h1>
                        @foreach ($noticias as $noticia)
                        <div class="col-md-4">
                            <div class="card">
                                @if ($noticia->url)
                                <img src="{{ asset($noticia->url) }}" alt="{{ $noticia->titulo }}"
                                    class="">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $noticia->titulo }}</h5>

                                    <p class="card-text">{{ $noticia->descricao }}</p>
                                    <h5 class="card-title"><strong>R$1.200,00</strong></h5>
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