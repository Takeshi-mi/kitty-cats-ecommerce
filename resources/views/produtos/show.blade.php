<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Produtos') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4">
        <div class="py-8">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                        <div class="text-2xl">
                            {{ $produto->nome }}
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="br-tag bg-mint-cool-vivid-70" aria-describedby="tag-text01">
                                <i class="fas fa-tag" aria-hidden="true"></i>
                                <span id="tag-text01"> {{ $produto->categoria->nome }}
                                </span>
                            </span>
                        </div>

                        <div class="mt-4 text-gray-500">
                            {{ $produto->descricao }}
                        </div>
                        <div class="mt-4 text-gray-500">
                            R${{ $produto->preco }}
                        </div>      
                        <div class="img-fluid">
                            @if ($produto->url_imagem)
                                <img src="{{ asset($produto->url_imagem) }}" alt="{{ $produto->nome }}"
                                    class="max-w-full h-auto">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
