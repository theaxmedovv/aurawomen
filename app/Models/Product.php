<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'sale_price',
        'stock',
        'category',
        'is_bestseller',
        'rating',
        'image',
        'sku',
        'barcode',
        'brand',
        'size',
        'gender',
        'discount_percentage',
        'final_price',
        'sold_count',
        'views',
        'status',
        'min_stock',
        'availability',
        'sale_start',
        'sale_end',
        'attributes'
    ];
}
