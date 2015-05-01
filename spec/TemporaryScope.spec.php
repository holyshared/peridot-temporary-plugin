<?php

use holyshared\peridot\temporary\TemporaryScope;

describe(TemporaryScope::class, function() {
    beforeEach(function() {
        $this->temp = new TemporaryScope();
    });
    describe('#cleanUpTemporary', function() {
        beforeEach(function() {
            $this->directory = $this->temp->makeDirectory();
            $this->file2 = $this->temp->makeFile();
        });
        it('clean up temporary directory and file', function() {
            $this->temp->cleanUpTemporary();

            expect($this->file2->exists())->toBeFalse();
            expect($this->directory->exists())->toBeFalse();
        });
    });
});
