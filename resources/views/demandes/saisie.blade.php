@extends('layouts.app')

@section('title', 'Page de modification de la demande ')

@section('content')
    <div class="container">
        <div class="row g-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        {{_('Bienvenue Dans Assistancia')}} <br> <br>
                        <a href="{{route('demande.create')}}">Formulez une demande</a><br>

                    </div>
                    <div class="card-body">

                        <a href="{{route('affichage.demande')}}">voir mes demandes</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
