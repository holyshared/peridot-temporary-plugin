<?php

namespace holyshared\peridot\temporary;

use \SplFileObject;


final class TemporaryFile extends TemporaryNode implements FileSystemNode
{

    public function __construct($name, $mode = 0755)
    {
        $path = sys_get_temp_dir() . '/' . $name;
        $this->node = new SplFileObject($path, 'w');
    }

    public function remove()
    {
        if ($this->exists() === false) {
            return;
        }
        unlink($this->getPath());
    }

    public function __destruct()
    {
        $this->remove();
        $this->node = null;
    }

}
