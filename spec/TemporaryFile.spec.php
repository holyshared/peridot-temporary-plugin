<?php

use holyshared\peridot\temporary\TemporaryFile;

describe('TemporaryFile', function() {
    beforeEach(function() {
        $this->temp = new TemporaryFile();
    });
    describe('#getPath', function() {
        it('return path' , function () {
            expect($this->temp->getPath())->not()->toBeNull();
        });
    });
    describe('#chmod', function() {
        context('when 0755', function() {
            beforeEach(function() {
                $this->temp = new TemporaryFile();
                $this->temp->chmod(0755);
            });
            it('change the permission to 0755' , function () {
                expect($this->temp->isWritable())->toBeTrue();
                expect($this->temp->getPermission())->toBe(0755);
            });
        });
        context('when 0444', function() {
            beforeEach(function() {
                $this->temp = new TemporaryFile();
                $this->temp->chmod(0444);
            });
            it('change the permission to 0444' , function () {
                expect($this->temp->isWritable())->toBeFalse();
                expect($this->temp->getPermission())->toBe(0444);
            });
        });
    });
    describe('#remove', function() {
        beforeEach(function() {
            $this->temp = new TemporaryFile();
        });
        it('remove file' , function () {
            $this->temp->remove();
            expect($this->temp->exists())->toBeFalse();
        });
    });
});
