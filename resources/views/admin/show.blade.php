@extends('layouts.app')

@section('title', 'Détails de la demande: '.$demande->objet)

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ $demande->objet }}</h4>
                <hr>
                <p class="card-text">{{ $demande->description }}</p>
            </div>
        </div>
        <div class="col-12">
            <a href="{{url('attente.cour')}}" class="btn btn-danger">Voir</a>
            <form class="d-inline" action="{{route('attente.cour')}}" method="get">
                @csrf
                @method('get')
                <button type="submit" class="btn btn-warning">Mettre en cours de traitement</button>
            </form>
            <form class="d-inline" action="#" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-success">Traiter</button>
            </form>
            <form class="d-inline" action="#" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Rejeter</button>
            </form>
        </div>
    </div>
@endsection
