<x-mail::message>
# Notification de la demande
Bonjour **{{$demandeur->name}}**,

Détails de la réponse : <br>
-*Motif:* __{{$demande->reponse}}__


Merci,<br>
{{ config('app.name') }}
</x-mail::message>
