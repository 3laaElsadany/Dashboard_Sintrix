<?php

namespace App\Models;

use App\Traits\HandlesImage;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    //
    use HandlesImage;
    protected $fillable = [
        'employee_name',
        'base_salary',
        'bonus',
        'deductions',
        'net_salary',
        'img_link',
        'status'
    ];

}
