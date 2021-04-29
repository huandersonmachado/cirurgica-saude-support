<?php


namespace App\Services;

use Illuminate\Support\Facades\Http;

class BlingService
{
    public function getPedidos()
    {
        return Http::get('https://bling.com.br/Api/v2/pedidos/json/&filters=dataEmissao[01/04/2021 TO 30/04/2021]; idSituacao[9]?apikey='. env('BLING_API_KEY'));
    }
}
