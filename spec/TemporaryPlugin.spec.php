<?php

use holyshared\peridot\temporary\TemporaryPlugin;
use Peridot\Core\Suite;
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
    describe('#onSuiteStart', function() {
        beforeEach(function() {
            $this->suite = new Suite('Plugin', function() {});

            $this->plugin = new TemporaryPlugin();
            $this->plugin->onSuiteStart($this->suite);
        });
        it('add scope', function() {
            $scope = $this->suite->getScope();
            $childScopes = $scope->peridotGetChildScopes();
            expect($childScopes)->toHaveLength(1);
        });
        it('add teardown function', function() {
            $callbacks = $this->suite->getTearDownFunctions();
            expect($callbacks)->toHaveLength(1);
        });
    });
});
