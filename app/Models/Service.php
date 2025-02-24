<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'base_price',
        'currency',
        'turnaround_time',
        'tags',
        'categories',
        'example_images',
        'options',
        'is_active',
        'user_id'
    ];

    protected $casts = [
        'tags' => 'array',
        'categories' => 'array',
        'example_images' => 'array',
        'options' => 'array',
        'is_active' => 'boolean',
        'base_price' => 'decimal:2'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
