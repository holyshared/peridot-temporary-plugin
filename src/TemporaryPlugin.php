<?php

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
