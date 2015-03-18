<?php

use holyshared\peridot\temporary\TemporaryScope;

describe('TemporaryScope', function() {
    beforeEach(function() {
        $this->temp = new TemporaryScope();
    });
    xdescribe('#makeDirectory', function() {
    });
    xdescribe('#makeWritableDirectory', function() {
    });
    xdescribe('#makeReadableDirectory', function() {
    });
    xdescribe('#makeFile', function() {
    });
    xdescribe('#makeWritableFile', function() {
    });
    xdescribe('#makeReadableFile', function() {
    });
    describe('#setUp', function() {
        it('setup scope object', function() {
            $this->temp->setUp();
        });
    });
    describe('#tearDown', function() {
        it('setup scope object', function() {
            $this->temp->tearDown();
        });
    });
});
