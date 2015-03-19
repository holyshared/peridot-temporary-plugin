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

use \SplObjectStorage;
use \Countable;


class TemporaryContainer implements Countable
{

    private $container;

    public function __construct()
    {
        $this->container = new SplObjectStorage();
    }

    public function add(FileSystemNode $node)
    {
        $this->container->attach($node);
    }

    public function count()
    {
        return $this->container->count();
    }

    public function isEmpty()
    {
        return $this->count() <= 0;
    }

    public function destroy()
    {
        foreach ($this->container as $node) {
            $node->remove();
        }
    }

}
