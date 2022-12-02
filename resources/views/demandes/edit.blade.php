@extends('layouts.app')

@section('title', 'Page de modification de la demande '.$demande->objet)

@section('content')
    <div class="container">
        <div class="row g-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Formulaire de modification - {{ $demande->objet }}</h4>
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $error }}</strong>
                            </div>
                        @endforeach

                        <form action="{{ route('demande.update', compact('demande')) }}" method="POST">
                            @method('put')
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label for="objet" class="form-label">Objet</label>
                                        <input type="text" value="{{ old('objet') ?? $demande->objet }}" class="form-control"
                                            name="objet" id="objet" aria-describedby="helpNomId"
                                            placeholder="Nom de la demande">
                                        @error('objet')
                                            <small id="helpNomId" class="form-text text-muted">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control" name="description" id="description" rows="3">{{ old('description') ?? $demande->description }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="reset" class="btn btn-secondary">Vider</button>
                                    <button type="submit" class="btn btn-warning">Modifier</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
