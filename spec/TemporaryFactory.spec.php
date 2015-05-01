<?php

use holyshared\peridot\temporary\TemporaryFactory;
use holyshared\peridot\temporary\TemporaryDirectory;
use holyshared\peridot\temporary\TemporaryFile;

describe(TemporaryFactory::class, function() {
    describe('#makeDirectory', function() {
        beforeEach(function() {
            $this->factory = new TemporaryFactory();
            $this->temp = $this->factory->makeDirectory();
        });
        it('return TemporaryDirectory instance' , function () {
            expect($this->temp)->toBeAnInstanceOf(TemporaryDirectory::class);
        });
    });
    describe('#makeFile', function() {
        beforeEach(function() {
            $this->factory = new TemporaryFactory();
            $this->temp = $this->factory->makeFile();
        });
        it('return TemporaryFile instance' , function () {
            expect($this->temp)->toBeAnInstanceOf(TemporaryFile::class);
        });
    });
});
