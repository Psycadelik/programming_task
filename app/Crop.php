<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crop extends Model
{
    //
    protected $fillable = ['crop_name', 'crop_altitude', 'farming_method', 'harvest_time'];
}
