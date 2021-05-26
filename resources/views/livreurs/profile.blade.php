@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <h1>{{ __('Mon Profile') }}</h1>
         <div class="col-md-8">
                <div>
                    <h3 class="mr-3">{{ $user->name }}</h3>
            
                    @foreach( $profiles as $profile)
                    @if($user->id === $profile->user_id)
                    <div>Nom: {{ $profile->nom }}</div>
                    <div>Prenom: {{ $profile->prenom }}</div>
                    <div>Adresse: {{ $profile->adresse }}</div>
                    <div>Adresse Email: {{ $user->email }}</div>
                    <div>Telephone: {{ $profile->telephone }}</div>
                    <div>Numero d'identité: {{ $profile->CNI }}</div>
                    <div>Moyen de transport: {{ $profile->transport }}</div>
                    @endif
                    @endforeach
                    <a href="{{ route('livreur.EditProfile', [$user->name]) }}" class="btn btn-primary mt-3">Mettre A Jour</a>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
