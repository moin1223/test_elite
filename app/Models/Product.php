<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'old_price',
        'new_price',
        'weight',
        'description',
        'category_id',
        'image',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, "category_id");

    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

}
