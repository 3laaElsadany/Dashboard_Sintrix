<?php

namespace App\Models;

use App\Traits\HandlesImage;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HandlesImage;
    protected $fillable = [
        'client_name',
        'amount',
        'method',
        'payment_date',
        'reference_number',
        'img_link'
    ];

}
