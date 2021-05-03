<?php


namespace App\Services;

use App\Support\Pedidos\PedidoData;
use App\Support\Pedidos\PedidosInterface;
use Illuminate\Support\Facades\Http;

class BlingService implements PedidosInterface
{

    public function getPedidos(): array
    {
        $response = Http::get('https://bling.com.br/Api/v2/pedidos/json/&filters=dataEmissao[01/04/2021 TO 30/04/2021]; idSituacao[9]?apikey='. env('BLING_API_KEY'));

        return array_map(function($pedido) {
            return $this->setPedidoData($pedido['pedido']);
        },$response->collect()['retorno']['pedidos']);
    }

    public function getPedido($numero): array
    {
        $response = Http::get('https://bling.com.br/Api/v2/pedido/' . $numero . '/json/&apikey='. env('BLING_API_KEY'));
        return [$this->setPedidoData($response->collect()['retorno']['pedidos'][0]['pedido'])];
    }

    private function setPedidoData($pedido)
    {
        $pedidoData = new PedidoData();

        $pedidoData->setNome($pedido['cliente']['nome'])
            ->setCnpj($pedido['cliente']['cnpj'])
            ->setRua($pedido['cliente']['endereco'])
            ->setNumero($pedido['cliente']['numero'])
            ->setCidade($pedido['cliente']['cidade'])
            ->setUf($pedido['cliente']['uf'])
            ->setCep($pedido['cliente']['cep'])
            ->setNumeroPedido($pedido['numero'])
            ->setNumeroPedidoLojaVirtual($pedido['numeroPedidoLoja'] ?? '')
            ->setTipoIntegracao($pedido['tipoIntegracao'] ?? '')
            ->setValorTotalVenda($pedido['totalvenda'])
            ->setNumeroNota($pedido['nota']['numero'] ?? '')
            ->setDataPedido($pedido['data'])
            ->setComplemento($pedido['cliente']['complemento'])
            ->setBairro($pedido['cliente']['bairro'])
            ->setEmail($pedido['cliente']['email']);

        return $pedidoData;
    }
}
