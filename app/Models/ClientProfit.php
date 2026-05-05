<?php

namespace App\Models;

use App\Traits\HandlesImage;
use Illuminate\Database\Eloquent\Model;

class ClientProfit extends Model
{
    use HandlesImage;

    protected $fillable = [
        'client_name',
        'img_link',
        'projects_count',
        'revenue',
        'cost',
        'net_profit',
        'margin'
    ];
}
