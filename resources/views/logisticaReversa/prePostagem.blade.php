<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Gerar Logística Reversa
        </h2>
    </x-slot>

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form class="flex flex-col justify-center" action="{{ route('solicitarPostagem', request()->query('pedido')) }}" method="POST">
                        @csrf
                        <div class="flex flex-row justify-center space-x-10">
                            <div>
                                <x-label for="pedido" value="Número do Pedido" />
                                <x-input class="block mt-1 w-full" type="text" name="pedido" placeholder="Número do Pedido Bling" value="{{ request()->query('pedido') }}" disabled/>
                            </div>
                            <div>
                                <x-label for="sms" value="Enviar SMS" />
                                <x-select name="sms" class="block mt-1 w-full">
                                    <option value="N">Não</option>
                                    <option value="S">Sim</option>
                                </x-select>
                            </div>
                            <div>
                                <x-label for="servico" value="Serviço" />
                                <x-select name="servico" class="block mt-1 w-full">
                                    <option value="04677">PAC Reverso</option>
                                    <option value="04670">SEDEX Reverso</option>
                                </x-select>
                            </div>
                        </div>
                       <div class="flex flex-row justify-center space-x-10 mt-6">
                           <div>
                               <x-label for="tipoColeta" value="Coleta" />
                               <x-select name="tipoColeta" class="block mt-1 w-full">
                                   <option value="A">Em Agência</option>
                               </x-select>
                           </div>
                           <div>
                               <x-label for="avisoRecebimento" value="Aviso Recebimento" />
                               <x-select name="avisoRecebimento" class="block mt-1 w-full">
                                   <option value="0">Não</option>
                                   <option value="1">Sim</option>
                               </x-select>
                           </div>
                       </div>
                        <div class="flex flex-row justify-end space-x-10 mt-6">
                            <x-button>Solicitar Código Reversa</x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
