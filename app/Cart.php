<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['shopify_domain','name', 'status','color_title','font_family','background_title','font_size','color_title_hover','background_title_hover', 'text'];
}
