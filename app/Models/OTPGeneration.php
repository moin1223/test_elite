<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OTPGeneration extends Model
{
    use HasFactory;

    protected $fillable = [
        'contact_no',
        'otp',
        'expire_at'
    ];

    protected $table = "otp_generation";
}
