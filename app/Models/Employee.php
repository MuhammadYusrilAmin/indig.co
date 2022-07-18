<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'cooperative_id',
        'name',
        'email',
        'phone',
        'joining_date',
        'status',
        'password',
        'avatar',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cooperative()
    {
        return $this->belongsTo(Cooperative::class);
    }
}
