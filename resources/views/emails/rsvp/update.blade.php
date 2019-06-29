@component('mail::message')

@component('mail::panel')
<h1>New RSVP!</h1>
@foreach ($invite['guests'] as $guest)
<span>{{ $guest['name'] }} - {{ $guest['pretty_rsvp'] }}</span>
<br>
@endforeach
@endcomponent

@endcomponent
