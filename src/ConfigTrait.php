<?php

namespace SIM_ASN;

trait ConfigTrait
{
    /**
     * locale config.
     *
     * @var array
     */
    public $localConfig = [];

    /**
     * set configuration local
     */
    protected function configureLocal(array $localConfig = []): void
    {
        $this->localConfig = require(__DIR__.'/config.php');

        if (count($localConfig) > 0) {
            $this->localConfig = array_merge($this->localConfig, $localConfig);
        }
    }
}
