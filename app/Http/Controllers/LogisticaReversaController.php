<?php

namespace App\Http\Controllers;

use App\Services\BlingService;
use Illuminate\Http\Request;

class LogisticaReversaController extends Controller
{
    private $blingService;

    public function __construct(BlingService $blingService)
    {
        $this->blingService = $blingService;
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
}
