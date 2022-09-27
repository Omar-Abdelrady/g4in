<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    use HasFactory;
    protected $guarded;
    public function products()
    {
        return $this->belongsToMany(Product::class, 'pivot_product_sizes', 'product_id', 'size_id');
    }
}
