<?php

namespace holyshared\peridot\temporary;

use \SplFileInfo;


final class TemporaryDirectory extends TemporaryNode implements FileSystemNode
{

    public function __construct($name, $mode = 0755)
    {
        $path = sys_get_temp_dir() . '/' . $name;
        mkdir($path, $mode);
        $this->node = new SplFileInfo($path);
    }

    public function remove()
    {
        if ($this->exists() === false) {
            return;
        }
        rmdir($this->getPath());
    }

    public function __destruct()
    {
        $this->remove();
        $this->node = null;
    }

}
