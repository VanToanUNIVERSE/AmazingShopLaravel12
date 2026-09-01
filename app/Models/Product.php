<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'price',
        'hot',
        'description',
        'size',
        'quantity',
        'subcategory_id',
        'active',
    ];

    protected function casts(): array
    {
        return [
            'hot' => 'boolean',
            'active' => 'boolean',
            'price' => 'decimal:2',
        ];
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}
