<?php

/*
 * UserFrosting (http://www.userfrosting.com)
 *
 * @link      https://github.com/userfrosting/UserFrosting
 * @copyright Copyright (c) 2019 Alexander Weissman
 * @license   https://github.com/userfrosting/UserFrosting/blob/master/LICENSE.md (MIT License)
 */

namespace UserFrosting\Sprinkle\FileDB\ServicesProvider;

use UserFrosting\Sprinkle\FileDB\FileDB\FileDB;
use Psr\Container\ContainerInterface;

class ServicesProvider
{
    public function register(ContainerInterface $container)
    {
        $container['fileDB'] = function ($c) {
            // Get the config
            $config = $c->config['fileDB'];

            // Get the disk
            $disk = $c->filesystem->disk($config['disk']);

            // Create Service
            return new FileDB($config, $disk);
        };
    }
}