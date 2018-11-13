<?php

namespace App\Nova\Filters;

use App\Location;
use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;

class LeadByLocation extends Filter
{
    /**
     * Apply the filter to the given query.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function apply(Request $request, $query, $value)
    {
        return $query->where('location_id', $value);
    }

    /**
     * Get the filter's available options.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function options(Request $request)
    {
        $options = [];
        $locations = Location::all();
        foreach ( $locations as $location ) {
            $options[ $location->name ] = $location->id;
        }
        return $options;
    }
}
