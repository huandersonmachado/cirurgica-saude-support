<?php

namespace App\Services\Correios;

use PhpSigep\Model\AccessData as AccessDataSigep;

class AccessData
{
    /**
     * @var AccessDataSigep
     */
    private $accessData;

    /**
     * AccessData constructor.
     */
    public function __construct()
    {
        $this->accessData = new AccessDataSigep();
        $this->accessData->setCartaoPostagem(env('LOGISTICA_CARTAO'));
        $this->accessData->setCnpjEmpresa('LOGISTICA_CNPJ_EMPRESA');
        $this->accessData->setCodAdministrativo(env('LOGISTICA_CODIG_ADM'));
        $this->accessData->setNumeroContrato(env('LOGISTICA_CONTRATO'));
        $this->accessData->setUsuario(env('LOGISTICA_USUARIO'));
        $this->accessData->setSenha(env('LOGISTICA_SENHA'));
        $this->accessData->setIdCorreiosUsuario(env('LOGISTICA_USUARIO'));
        $this->accessData->setIdCorreiosSenha(env('LOGISTICA_SENHA'));
    }

    public function getAcessData()
    {
        return $this->accessData;
    }
}
