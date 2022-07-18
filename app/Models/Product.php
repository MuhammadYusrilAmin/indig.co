<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'item_code',
        'cooperative_id',
        'category_id',
        'title',
        'price',
        'weight',
        'stock',
        'publish',
        'tags',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function galleries()
    {
        return $this->hasMany(ProductGallery::class);
    }
}
