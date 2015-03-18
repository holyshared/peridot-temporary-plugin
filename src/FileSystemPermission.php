<?php

namespace holyshared\peridot\temporary;

interface FileSystemPermission
{
    public function getPermission();
    public function isReadable();
    public function isWritable();
}
