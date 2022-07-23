<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'location',
        'name',
        'phone',
        'address',
        'rt',
        'rw',
        'zip_code',
        'province_id',
        'regencies_id',
        'district_id',
        'village_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
