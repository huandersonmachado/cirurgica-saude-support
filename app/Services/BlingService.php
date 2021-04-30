<?php


namespace App\Services;

use Illuminate\Support\Facades\Http;

class BlingService
{
    /**
     * @var \Illuminate\Cache\CacheManager
     */
    private $cache;

    public function __construct()
    {
        $this->cache = app('cache');
    }

    public function getPedidos()
    {
        return Http::get('https://bling.com.br/Api/v2/pedidos/json/&filters=dataEmissao[01/04/2021 TO 30/04/2021]; idSituacao[9]?apikey='. env('BLING_API_KEY'));
    }

    public function getPedido($numero)
    {
        $seconds = 60 * 30;
        return $this->cache->remember('pedido_'.$numero, $seconds, function() use ($numero) {
            return Http::get('https://bling.com.br/Api/v2/pedido/' . $numero . '/json/&apikey='. env('BLING_API_KEY'));
        });
    }
}
