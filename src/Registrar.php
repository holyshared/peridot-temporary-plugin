<?php

/**
 * This file is part of peridot-temporary-plugin.
 *
 * (c) Noritaka Horio <holy.shared.design@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

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
