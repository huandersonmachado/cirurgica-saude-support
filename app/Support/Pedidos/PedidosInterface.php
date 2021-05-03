<?php


namespace App\Support\Pedidos;


interface PedidosInterface
{
    public function getPedidos(): array;
    public function getPedido($numero): array;
}
