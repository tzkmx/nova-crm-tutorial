@component('mail::message')
# You are a Winner!

{{ $lead->name }},

You entered a contest at our {{ $lead->location->name }} location and won!  Please do the following to claim your prize...

@component('mail::button', ['url' => $actionUrl])
Claim Prize
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
