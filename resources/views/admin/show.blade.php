@extends('layouts.app')

@section('title', 'Détails de la demande: '.$demande->objet)

@section('content')
   {{-- @if($demande->admin_id==Auth::user()->id) --}}
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ $demande->objet }}</h4>
                    <hr>
                    <p class="card-text">{{ $demande->description }}</p>
                </div>
            </div>
            <div class="col-12">
                <form class="d-inline" action="{{route('AttCour',$demande->id)}}" method="get">
                    @csrf
                    @method('get')
                    <input type="text" style='display: none' name="admin_id" value="{{Auth::user()->id}}"/>
                    <button type="submit" class="btn btn-warning">Mettre en cours</button>
                </form>
                <form class="d-inline" action="{{route('demande.edit',$demande->id)}}" method="get">
                    @csrf
                    @method('get')
                    <button type="submit" class="btn btn-success">Traiter</button>
                </form>
                <form class="d-inline" action="{{route('rejeet',$demande->id)}}" method="get">
                    @csrf
                    @method('get')
                    <button type="submit" class="btn btn-danger">Rejeter</button>
                </form>
            </div>
        </div>

    {{-- @else
        <div>
            Cette demande ne vous est pas attribuée
        </div>
    @endif --}}
@endsection
