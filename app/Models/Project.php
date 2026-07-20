<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'client', 'name', 'scope', 'location', 'year', 'description',
        'image', 'sort_order', 'is_featured',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
    ];
}
