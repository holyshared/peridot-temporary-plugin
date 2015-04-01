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

use Peridot\Core\Scope;

/**
 * TemporaryScope
 *
 * @package holyshared\peridot\temporary
 */
final class TemporaryScope extends Scope
{

    /**
     * @var \holyshared\peridot\temporary\TemporaryFactory
     */
    private $factory;

    /**
     * @var \holyshared\peridot\temporary\TemporaryContainer
     */
    private $container;


    public function __construct()
    {
        $this->factory = new TemporaryFactory();
        $this->container = new TemporaryContainer();
    }

    /**
     * Remove all temporary file and directory
     */
    public function cleanUpTemporary()
    {
        $this->container->destroy();
    }

    /**
     * Create a new temporary directory
     *
     * @param int $mode permission
     * @return \holyshared\peridot\temporary\TemporaryDirectory
     */
    public function makeDirectory($mode = FileSystemPermission::NORMAL)
    {
        $directory = $this->factory->makeDirectory($mode);
        $this->container->add($directory);

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
        $file = $this->factory->makeFile($mode);
        $this->container->add($file);

        return $file;
    }

}
