@component('mail::message')

@foreach ($updated as $invite)
@component('mail::panel')
@foreach ($invite['guests'] as $guest)
<span>{{ $guest['name'] }} - {{ $guest['pretty_rsvp'] }}</span>
<br>
@endforeach
@endcomponent
@endforeach

@endcomponent
