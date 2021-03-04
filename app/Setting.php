<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['shopify_domain', 'status', 'font_size', 'background', 'max_column', 'color', 'font_family', 'background_title', 'color_title','type'];
}
