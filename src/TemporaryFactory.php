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


class TemporaryFactory
{

    private $container;


    public function __construct(TemporaryContainer $container)
    {
        $this->container = $container;
    }

    public function makeDirectory($mode = 0755)
    {
        $directoryId = $this->generateId();

        $directory = new TemporaryDirectory($directoryId, $mode);
        $this->container->add($directory);

        return $directory;
    }

    public function makeFile($mode = 0755)
    {
        $fileId = $this->generateId();

        $file = new TemporaryFile($fileId, $mode);
        $this->container->add($file);

        return $file;
    }

    public function destroy()
    {
        $this->container->destroy();
    }

    private function generateId()
    {
        $uuid4 = Uuid::uuid4();
        return $uuid4->toString();
    }

}
