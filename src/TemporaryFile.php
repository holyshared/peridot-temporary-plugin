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

use \SplFileObject;
use \SplFileInfo;


final class TemporaryFile extends TemporaryNode implements FileSystemNode
{

    private $file;

    public function __construct($path, $mode = FileSystemPermission::NORMAL)
    {
        $this->node = new SplFileInfo($path);
        touch($path);
        chmod($path, $mode);
    }

    public function open()
    {
        $this->file = $this->node->openFile('w');
    }

    /**
     * Write a text
     *
     * @param string $content
     * @return int|null
     */
    public function write($content)
    {
        return $this->file->fwrite($content);
    }

    /**
     * Write a text with newline character
     *
     * @param string $content
     * @return int|null
     */
    public function writeln($content)
    {
        return $this->write($content . "\n");
    }

    protected function removeNode()
    {
        unlink($this->getPath());
    }

}
