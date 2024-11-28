<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'logo',
        'footer',
        'Social_link_one',
        'Social_link_two',
        'Social_link_three',
        'social_icon_one',
        'social_icon_two',
        'social_icon_three',
    ];
}
