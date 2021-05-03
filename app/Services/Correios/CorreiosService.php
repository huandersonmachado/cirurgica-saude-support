<?php


namespace App\Services\Correios;

use App\Support\Pedidos\PedidoData;
use PhpSigep\Bootstrap;
use PhpSigep\Model\Destinatario;
use PhpSigep\Model\Remetente;
use PhpSigep\Model\ObjCol;
use PhpSigep\Model\ColetasSolicitadas;
use PhpSigep\Model\SolicitarPostagemReversa;
use PhpSigep\Services\SoapClient\Real;

class CorreiosService
{
    private $config;

    private $accessData;

    public function __construct(Config $config, AccessData $accessData)
    {
        $this->config = $config;
        $this->accessData = $accessData;
    }

    public function geraPostagemReversa(PedidoData $cliente)
    {
        try {
            Bootstrap::start($this->config->getConfig());

            $destinatario = new Destinatario();
            $destinatario->setNome('Cirúrgica Saúde Online');
            $destinatario->setLogradouro('Rua Frederico Dolabela');
            $destinatario->setNumero('606');
            $destinatario->setComplemento('');
            $destinatario->setReferencia('');
            $destinatario->setCidade('Manhuaçu');
            $destinatario->setUf('MG');
            $destinatario->setCep('36900025');
            $destinatario->setBairro('Centro');
            $destinatario->setEmail('huandersonmachado@gmail.com');

            $remetente = new Remetente();
            $remetente->setNome($cliente->getNome());
            $remetente->setLogradouro($cliente->getRua());
            $remetente->setNumero($cliente->getNumero());
            $remetente->setComplemento($cliente->getComplemento());
            $remetente->setReferencia('');
            $remetente->setCidade($cliente->getCidade());
            $remetente->setBairro($cliente->getBairro());
            $remetente->setUf($cliente->getUf());
            $remetente->setCep($this->limpaCep($cliente->getCep()));

            $remetente->setEmail($cliente->getEmail());
            $remetente->setIdentificacao($this->limpaCep($cliente->getCnpj()));
            $remetente->setSms(request('sms'));

            $objCol = new ObjCol;

            $objCol->setId(date('hms'));
            $objCol->setNum('');
            $objCol->setEntrega('');
            $objCol->setItem(1);
            $objCol->setDesc('');

            $coletasSolicitadas = new ColetasSolicitadas();
            $coletasSolicitadas->setTipo(request('tipoColeta'));
            $coletasSolicitadas->setNumero('');
            $coletasSolicitadas->setValor_declarado(null);
            $coletasSolicitadas->setServico_adicional('');
            $coletasSolicitadas->setAr((int)request('avisoRecebimento'));
            $coletasSolicitadas->setAg(10);
            $coletasSolicitadas->setRemetente($remetente);
            $coletasSolicitadas->setObj_col($objCol);

            $postagem = new SolicitarPostagemReversa();
            $postagem->setAccessData($this->accessData->getAcessData());
            $postagem->setDestinatario($destinatario);
            $postagem->setColetas_solicitadas($coletasSolicitadas);
            $postagem->setContrato(env('LOGISTICA_CONTRATO'));
            $postagem->setCodigo_servico(request('servico'));

            $phpSigep = new Real();
            return $phpSigep->solicitarPostagemReversa($postagem);
        } catch (\Exception $exception) {
            return "Erro";
        }
    }

    private function limpaCep($valor)
    {
        $valor = trim($valor);
        $valor = str_replace(".", "", $valor);
        $valor = str_replace(",", "", $valor);
        $valor = str_replace("-", "", $valor);
        $valor = str_replace("/", "", $valor);
        return $valor;
    }
}
