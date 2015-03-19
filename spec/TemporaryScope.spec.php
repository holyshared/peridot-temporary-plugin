<?php

use holyshared\peridot\temporary\TemporaryScope;

describe('TemporaryScope', function() {
    beforeEach(function() {
        $this->temp = new TemporaryScope();
    });
    describe('#cleanUpTemporary', function() {
        beforeEach(function() {
            $this->file = $this->temp->makeFile();
            $this->directory = $this->temp->makeDirectory();
        });
        it('clean up temporary directory and file', function() {
            $this->temp->cleanUpTemporary();

            expect($this->file->exists())->toBeFalse();
            expect($this->directory->exists())->toBeFalse();
        });
    });
});
