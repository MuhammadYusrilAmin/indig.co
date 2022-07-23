<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'products';
    protected $fillable = [
        'id',
        'item_code',
        'cooperative_id',
        'category_id',
        'title',
        'price',
        'weight',
        'stock',
        'status',
        'tags',
        'tanggal',
        'description',
    ];

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id', 'id');
    }

    public function galleries()
    {
        return $this->hasMany(ProductGallery::class, 'product_id', 'id');
    }

    public function cooperative()
    {
        return $this->belongsTo(Cooperative::class);
    }
}
