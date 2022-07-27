<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'address_id',
        'discount_id',
        'status',
        'sender',
        'sub_total',
        'shipping_charge',
        'total_payment',
        'payment_status',
        'midtrans_url',
        'midtrans_booking code',
        'note',
        'canceled',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }

    public function items()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
