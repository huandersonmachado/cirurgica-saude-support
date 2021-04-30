<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Reversa
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(isset($result['result']))
                        <p>Número da Postagem {{ $result['result']['numero_coleta']  }}</p>
                        <p>Prazo {{ $result['result']['prazo']  }}</p>
                    @endif

                    @if(isset($result['errorMsg']))
                        <p>Erro: {{ $result['errorMsg'] }}</p>
                    @endif

                    @if(isset($exception))
                        <p>{{ $exception->getMessage()  }}</p>
                        @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
