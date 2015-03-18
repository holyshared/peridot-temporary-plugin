<?php

use holyshared\peridot\temporary\TemporaryDirectory;

describe('TemporaryDirectory', function() {
    beforeEach(function() {
        $this->temp = new TemporaryDirectory('foo');
    });
    describe('#getPath', function() {
        it('return path' , function () {
            expect($this->temp->getPath())->toEndWith('/foo');
        });
    });
    describe('#remove', function() {
        beforeEach(function() {
            $this->temp = new TemporaryDirectory('foo');
        });
        it('remove directory' , function () {
            $this->temp->remove();
            expect($this->temp->exists())->toBeFalse();
        });
    });
});
