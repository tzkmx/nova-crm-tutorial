<?php

namespace App;

use Laravel\Nova\Actions\Actionable;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use Actionable;

    protected $casts = [
        'is_winner' => 'datetime',
    ];

    public function location()
    {
        return $this->belongsTo('App\Location');
    }
}
