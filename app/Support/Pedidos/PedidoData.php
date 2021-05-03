<?php


namespace App\Support\Pedidos;


class PedidoData
{
    private $nome;
    private $cnpj;
    private $valorTotalVenda;
    private $numeroPedido;
    private $numeroPedidoLojaVirtual;
    private $tipoIntegracao;
    private $rua;
    private $numero;
    private $cidade;
    private $cep;
    private $uf;
    private $numeroNota;
    private $email;
    private $dataPedido;
    private $complemento;
    private $bairro;

    /**
     * @return mixed
     */
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * @param mixed $bairro
     * @return PedidoData
     */
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getComplemento()
    {
        return $this->complemento;
    }

    /**
     * @param mixed $complemento
     * @return PedidoData
     */
    public function setComplemento($complemento)
    {
        $this->complemento = $complemento;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDataPedido()
    {
        return $this->dataPedido;
    }

    /**
     * @param mixed $dataPedido
     * @return PedidoData
     */
    public function setDataPedido($dataPedido)
    {
        $this->dataPedido = $dataPedido;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     * @return PedidoData
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCnpj()
    {
        return $this->cnpj;
    }

    /**
     * @param mixed $cnpj
     * @return PedidoData
     */
    public function setCnpj($cnpj)
    {
        $this->cnpj = $cnpj;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getValorTotalVenda()
    {
        return $this->valorTotalVenda;
    }

    /**
     * @param mixed $valorTotalVenda
     * @return PedidoData
     */
    public function setValorTotalVenda($valorTotalVenda)
    {
        $this->valorTotalVenda = $valorTotalVenda;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNumeroPedido()
    {
        return $this->numeroPedido;
    }

    /**
     * @param mixed $numeroPedido
     * @return PedidoData
     */
    public function setNumeroPedido($numeroPedido)
    {
        $this->numeroPedido = $numeroPedido;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNumeroPedidoLojaVirtual()
    {
        return $this->numeroPedidoLojaVirtual;
    }

    /**
     * @param mixed $numeroPedidoLojaVirtual
     * @return PedidoData
     */
    public function setNumeroPedidoLojaVirtual($numeroPedidoLojaVirtual)
    {
        $this->numeroPedidoLojaVirtual = $numeroPedidoLojaVirtual;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTipoIntegracao()
    {
        return $this->tipoIntegracao;
    }

    /**
     * @param mixed $tipoIntegracao
     * @return PedidoData
     */
    public function setTipoIntegracao($tipoIntegracao)
    {
        $this->tipoIntegracao = $tipoIntegracao;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRua()
    {
        return $this->rua;
    }

    /**
     * @param mixed $rua
     * @return PedidoData
     */
    public function setRua($rua)
    {
        $this->rua = $rua;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param mixed $numero
     * @return PedidoData
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * @param mixed $cidade
     * @return PedidoData
     */
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * @param mixed $cep
     * @return PedidoData
     */
    public function setCep($cep)
    {
        $this->cep = $cep;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUf()
    {
        return $this->uf;
    }

    /**
     * @param mixed $uf
     * @return PedidoData
     */
    public function setUf($uf)
    {
        $this->uf = $uf;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNumeroNota()
    {
        return $this->numeroNota;
    }

    /**
     * @param mixed $numeroNota
     * @return PedidoData
     */
    public function setNumeroNota($numeroNota)
    {
        $this->numeroNota = $numeroNota;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     * @return PedidoData
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

}
