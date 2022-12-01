@extends('layouts.app')

@section('title', 'Détails de la demande: '.$demande->objet)

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ $demande->objet }}</h4>
            <hr>
            <p class="card-text">{{ $demande->description }}</p>
            <p class="card-text">Status: {{ $demande->status }}</p>
        </div>
    </div>
@endsection
