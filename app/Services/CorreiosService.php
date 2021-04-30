<?php


namespace App\Services;

use PhpSigep\Bootstrap;
use PhpSigep\Config;
use PhpSigep\Model\AccessData;
use PhpSigep\Model\Destinatario;
use PhpSigep\Model\Remetente;
use PhpSigep\Model\ObjCol;
use PhpSigep\Model\ColetasSolicitadas;
use PhpSigep\Model\SolicitarPostagemReversa;
use PhpSigep\Services\SoapClient\Real;

class CorreiosService
{
    public function geraPostagemReversa($cliente)
    {

        $config = new Config();
        $accessData = new AccessData();
//        $accessData->setCartaoPostagem(env('LOGISTICA_CARTAO'));
//        $accessData->setCnpjEmpresa('LOGISTICA_CNPJ_EMPRESA');
//        $accessData->setCodAdministrativo(env('LOGISTICA_CODIG_ADM'));
//        $accessData->setNumeroContrato(env('LOGISTICA_CONTRATO'));
        $accessData->setUsuario(env('LOGISTICA_USUARIO'));
        $accessData->setSenha(env('LOGISTICA_SENHA'));

        $config->setEnv(Config::ENV_PRODUCTION);
        $config->setCacheOptions(
            array(
                'storageOptions' => array(
                    'enabled' => false,
                    'ttl' => 10,// "time to live" de 10 segundos
                    'cacheDir' => sys_get_temp_dir(), // Opcional. Quando não inforado é usado o valor retornado de "sys_get_temp_dir()"
                ),
            )

        );

        Bootstrap::start($config);


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
        $remetente->setNome($cliente['nome']);
        $remetente->setLogradouro($cliente['endereco']);
        $remetente->setNumero($cliente['numero']);
        $remetente->setComplemento($cliente['complemento']);
        $remetente->setReferencia('');
        $remetente->setCidade($cliente['cidade']);
        $remetente->setBairro($cliente['bairro']);
        $remetente->setUf($cliente['uf']);
        $remetente->setCep($this->limpaCep($cliente['cep']));

        $remetente->setEmail($cliente['email']);
        $remetente->setIdentificacao($this->limpaCep($cliente['cnpj']));
        $remetente->setSms('N');

        $objCol = new ObjCol;

        $objCol->setId(date('hms'));
        $objCol->setNum('');
        $objCol->setEntrega('');
        $objCol->setItem(1);
        $objCol->setDesc('');

        $coletasSolicitadas = new ColetasSolicitadas();
        $coletasSolicitadas->setTipo('A');
        $coletasSolicitadas->setNumero('');
        $coletasSolicitadas->setValor_declarado(null);
        $coletasSolicitadas->setServico_adicional('');
        $coletasSolicitadas->setAr(0);
        $coletasSolicitadas->setAg(10);
        $coletasSolicitadas->setRemetente($remetente);
        $coletasSolicitadas->setObj_col($objCol);

        $postagem = new SolicitarPostagemReversa();
        $postagem->setAccessData($accessData);
        $postagem->setDestinatario($destinatario);
        $postagem->setColetas_solicitadas($coletasSolicitadas);
        $postagem->setContrato(env('LOGISTICA_CONTRATO'));
        $postagem->setCodigo_servico('04677');

        $phpSigep = new Real();
        return $phpSigep->solicitarPostagemReversa($postagem);
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
