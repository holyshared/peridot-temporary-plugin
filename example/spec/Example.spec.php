<?php

describe('Example', function() {
    describe('#makeDirectory', function() {
        context('when not specify a permission', function() {
            beforeEach(function() {
                $this->temp = $this->makeDirectory();
            });
            it('create temporary directory', function() {
                expect($this->temp->exists())->toBeTrue();
            });
        });
        context('when there is a permission of the specified', function() {
            beforeEach(function() {
                $this->temp = $this->makeDirectory(0644);
            });
            it('create temporary directory', function() {
                expect($this->temp->exists())->toBeTrue();
            });
        });
    });
    describe('#makeFile', function() {
        context('when not specify a permission', function() {
            beforeEach(function() {
                $this->temp = $this->makeFile();
            });
            it('create temporary file', function() {
                expect($this->temp->exists())->toBeTrue();
            });
        });
        context('when there is a permission of the specified', function() {
            beforeEach(function() {
                $this->temp = $this->makeFile(0644);
            });
            it('create temporary file', function() {
                expect($this->temp->exists())->toBeTrue();
            });
        });
    });
});
