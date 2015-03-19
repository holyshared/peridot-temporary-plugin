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

use Peridot\Core\Suite;
use Evenement\EventEmitterInterface;


/**
 * TemporaryPlugin
 * @package holyshared\peridot\temporary
 */
class TemporaryPlugin implements Registrar
{

    /**
     * @param EventEmitterInterface $emitter
     */
    public function registerTo(EventEmitterInterface $emitter)
    {
        $emitter->on(self::START_EVENT, [ $this, 'onSuiteStart' ]);
    }

    /**
     * @param Suite $suite
     */
    public function onSuiteStart(Suite $suite)
    {
        $scope = new TemporaryScope();
        $suite->getScope()->peridotAddChildScope($scope);

        $suite->addTearDownFunction(function () {
            $this->cleanUpTemporary();
        });
    }

    public static function create()
    {
        return new self();
    }

}
