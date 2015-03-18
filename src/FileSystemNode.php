<?php

namespace holyshared\peridot\temporary;

interface FileSystemNode
{
    public function getPath();
    public function exists();
    public function remove();
    public function chmod($mode);
}
