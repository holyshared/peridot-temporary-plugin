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
