<?php

use holyshared\peridot\temporary\TemporaryPlugin;
use Prophecy\Prophet;
use Prophecy\Argument;


describe('TemporaryPlugin', function() {
    describe('#registerTo', function() {
        beforeEach(function() {
            $this->prophet = new Prophet();

            $emitter = $this->prophet->prophesize('\Evenement\EventEmitterInterface');
            $emitter->on(TemporaryPlugin::START_EVENT, Argument::type('array'))
                ->shouldBeCalled();

            $this->emitter = $emitter->reveal();
            $this->plugin = new TemporaryPlugin();
        });
        it('register plugin', function() {
            $this->plugin->registerTo($this->emitter);
            $this->prophet->checkPredictions();
        });
    });
});
