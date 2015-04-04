<?php

use Evenement\EventEmitterInterface;
use Peridot\Reporter\Dot\DotReporterPlugin;
use cloak\peridot\CloakPlugin;
use expect\peridot\ExpectPlugin;


return function(EventEmitterInterface $emitter)
{
    ExpectPlugin::create()->registerTo($emitter);

    if (defined('HHVM_VERSION') === false) {
        CloakPlugin::create('.cloak.toml')->registerTo($emitter);
    }
    (new DotReporterPlugin($emitter));
};
