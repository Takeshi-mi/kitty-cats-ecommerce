<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Página de Produtos') }}
        </h2>
    </x-slot>
    <div class="container-fluid mx-auto" style="background-color: #F2F0F1;">
        <div class="text-center">
            <img src="/img/banner doro e maguito.svg" alt="Banner de gato" class="w-full" />
        </div>
    </div>
    <script type="module" src="https://unpkg.com/@splinetool/viewer@1.9.21/build/spline-viewer.js"></script>
    <spline-viewer url="https://prod.spline.design/0IxzASzf9BGDQJFc/scene.splinecode"></spline-viewer>
    
    <div class="container py-12">
        000<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            111<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                222 <div class="p-6 text-gray-900 dark:text-gray-200">
                    333 <h1 id="produtos" class="font-semibold">Miau dia!</h1>
                    <h5>A vida é melhor com um gatinho ao lado.</h5>
                    <div class="row mb-5">
                        <div class="col-sm-12 col-md-8 mx-auto">
                            <div class="br-carousel" data-circular="true" aria-label="Notícias recentes"
                                aria-roledescription="carousel">
                                <div class="carousel-button">
                                    <button class="br-button carousel-btn-prev terciary circle" type="button"
                                        aria-label="Anterior"><i class="fas fa-chevron-left" aria-hidden="true"></i>
                                    </button>
                                </div>
                                @if ($produtos->isEmpty())
                                <p>Não há produtos disponiveís no momento.</p>
                            @else
                                <div class="carousel-stage">
                                    <div class="carousel-page" active="active" role="group"
                                        aria-roledescription="slide" aria-live="polite">
                                        <div class="carousel-content bg-blue-10">
                                            <img src="{{ asset('/img/cats/cat-with-a-computer-.jpeg') }}"
                                                alt="cat with a computer" />
                                        </div>

                                    </div>
                                    <div class="carousel-page" role="group" aria-roledescription="slide"
                                        aria-live="polite">
                                        <h3> São as coisas mais fofas</h3>
                                        <div class="carousel-content bg-violet-warm-10">
                                            <img src="{{ asset('/img/cats/saracats2/WhatsApp Image 2024-09-01 at 12.17.52 (2).jpeg') }}"
                                                alt="gato" width="50%"  style="transform: rotate(90deg);" />
                                        </div>
                                    </div>
                                    <div class="carousel-page" role="group" aria-roledescription="slide"
                                        aria-live="polite">
                                        <h3> {{ __('Nos fazem derreter de amores') }} </h3>
                                        <div class="carousel-content bg-yellow-5">
                                            <img src="{{ asset('/img/cats/doro-mey.jpg') }}"
                                                alt="{{ __('gato') }}" width="500px" alt="Primeira imagem" style="transform: rotate(90deg); max-height: 500px;"/>
                                        </div>
                                    </div>
                                    <div class="carousel-page" role="group" aria-roledescription="slide"
                                        aria-live="polite">
                                        <div class="carousel-content bg-green-cool-10">
                                            <img src="{{ asset('/img/cat.svg') }}" />
                                        </div>
                                    </div>
                                    <div class="carousel-page" role="group" aria-roledescription="slide"
                                        aria-live="polite">
                                        <h3>  </h3>
                                        <div class="carousel-content bg-orange-vivid-10">
                                                <h1> oi </h1>                                            
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
                        <h1 id="em-destaque">Produtos em destaque</h1>
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
                    @endif
                </div>
            </div>
        </div>
    </div> <!-- container -->
    <script type="module" src="https://unpkg.com/@splinetool/viewer@1.9.21/build/spline-viewer.js"></script>
    <spline-viewer url="https://prod.spline.design/CHbrea8qNsetyDcb/scene.splinecode"></spline-viewer>
    <div class="container" id="categorias">
        <div class="img-fluid">
            <img src="/img/categorias-frame.svg" alt="banner de categoria" />
        </div>
</x-app-layout>
