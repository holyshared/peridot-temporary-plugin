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

use Rhumsaa\Uuid\Uuid;

/**
 * TemporaryFactory
 *
 * @package holyshared\peridot\temporary
 */
final class TemporaryFactory
{

    /**
     * Create a new temporary directory
     *
     * @param int $mode permission
     * @return \holyshared\peridot\temporary\TemporaryDirectory
     */
    public function makeDirectory($mode = FileSystemPermission::NORMAL)
    {
        $directoryId = $this->generateId();
        $directory = new TemporaryDirectory($directoryId, $mode);

        return $directory;
    }

    /**
     * Create a new temporary file
     *
     * @param int $mode permission
     * @return \holyshared\peridot\temporary\TemporaryFile
     */
    public function makeFile($mode = FileSystemPermission::NORMAL)
    {
        $fileId = $this->generateId();
        $filePath = sys_get_temp_dir() . '/' . $fileId;
        $file = new TemporaryFile($filePath, $mode);

        return $file;
    }

    /**
     * Create a new temporary file from directory
     *
     * <code>
     * $factory = new TemporaryFactory();
     * $directory = $factory->makeDirectory();
     * $file = $factory->makeFileFrom($directory);
     * </code>
     *
     * @param \holyshared\peridot\temporary\TemporaryDirectory $directory directory
     * @param int $mode permission
     * @return \holyshared\peridot\temporary\TemporaryFile
     */
    public function makeFileFrom(TemporaryDirectory $directory, $mode = FileSystemPermission::NORMAL)
    {
        $id = $this->generateId();
        $fileId = $directory->getPath() . '/' . $id;

        $file = new TemporaryFile($fileId, $mode);

        return $file;
    }

    private function generateId()
    {
        $uuid4 = Uuid::uuid4();
        return $uuid4->toString();
    }

}
