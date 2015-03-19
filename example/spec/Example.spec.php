<?php

describe('Example', function() {
    describe('#makeDirectory', function() {
        beforeEach(function() {
            $this->temp = $this->makeDirectory();
        });
        it('create temporary directory', function() {
            expect($this->temp->exists())->toBeTrue();
        });
    });
    describe('#makeFile', function() {
        context('When not specify a directory', function() {
            beforeEach(function() {
                $this->temp = $this->makeFile();
            });
            it('create temporary file', function() {
                expect($this->temp->exists())->toBeTrue();
            });
        });
        context('when there is a directory of the specified', function() {
            beforeEach(function() {
                $this->temp = $this->makeFile('foo');
            });
            it('create temporary file', function() {
                expect($this->temp->exists())->toBeTrue();
            });
        });
    });
});
