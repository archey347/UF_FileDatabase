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

    protected function getPath($id)
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

    public function put($filename, $fileContents)
    {
        $file = new File();
        $file->name = $filename;
        $file->save();

        $disk = $this->disk;

        $path = $this->getPath($file->id);

        // Make sure an existing file doesn't exist
        if($disk->exists($path)) {
            throw new \Exception("A file already exists with that ID, please clean the storage area");
        }

        $disk->put($path, $fileContents);

        return $file;
    }

    public function get(File $file)
    {
        $disk = $this->disk;

        return $disk->get($this->getPath($file->id));
    }
}