@extends('layouts.app')

@section('title', 'Tableau de détails des demandes')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
              <div class="card-body">
                <blockquote class="blockquote mb-0">
                  <p>Dashboard des demandes</p>
                </blockquote>
                <div class="table-responsive-sm">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">N°</th>
                                <th scope="col">Objet</th>
                                <th scope="col">Description</th>
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        {{-- <tbody>
                            @foreach ($demande as $demandes)
                            <tr class="">
                                <td scope="row">{{$loop->index+1}}</td>
                                <td>{{ $demande->objet }}</td>
                                <td>{{ $demande->description }}</td>
                                <td>
                                    @if ($demande->status)
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
                        </tbody> --}}
                    </table>
                </div>
                {{-- <a href="{{ route('demande.create') }}" class="btn btn-primary">Nouvelle demande</a> --}}
              </div>
            </div>
        </div>
    </div>
@endsection
