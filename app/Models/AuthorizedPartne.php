<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorizedPartne extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
    ];

    public function userRequests()
    {
        return $this->hasMany(RequestedUser::class, 'group_id');
    }

    public function userDetails()
    {
        return $this->hasMany(UserDetails::class, 'group_id');
    }
    
    
}
