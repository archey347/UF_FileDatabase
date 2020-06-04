<?php

/*
 * UserFrosting (http://www.userfrosting.com)
 *
 * @link      https://github.com/userfrosting/UserFrosting
 * @copyright Copyright (c) 2019 Alexander Weissman
 * @license   https://github.com/userfrosting/UserFrosting/blob/master/LICENSE.md (MIT License)
 */

namespace UserFrosting\Sprinkle\FileDB\Database\Models;

use Illuminate\Database\Eloquent\Builder;
use UserFrosting\Sprinkle\Core\Database\Models\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Role Class.
 *
 * Represents a role, which aggregates permissions and to which a user can be assigned.
 *
 * @author Alex Weissman (https://alexanderweissman.com)
 *
 * @property string $slug
 * @property string $name
 * @property string $description
 */
class File extends Model
{
    use SoftDeletes;


    /**
     * @var string The name of the table for the current model.
     */
    protected $table = 'files';

    protected $fillable = [
        'name'
    ];

    /**
     * @var bool Enable timestamps for this class.
     */
    public $timestamps = true;

    /**
     * Get the file from storage
     */
    public function get() 
    {
        $fileDB = static::$ci->fileDB;

        return $fileDB->get($this);
    }

    /**
     * Delete
     */
    public function forceDelete() 
    {
        $fileDB = static::$ci->fileDB;

        $fileDB->delete($this);

        parent::forceDelete();
    }
}