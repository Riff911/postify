@component('mail::message')
<p>From: {{ $details['name'] }}</p> 
<p>Phone: {{ $details['phone'] }}</p> 

<p>{{ $details['msg'] }}</p> 


Thanks,<br>
{{ config('app.name') }}
@endcomponent
