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


final class TemporaryDirectory extends TemporaryNode implements FileSystemNode
{

    public function __construct($name, $mode = FileSystemPermission::NORMAL)
    {
        $path = sys_get_temp_dir() . '/' . $name;
        mkdir($path, $mode);
        $this->node = new SplFileInfo($path);
    }

}
