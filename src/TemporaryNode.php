<?php

namespace holyshared\peridot\temporary;


abstract class TemporaryNode implements FileSystemNode
{

    protected $node;


    public function getPath()
    {
        return $this->node->getPathname();
    }

    public function exists()
    {
        return file_exists($this->getPath());
    }

    public function remove()
    {
        if ($this->exists() === false) {
            return;
        }
        $this->removeNode();
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

    public function __destruct()
    {
        $this->remove();
        $this->node = null;
    }

    private function removeNode()
    {
        if ($this->node->isFile()) {
            unlink($this->getPath());
        } else {
            rmdir($this->getPath());
        }
    }

}
