<x-mail::message>
# Notification nouvelle demande

Bonjour **{{$admin->name}}**,
Une nouvelle demande vient d'etre créée.
Détails de la demande :
-Objet :{{$demande->objet}}
-Description: {{$demande->description}}

@component('mail::button', ['url' => route('dashbord.index',compact('demande')) , 'color' => 'green'])
    voir la demande
@endcomponent

Merci,<br>
{{ config('app.name') }}
</x-mail::message>
