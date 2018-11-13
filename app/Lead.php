<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $casts = [
        'is_winner' => 'datetime',
    ];

    public function location()
    {
        return $this->belongsTo('App\Location');
    }
}
