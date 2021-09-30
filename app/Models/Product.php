<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $table = 'products';

    protected $primaryKey = 'id';

    protected $fillable = [
        'type',
        'price',
        'slug',
        'name',
        'description',
        'active',
        'published',
    ];

    protected $casts = [
        'price' => 'decimal:2'
    ];

    public function productTypes(): BelongsTo
    {
        return $this->belongsTo(ProductType::class, 'type');
    }
}
