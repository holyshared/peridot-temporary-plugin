<?php

namespace holyshared\peridot\temporary;

use \SplFileObject;


class TemporaryFile extends TemporaryNode
{

    private $file;

    public function __construct($directory = null, $mode = 0755)
    {
        $outputDirectory = sys_get_temp_dir();

        if ($directory !== null) {
            $outputDirectory = $directory;
        }

        $path = tempnam($outputDirectory, 'peridot-temporary');
        $this->file = new SplFileObject($path);
    }

    public function getPath()
    {
        return $this->file->getPathname();
    }

    public function exists()
    {
        return file_exists($this->getPath());
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
