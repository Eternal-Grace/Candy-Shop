<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 *
 */
class Type extends Model
{
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'types';

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'reference',
    ];
}
