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

use \SplFileInfo;
use \RecursiveDirectoryIterator;
use \FilesystemIterator;
use \RecursiveIteratorIterator;


final class TemporaryDirectory extends TemporaryNode implements FileSystemNode
{

    public function __construct($name, $mode = FileSystemPermission::NORMAL)
    {
        $path = sys_get_temp_dir() . '/' . $name;
        mkdir($path, $mode);
        $this->node = new SplFileInfo($path);
    }

    public function createFile($name, $mode = FileSystemPermission::NORMAL)
    {
        $newFile = $this->getPath() . '/' . $name;
        $file = new TemporaryFile($newFile, $mode);
        return $file;
    }

    protected function removeNode()
    {
        $fileNodes = $this->createNodeIterator();

        foreach ($fileNodes as $fileNode) {
            if ($fileNode->isDir()) {
                continue;
            }
            unlink($fileNode->getPathname());
        }
        rmdir($this->getPath());
    }

    private function createNodeIterator()
    {
        $directory = $this->getPath();
        $directoryIterator = new RecursiveDirectoryIterator($directory,
            FilesystemIterator::CURRENT_AS_FILEINFO |
            FilesystemIterator::KEY_AS_PATHNAME |
            FilesystemIterator::SKIP_DOTS
        );

        $nodeIterator = new RecursiveIteratorIterator(
            $directoryIterator,
            RecursiveIteratorIterator::LEAVES_ONLY
        );

        return $nodeIterator;
    }

}
