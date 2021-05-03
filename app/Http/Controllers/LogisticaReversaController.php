<?php

namespace App\Http\Controllers;

use App\Services\BlingService;
use App\Services\Correios\CorreiosService;
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
            $pedidosBling = $this->blingService->getPedido(request()->query('pedido'));
        } else {
            $pedidosBling = $this->blingService->getPedidos();
        }
        return view('logisticaReversa.index', compact('pedidosBling'));
    }

    public function prePostagem()
    {
        if (request()->query('pedido') == null) {
            return redirect()->back();
        }

        return view('logisticaReversa.prePostagem');
    }

    public function solicitarPostagem($numero)
    {
        try {
            $cliente = $this->blingService->getPedido($numero);
            $result = $this->correiosService->geraPostagemReversa($cliente[0])->toArray();
            return view('logisticaReversa.postagemGerada', compact('result'));
        } catch(\Exception $exception) {
            return view('logisticaReversa.postagemGerada', compact('exception'));
        }
    }
}
