@extends('layouts.app')
@section('title', "Formulaire d'ajout d'une demande")
@section('content')
    <div class="container">
        <div class="row g-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Formulaire d'ajout d'une demande</h4>
                        <form action="{{ route('demande.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label for="objet" class="form-label">Objet</label>
                                        <input type="text" class="form-control" name="objet" id="objet"
                                            aria-describedby="helpNomId" placeholder="Nom de la demande">
                                        @error('objet')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                                        @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="reset" class="btn btn-secondary">Vider</button>
                                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                                    <button type="reset" class="btn btn-secondary">Voir</button>
                                    <button type="submit" class="btn btn-succes">Modifier</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
