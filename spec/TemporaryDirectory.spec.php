<?php

use holyshared\peridot\temporary\TemporaryDirectory;

describe('TemporaryDirectory', function() {
    describe('#getPath', function() {
        beforeEach(function() {
            $this->temp = new TemporaryDirectory('foo');
        });
        it('return path' , function () {
            expect($this->temp->getPath())->toEndWith('/foo');
        });
    });
    describe('#createFile', function() {
        beforeEach(function() {
            $this->temp = new TemporaryDirectory('bar');
            $this->file = $this->temp->createFile('file.txt');
            $this->fileName = $this->file->getName();
            $this->filePath = $this->file->getPath();
        });
        it('return TemporaryFile instance' , function () {
            expect($this->file)->toBeAnInstanceOf('holyshared\peridot\temporary\TemporaryFile');
            expect($this->filePath)->toEndWith('/bar/' . $this->fileName);
        });
    });
    describe('#chmod', function() {
        context('when 0755', function() {
            beforeEach(function() {
                $this->temp = new TemporaryDirectory('writable');
                $this->temp->chmod(0755);
            });
            it('change the permission to 0755' , function () {
                expect($this->temp->isWritable())->toBeTrue();
                expect($this->temp->getPermission())->toBe(0755);
            });
        });
        context('when 0444', function() {
            beforeEach(function() {
                $this->temp = new TemporaryDirectory('readable');
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
            $this->temp = new TemporaryDirectory('removable');
        });
        it('remove directory' , function () {
            $this->temp->remove();
            expect($this->temp->exists())->toBeFalse();
        });
    });
});
