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

/**
 * Node of file permission
 *
 * @package holyshared\peridot\temporary
 */
interface FileSystemPermission
{
    /**
     * Get a file permission
     *
     * @return int
     */
    public function getPermission();

    /**
     * Tells whether a node is readable
     *
     * @return boolean
     */
    public function isReadable();

    /**
     * Tells whether a node is writable
     *
     * @return boolean
     */
    public function isWritable();
}
