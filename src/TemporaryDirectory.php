<?php

namespace holyshared\peridot\temporary;

use \SplFileInfo;


class TemporaryDirectory extends TemporaryNode
{

    private $node;


    public function __construct($name, $mode = 0755)
    {
        $path = sys_get_temp_dir() . '/' . $name;
        mkdir($path, $mode, true); //recursive!!

        $this->node = new SplFileInfo($path);
    }

    public function getPath()
    {
        return $this->node->getPathname();
    }

    public function exists()
    {
        return file_exists($this->getPath());
    }

    public function chmod($mode)
    {
        chmod($this->getPath(), $mode);
    }

    public function getPermission()
    {
        $value = $this->node->getPerms();
        $value = substr(sprintf('%o', $value), -4); //Example: 100444

        return intval($value, 8);
    }

    public function isReadable()
    {
        return $this->node->isReadable();
    }

    public function isWritable()
    {
        return $this->node->isWritable();
    }

    public function remove()
    {
        rmdir($this->getPath());
    }

    public function __destruct()
    {
        $this->remove();
    }

}
