<?php

namespace UserFrosting\Sprinkle\FileDB\FileDB;

use UserFrosting\Support\Repository\Repository as ConfigRepository;
use UserFrosting\Sprinkle\FileDB\Database\Models\File;

class FileDB
{
    protected $config;

    protected $disk;

    public function __construct($config, $disk)
    {
        $this->config = $config;
        $this->disk = $disk;
    }

    public function getPath($id)
    {
        $config = $this->config;

        $path = $this->config['path'];

        if(substr(trim($path), -1, 1) != "/") {
            $path .= "/";
        }

        if(!is_int($id)) {
            throw new \Exception("Invalid File ID");
        }

        return $path . $id;
    }

    public function getDisk()
    {
        return $this->disk;
    }
}