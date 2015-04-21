<?php

use holyshared\peridot\temporary\TemporaryDirectory;

describe('TemporaryDirectory', function() {
    beforeEach(function() {
        $this->rootDirectory = sys_get_temp_dir();
    });
    describe('#getPath', function() {
        beforeEach(function() {
            $this->temp = new TemporaryDirectory($this->rootDirectory . '/foo');
        });
        it('return path' , function () {
            expect($this->temp->getPath())->toEndWith('/foo');
        });
    });
    describe('#createNewFile', function() {
        beforeEach(function() {
            $this->temp = new TemporaryDirectory($this->rootDirectory . '/bar');
            $this->file = $this->temp->createNewFile('file.txt');
            $this->fileName = $this->file->getName();
            $this->filePath = $this->file->getPath();
        });
        it('return TemporaryFile instance' , function () {
            expect($this->file)->toBeAnInstanceOf('holyshared\peridot\temporary\TemporaryFile');
            expect($this->filePath)->toEndWith('/bar/' . $this->fileName);
            $this->temp->remove();
        });
    });
    describe('#chmod', function() {
        context('when 0755', function() {
            beforeEach(function() {
                $this->temp = new TemporaryDirectory($this->rootDirectory . '/writable');
                $this->temp->chmod(0755);
            });
            it('change the permission to 0755' , function () {
                expect($this->temp->isWritable())->toBeTrue();
                expect($this->temp->getPermission())->toBe(0755);
                $this->temp->remove();
            });
        });
        context('when 0444', function() {
            beforeEach(function() {
                $this->temp = new TemporaryDirectory($this->rootDirectory . '/readable');
                $this->temp->chmod(0444);
            });
            it('change the permission to 0444' , function () {
                expect($this->temp->isWritable())->toBeFalse();
                expect($this->temp->getPermission())->toBe(0444);
                $this->temp->remove();
            });
        });
    });
    describe('#remove', function() {
        beforeEach(function() {
            $this->temp = new TemporaryDirectory($this->rootDirectory . '/removable');
        });
        it('remove directory' , function () {
            $this->temp->remove();
            expect($this->temp->exists())->toBeFalse();
        });
    });
});
