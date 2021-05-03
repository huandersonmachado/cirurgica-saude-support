<?php

namespace App\Services\Correios;

 use PhpSigep\Config as ConfigSigep;

class Config
{
    /**
     * @var Config
     */
    private $config;

    public function __construct(ConfigSigep $config, AccessData $accessData)
    {
        $this->config = $config;
        $this->config->setAccessData($accessData->getAcessData());
        $this->config->setEnv(ConfigSigep::ENV_PRODUCTION, 1);
        $this->config->setCacheOptions(
            array(
                'storageOptions' => array(
                    'enabled' => false,
                    'ttl' => 50,
                    'cacheDir' => sys_get_temp_dir(),
                ),
            )

        );
    }

    public function getConfig()
    {
        return $this->config;
    }
}
