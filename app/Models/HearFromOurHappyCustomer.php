<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HearFromOurHappyCustomer extends Model
{
    use HasFactory;
    protected $fillable = [
        'title_user',
        'name',
        'description',
        'image_url',
        'rating',
    ];
}
