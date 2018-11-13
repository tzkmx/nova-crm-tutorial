<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public function leads()
    {
        return $this->hasMany('App\Lead');
    }
}
