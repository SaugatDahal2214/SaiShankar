<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'Service_Title',
        'Service_Description',
        'Service_Image'
    ];
}
