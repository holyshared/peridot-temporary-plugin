<?php

namespace holyshared\peridot\temporary;

use \SplFileObject;


final class TemporaryFile extends TemporaryNode
{

    public function __construct($directory = null, $mode = 0755)
    {
        $outputDirectory = sys_get_temp_dir();

        if ($directory !== null) {
            $outputDirectory = $directory;
        }

        $path = tempnam($outputDirectory, 'peridot-temporary');
        $this->node = new SplFileObject($path);
    }

    public function remove()
    {
        unlink($this->getPath());
    }

    public function __destruct()
    {
        $this->remove();
    }

}
