<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = ['slider_name', 'slider_details', 'slider_photo', 'button_name'];
}
