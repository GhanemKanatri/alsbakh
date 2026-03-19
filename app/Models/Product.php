<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image_url',
        'brand',
        'origin',
        'slug',
        'is_featured',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
    ];
}
