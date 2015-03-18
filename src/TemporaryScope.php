<?php

namespace holyshared\peridot\temporary;

use Peridot\Core\Scope;

class TemporaryScope extends Scope
{

    private $factory;


    public function __construct()
    {
        $this->setUp();
    }

    public function setUp()
    {
        $this->factory = new TemporaryFactory(new TemporaryContainer());
    }

    public function tearDown()
    {
        $this->factory->destroy();
    }

    public function cleanUpTemporary()
    {
        $this->factory->destroy();
    }

    public function makeDirectory($name, $mode = 0755)
    {
        return $this->factory->makeDirectory($name, $mode);
    }

    public function makeFile($directory = null, $mode = 0755)
    {
        return $this->factory->makeFile($directory, $mode);
    }

}
