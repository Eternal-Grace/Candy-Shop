<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Image extends Model
{
    /**
     * @var string
     */
    protected $table = 'images';

    protected $fillable = [
        'path',
        'published',
    ];

    /**
     * @var array
     */
    protected $hidden = [
        'id',
        'parent_id',
        'parent_type',
        'created_at',
        'updated_at',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
    ];

    /**
     * @return MorphTo
     */
    public function parent(): MorphTo
    {
        return $this->morphTo();
    }
}
