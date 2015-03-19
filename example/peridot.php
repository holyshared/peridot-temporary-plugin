<?php

use Evenement\EventEmitterInterface;
use Peridot\Reporter\Dot\DotReporterPlugin;
use cloak\peridot\CloakPlugin;
use expectation\peridot\ExpectationPlugin;
use holyshared\peridot\temporary\TemporaryPlugin;


return function(EventEmitterInterface $emitter)
{
    ExpectationPlugin::create()->registerTo($emitter);

    $plugin = new TemporaryPlugin();
    $plugin->registerTo($emitter);

    (new DotReporterPlugin($emitter));
};
