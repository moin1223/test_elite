<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthImageVideo extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'video_url',
    ];
}
