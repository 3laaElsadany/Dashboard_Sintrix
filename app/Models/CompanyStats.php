<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyStats extends Model
{
    //
    protected $fillable = [
        'video_link',
        'years_of_experience',
        'team_members',
        'total_awards',
        'projects_complete'
    ];
}
