<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Logística Reversa
        </h2>
    </x-slot>

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form class="flex justify-center" action="/logisticaReversa" method="get">
                        <x-input class="block mt-1 w-3/4" type="text" name="pedido" placeholder="Número do Pedido Bling" required autofocus />
                        <x-button class="ml-3">Buscar</x-button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table-auto">
                        <thead>
                        <tr>
                            <th class="w-1/4">Data Do Pedido</th>
                            <th class="w-1/4">Número Loja Virtual</th>
                            <th class="w-1/4">Número No Bling</th>
                            <th class="px-10">Cliente</th>
                            <th class="px-10">CPF</th>
                            <th class="w-1/4">Nota Fiscal</th>
                            <th class="px-9">Total da Compra</th>
                            <th class="px-9">Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(array_key_exists('pedidos', $pedidosBling['retorno']))
                            @forelse($pedidosBling['retorno']['pedidos'] as $pedido)
                                <tr class="{{ ($loop->index%2 == 0) ? 'bg-gray-100' : ''  }} text-sm">
                                    <td class="text-center">{{ $pedido['pedido']['data']  }}</td>
                                    <td class="text-center">{{ isset($pedido['pedido']['numeroPedidoLoja']) ?  $pedido['pedido']['numeroPedidoLoja'] : '' }}</td>
                                    <td class="text-center">{{ $pedido['pedido']['numero']  }}</td>
                                    <td class="text-center">{{ $pedido['pedido']['cliente']['nome']  }}</td>
                                    <td class="text-center">{{ $pedido['pedido']['cliente']['cnpj']  }}</td>
                                    <td class="text-center">{{ $pedido['pedido']['nota']['numero'] ?? ''  }}</td>
                                    <td class="text-center">R${{ $pedido['pedido']['totalvenda']  }}</td>
                                    <td class="text-center">
                                        <form method="POST" action="{{ route('solicitarPostagem', $pedido['pedido']['numero']) }}">
                                            @csrf
                                            <button
                                                onclick="event.preventDefault();
                                                    this.closest('form').submit();"
                                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                Gerar Reversa
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    Nenhum Pedido Encontrado
                                </tr>
                            @endforelse
                        @else
                            <tr>
                                Nenhum Pedido Encontrado
                            </tr>
                        @endif

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
