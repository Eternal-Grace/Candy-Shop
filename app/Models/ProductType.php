<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductType extends Model
{
    use SoftDeletes;

    protected $table = 'product_types';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'reference',
    ];
}
