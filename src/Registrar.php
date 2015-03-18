<?php

namespace holyshared\peridot\temporary;

use Evenement\EventEmitterInterface;

/**
 * Interface RegistrarInterface
 * @package holyshared\peridot\temporary
 */
interface Registrar
{

    const START_EVENT = 'suite.start';

    /**
     * @param EventEmitterInterface $emitter
     */
    public function registerTo(EventEmitterInterface $emitter);

}
