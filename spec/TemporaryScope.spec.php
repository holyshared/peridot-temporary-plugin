<?php

use holyshared\peridot\temporary\TemporaryScope;

describe('TemporaryScope', function() {
    beforeEach(function() {
        $this->temp = new TemporaryScope();
    });
    describe('#cleanUpTemporary', function() {
        beforeEach(function() {
            $this->directory = $this->temp->makeDirectory();
            $this->file1 = $this->temp->makeFileFrom($this->directory);
            $this->file2 = $this->temp->makeFile();
        });
        it('clean up temporary directory and file', function() {
            $this->temp->cleanUpTemporary();

            expect($this->file1->exists())->toBeFalse();
            expect($this->file2->exists())->toBeFalse();
            expect($this->directory->exists())->toBeFalse();
        });
    });
});
