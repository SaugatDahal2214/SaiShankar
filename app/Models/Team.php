<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ([
        'Team_Image',
        'Team_Description',
        'Md_Image',
        'ManagingDirector_Message'
    ]);
}
