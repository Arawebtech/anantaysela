<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'details',
        'price',
        'original_price',
        'discount_percentage',
        'image',
        'category',
        'rating',
        'rating_count',
        'featured',
        'is_active',
        'stock',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'original_price' => 'decimal:2',
        'rating' => 'decimal:2',
        'featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function getCurrentPriceAttribute()
    {
        if ($this->original_price && $this->original_price > $this->price) {
            return $this->price;
        }
        return $this->price;
    }

    public function getDiscountAmountAttribute()
    {
        if ($this->original_price && $this->original_price > $this->price) {
            return $this->original_price - $this->price;
        }
        return 0;
    }
}
