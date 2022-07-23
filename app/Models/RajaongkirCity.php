<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RajaongkirCity extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'name',
        'postal_code',
        'province_id',
    ];
}
