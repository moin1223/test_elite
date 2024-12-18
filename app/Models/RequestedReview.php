<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestedReview extends Model
{
    use HasFactory;
    protected $fillable = [
        'review',
        'user_id',
        'status',
        'product_id'
   
    ];
    
    
}
