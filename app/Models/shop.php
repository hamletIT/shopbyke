<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shop extends Model
{
    use HasFactory;
    public $timestamps = false;

    function photos()
    {
        return $this->hasMany('App\Models\photo', 'shops_id');
    }
    function category()
    {
        return $this->belongsTo('App\Models\category','category_id');
    }
    
}
