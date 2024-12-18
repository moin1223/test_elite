<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UserDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'gender',
        'division_id',
        'district_id',
        'thana_id',
        'ward_no',
        'group_id',
        'mobile_number',
        'whats_app_number',
        'monitor_name',
        'monitor_number',
        'drector_name',
        'director_number',
        'role',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }
    public function thana()
    {
        return $this->belongsTo(Thana::class);
    }
    public function group()
    {
        return $this->belongsTo(AuthorizedPartne::class, 'group_id');
    }
}

