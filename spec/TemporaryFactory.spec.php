<?php

use holyshared\peridot\temporary\TemporaryFactory;


describe('TemporaryFactory', function() {
    describe('#makeDirectory', function() {
        beforeEach(function() {
            $this->factory = new TemporaryFactory();
            $this->temp = $this->factory->makeDirectory();
        });
        it('return TemporaryDirectory instance' , function () {
            expect($this->temp)->toBeAnInstanceOf('holyshared\peridot\temporary\TemporaryDirectory');
        });
    });
    describe('#makeFile', function() {
        beforeEach(function() {
            $this->factory = new TemporaryFactory();
            $this->temp = $this->factory->makeFile();
        });
        it('return TemporaryFile instance' , function () {
            expect($this->temp)->toBeAnInstanceOf('holyshared\peridot\temporary\TemporaryFile');
        });
    });
});
