<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioProject extends Model
{

    protected $fillable = [
        'title',
        'description',
        'client',
        'date',
        'project_gallery',
        'technologies_used',
        'project_type',
        'background_image'
    ];

    protected $casts = [
        'project_gallery' => 'array',
        'technologies_used' => 'array',
        'date' => 'date',
    ];
}
