@extends('layouts.app')

@section('title', 'Liste des taches')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
              <div class="card-body">
                <blockquote class="blockquote mb-0">
                  <p>Liste des Demandes</p>
                </blockquote>
                <div class="table-responsive-sm">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">N°</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Description</th>
                                <th scope="col">Fini</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($demandes as $demande)
                            <tr class="">
                                <td scope="row">{{$loop->index+1}}</td>
                                <td>{{ $demande->nom }}</td>
                                <td>{{ $demande->description }}</td>
                                <td>
                                    @if ($demande->fini)
                                         <span class="badge bg-sucess">Fini</span>
                                    @else
                                    <span class="badge bg-sucess">En attente</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('demande.show',compact('demande')) }}" class="btn btn-primary">Voir</a>
                                    <a href="{{ route('demande.edit',compact('demande')) }}" class="btn btn-warning">Editer</a>
                                    <form class="d-inline" action="{{ route('demande.destroy', compact('demande')) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <a href="{{ route('demande.create') }}" class="btn btn-primary">Nouvelle demande</a>
              </div>
            </div>
        </div>
    </div>
@endsection
