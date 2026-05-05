<?php

namespace App\Models;

use App\Traits\HandlesImage;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HandlesImage;
    //
    protected $fillable = [
        'invoice_number',
        'client_name',
        'amount',
        'status',
        'img_link'
    ];

}
