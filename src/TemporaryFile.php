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


final class TemporaryFile extends TemporaryNode implements FileSystemNode
{

    public function __construct($name, $mode = 0755)
    {
        $path = sys_get_temp_dir() . '/' . $name;
        $this->node = new SplFileObject($path, 'w');
        $this->chmod($mode);
    }

}
