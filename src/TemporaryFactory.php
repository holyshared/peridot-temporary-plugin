<?php

namespace holyshared\peridot\temporary;


class TemporaryFactory
{

    private $container;


    public function __construct(TemporaryContainer $container)
    {
        $this->container = $container;
    }

    public function makeDirectory($name, $mode = 0755)
    {
        $directory = new TemporaryDirectory($name, $mode);
        $this->container->add($directory);

        return $directory;
    }

    public function makeFile($directory = null, $mode = 0755)
    {
        $file = new TemporaryFile($directory, $mode);
        $this->container->add($file);

        return $file;
    }

    public function destroy()
    {
        $this->container->destroy();
    }

}
