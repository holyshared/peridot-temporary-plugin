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
 * Node of file system
 *
 * @package holyshared\peridot\temporary
 */
interface FileSystemNode extends FileSystemPermission
{

    /**
     * Get absolute path
     *
     * @return string absolute path
     */
    public function getPath();

    /**
     * Checks whether a node exists
     *
     * @return boolean
     */
    public function exists();

    /**
     * Remove from disk
     */
    public function remove();

    /**
     * Changes file mode
     *
     * @param int $mode file mode
     */
    public function chmod($mode);
}
