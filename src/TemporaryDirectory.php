<?php

namespace holyshared\peridot\temporary;


class TemporaryDirectory extends TemporaryNode
{

    private $path;

    public function __construct($name, $mode = 0755)
    {
        $this->path = sys_get_temp_dir() . '/' . $name;
        mkdir($this->path, $mode, true); //recursive!!
    }

    public function getPath()
    {
        return $this->path;
    }

    public function exists()
    {
        return file_exists($this->path);
    }

    public function remove()
    {
        rmdir($this->path);
    }

    public function __destruct()
    {
        $this->remove();
    }

}
