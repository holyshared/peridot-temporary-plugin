<?php

/**
 * This file is part of peridot-temporary-plugin.
 *
 * (c) Noritaka Horio <holy.shared.design@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace holyshared\peridot\temporary;


abstract class TemporaryNode implements FileSystemNode
{

    protected $node;


    public function getName()
    {
        return $this->node->getFilename();
    }

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

    abstract protected function removeNode();

}
