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

class TemporaryScope extends Scope
{

    private $factory;


    public function __construct()
    {
        $this->factory = new TemporaryFactory(new TemporaryContainer());
    }

    public function cleanUpTemporary()
    {
        $this->factory->destroy();
    }

    public function makeDirectory($mode = 0755)
    {
        return $this->factory->makeDirectory($mode);
    }

    public function makeFile($mode = 0755)
    {
        return $this->factory->makeFile($mode);
    }

}
