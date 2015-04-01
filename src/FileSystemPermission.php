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
    const NORMAL = 0755; //Normal drwxr-xr-x
    const OWNER_ONLY = 644; //Owner only drw-r--r--
    const READ_ONLY = 0444; //Read only dr--r--r--
    const WRITE_ONLY = 0222; //Write only d-w--w--w-

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
