<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cooperative extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'name',
        'since_year',
        'owner_name',
        'company_name',
        'email',
        'website',
        'contact',
        'fax',
        'location',
        'avatar',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function productcoops()
    {
        return $this->hasMany(Product::class);
    }

    public function city()
    {
        return $this->belongsTo(RajaongkirCity::class, 'cities_id', 'id');
    }

    public function province()
    {
        return $this->belongsTo(RajaongkirProvince::class, 'provinces_id', 'id');
    }
}
