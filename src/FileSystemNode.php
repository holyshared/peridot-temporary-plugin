<?php

namespace holyshared\peridot\temporary;

interface FileSystemNode extends FileSystemPermission
{
    public function getPath();
    public function exists();
    public function remove();
    public function chmod($mode);
}
