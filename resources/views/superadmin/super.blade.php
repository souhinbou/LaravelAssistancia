@extends('layouts.app')

@section('title', 'Liste des Demandes')
@section('content')
    {{-- <div class="row">
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
                                <th scope="col">Objet</th>
                                <th scope="col">Description</th>
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($demandes as $demande)
                            <tr class="">
                                <td scope="row">{{$loop->index+1}}</td>
                                <td>{{ $demande->objet }}</td>
                                <td>{{ $demande->description }}</td>
                                <td>
                                    @if ($demande->status==='Traitee')
                                        <span class="badge bg-success">{{$demande->status}}</span>
                                    @elseif ($demande->status==='En_cours')
                                        <span class="badge bg-warning">{{$demande->status}}</span>
                                    @elseif ($demande->status==='Rejetee')
                                        <span class="badge bg-danger">{{$demande->status}}</span>
                                    @else
                                        <span class="badge bg-primary">{{$demande->status}}</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('demande.show',compact('demande')) }}" class="btn btn-primary">Traiter la demande</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
              </div>
            </div>
        </div>
    </div> --}}
@endsection


@endsection
