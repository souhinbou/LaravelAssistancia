@extends('layouts.app')
@section('title','Page de traitement de demande')
@section('content')
   <div class="row">
        <div class="col-12">
           <form class="d-inline" action="{{route('rejetee',compact('demande'))}}" method="GET">
                @csrf
                @method('GET')
                <div class="col-12">
                    <div class="mb-3">
                        <label for="reponse" class="form-label">Motif de la demande</label>
                        <textarea class="form-control" name="reponse" id="reponse" rows="3"></textarea>
                        @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-warning">Enregistrer</button>
           </form>

        </div>
   </div>
@endsection
