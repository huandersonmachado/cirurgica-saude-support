<?php

namespace App\Http\Controllers;

use App\Services\BlingService;
use App\Services\CorreiosService;
use Illuminate\Http\Request;

class LogisticaReversaController extends Controller
{
    private $blingService;

    private $correiosService;

    public function __construct(BlingService $blingService, CorreiosService $correiosService)
    {
        $this->blingService = $blingService;
        $this->correiosService = $correiosService;
    }

    public function index()
    {
        if (request()->query('pedido') != null) {
            $pedidosBling = $this->blingService->getPedido(request()->query('pedido'))->collect();
        } else {
            $pedidosBling = $this->blingService->getPedidos()->collect();

        }

        return view('logisticaReversa.index', compact('pedidosBling'));
    }

    public function solicitarPostagem($numero)
    {
        try {
            $cliente = $this->blingService->getPedido($numero)->collect()['retorno']['pedidos'][0]['pedido']['cliente'];
            $result = $this->correiosService->geraPostagemReversa($cliente)->toArray();
            return view('logisticaReversa.postagemGerada', compact('result'));
        } catch(\Exception $exception) {
            return view('logisticaReversa.postagemGerada', compact('exception'));
        }
    }
}
