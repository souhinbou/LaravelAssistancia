<x-mail::message>
# Notification nouvelle demande

Bonjour **{{$admin->name}}**,
Une demande est toujours en attente dans la plateforme,</br> Cliquez sur le boutton pour traiter la demande


@component('mail::button', ['url' => route('list.demande',compact('demande')) , 'color' => 'green'])
    voir la demande
@endcomponent

Merci,<br>
{{ config('app.name') }}
</x-mail::message>
