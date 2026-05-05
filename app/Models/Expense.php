<?php

namespace App\Models;

use App\Traits\HandlesImage;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HandlesImage;
    //
    protected $fillable = [
        'description',
        'amount',
        'category',
        'date',
        'img_link'
    ];

}
