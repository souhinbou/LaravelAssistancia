@extends('layouts.app')

@section('title', 'Détails de la demande: '.$demande->objet)

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ $demande->objet }}</h4>
            <hr>
            <p class="card-text">{{ $demande->description }}</p>
        </div>
    </div>
@endsection
