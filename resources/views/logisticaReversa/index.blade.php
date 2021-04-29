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
                            <th>Data Do Pedido</th>
                            <th>Número Loja Virtual</th>
                            <th>Número No Bling</th>
                            <th>Cliente</th>
                            <th>CPF</th>
                            <th>Nota Fiscal</th>
                            <th>Total da Compra</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($pedidosBling['retorno']['pedidos'] as $pedido)
                            <tr class={{ ($loop->index%2 == 0) ? 'bg-gray-100' : ''  }}>
                                <td class="text-center">{{ $pedido['pedido']['data']  }}</td>
                                <td class="text-center">{{ isset($pedido['pedido']['numeroPedidoLoja']) ?  $pedido['pedido']['numeroPedidoLoja'] : '' }}</td>
                                <td class="text-center">{{ $pedido['pedido']['numero']  }}</td>
                                <td class="text-center">{{ $pedido['pedido']['cliente']['nome']  }}</td>
                                <td class="text-center">{{ $pedido['pedido']['cliente']['cnpj']  }}</td>
                                <td class="text-center">{{ $pedido['pedido']['nota']['numero']  }}</td>
                                <td class="text-center">R${{ $pedido['pedido']['totalvenda']  }}</td>
                                <td class="text-center">
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        Gerar Reversa
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                Nenhum Pedido Encontrado
                            </tr>
                        @endforelse

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
