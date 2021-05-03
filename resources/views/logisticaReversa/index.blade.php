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
                            @forelse($pedidosBling as $pedido)
                                <tr class="{{ ($loop->index%2 == 0) ? 'bg-gray-100' : ''  }} text-sm">
                                    <td class="text-center">{{ $pedido->getDataPedido()  }}</td>
                                    <td class="text-center">{{ $pedido->getNumeroPedidoLojaVirtual() }}</td>
                                    <td class="text-center">{{ $pedido->getNumeroPedido()  }}</td>
                                    <td class="text-center">{{ $pedido->getNome()  }}</td>
                                    <td class="text-center">{{ $pedido->getCnpj()  }}</td>
                                    <td class="text-center">{{ $pedido->getNumeroNota()  }}</td>
                                    <td class="text-center">R${{ $pedido->getValorTotalVenda()  }}</td>
                                    <td class="text-center">
                                        <a class="inline-flex items-center px-4 py-2 bg-green-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" href="/prePostagem?pedido={{request()->query('pedido')}}">Gerar Reversa</a>
{{--                                        <form method="POST" action="{{ route('solicitarPostagem', $pedido->getNumeroPedido()) }}">--}}
{{--                                            @csrf--}}
{{--                                            <button--}}
{{--                                                onclick="event.preventDefault();--}}
{{--                                                    this.closest('form').submit();"--}}
{{--                                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">--}}
{{--                                                Gerar Reversa--}}
{{--                                            </button>--}}
{{--                                        </form>--}}

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
