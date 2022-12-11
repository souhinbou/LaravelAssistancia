@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">{{_('')}}</div>

                <div class="card-body">
                    @if(session('status'))
                       <div class=" alert alert-success">
                          {{session('status')}}
                       </div>
                    @endif
                        <div class="card-body">
                            {{_('Bienvenue Dans Assistancia')}} <br> <br>
                            <a href="{{route('demande.create')}}">Formulez une demande</a>
                        </div>
                </div>
            </div>

        </div>
    </div>
</div>
