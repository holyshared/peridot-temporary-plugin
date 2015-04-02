<?php

use holyshared\peridot\temporary\TemporaryFile;

describe('TemporaryFile', function() {
    beforeEach(function() {
        $this->rootDirectory = sys_get_temp_dir();
        $this->temp = new TemporaryFile($this->rootDirectory . '/foo');
    });
    describe('#getPath', function() {
        it('return path' , function () {
            expect($this->temp->getPath())->not()->toBeNull();
        });
    });
    describe('#chmod', function() {
        context('when 0755', function() {
            beforeEach(function() {
                $this->temp = new TemporaryFile($this->rootDirectory . '/bar');
                $this->temp->chmod(0755);
            });
            it('change the permission to 0755' , function () {
                expect($this->temp->isWritable())->toBeTrue();
                expect($this->temp->getPermission())->toBe(0755);
            });
        });
        context('when 0444', function() {
            beforeEach(function() {
                $this->temp = new TemporaryFile($this->rootDirectory . '/foobar');
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
            $this->temp = new TemporaryFile($this->rootDirectory . '/barfoo');
        });
        it('remove file' , function () {
            $this->temp->remove();
            expect($this->temp->exists())->toBeFalse();
        });
    });
    describe('#writeln', function() {
        beforeEach(function() {
            $this->temp = new TemporaryFile($this->rootDirectory . '/writable');
            $this->temp->open();
        });
        it('write a text' , function () {
            $writeBytes = $this->temp->writeln('');
            expect($writeBytes)->toEqual(1);
        });
    });

});
