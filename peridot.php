<?php

use Evenement\EventEmitterInterface;
use Peridot\Reporter\Dot\DotReporterPlugin;
use cloak\peridot\CloakPlugin;
use expectation\peridot\ExpectationPlugin;


return function(EventEmitterInterface $emitter)
{
    ExpectationPlugin::create()->registerTo($emitter);

    if (defined('HHVM_VERSION') === false) {
        CloakPlugin::create('.cloak.toml')->registerTo($emitter);
    }
    (new DotReporterPlugin($emitter));
};
