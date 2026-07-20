<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = [
        'company_name', 'tagline', 'about', 'vision', 'mission',
        'phone', 'email', 'head_office', 'sub_office', 'facebook', 'hero_image',
    ];

    /**
     * The site runs on a single settings row. Fetch it (creating defaults if needed).
     */
    public static function current(): self
    {
        return static::query()->firstOrCreate(['id' => 1]);
    }
}
