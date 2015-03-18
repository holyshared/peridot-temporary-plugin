<?php

use holyshared\peridot\temporary\TemporaryContainer;
use holyshared\peridot\temporary\TemporaryFactory;


describe('TemporaryFactory', function() {
    describe('#makeDirectory', function() {
        beforeEach(function() {
            $this->container = new TemporaryContainer();
            $this->factory = new TemporaryFactory($this->container);

            $this->temp = $this->factory->makeDirectory('foo');
        });
        it('return TemporaryDirectory instance' , function () {
            expect($this->temp)->toBeAnInstanceOf('holyshared\peridot\temporary\TemporaryDirectory');
        });
        it('register to container' , function () {
            expect($this->container)->toHaveLength(1);
        });
    });
    describe('#makeFile', function() {
        beforeEach(function() {
            $this->container = new TemporaryContainer();
            $this->factory = new TemporaryFactory($this->container);

            $this->temp = $this->factory->makeFile('foo');
        });
        it('return TemporaryFile instance' , function () {
            expect($this->temp)->toBeAnInstanceOf('holyshared\peridot\temporary\TemporaryFile');
        });
        it('register to container' , function () {
            expect($this->container)->toHaveLength(1);
        });
    });
});
