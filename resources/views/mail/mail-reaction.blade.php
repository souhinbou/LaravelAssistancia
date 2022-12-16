<x-mail::message>
# Notification de la demande
Bonjour **{{$demandeur->name}}**,

Détails de la demande :
-Motif :{{$demande->reponse}}


{{-- <x-mail::button :url="''">
Button Text
</x-mail::button> --}}

Merci,<br>
{{ config('app.name') }}
</x-mail::message>
