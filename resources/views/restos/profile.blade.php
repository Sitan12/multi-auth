@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <h1>{{ __('Mes informations') }}</h1>
        
         <div class="col-md-8">
                <div>
                    <h3 class="mr-3">{{ $user->name }}</h3>
                    @foreach($profiles as $profile)
                    @if($user->id === $profile->user_id)
                    <div>Email: {{ $user->email }}</div>
                    <div>Telephone: {{ $profile->telephone }}</div>
                    <div>Lieu: {{ $profile->adresse }}</div>
                    <div>Categorie: {{ $profile->categorie }}</div>
                    <div>Reseau social: {{ $profile->reseausocial }}</div>
                    <a href="{{ route('restaurant.EditProfile', [$user->name]) }}" class="btn btn-primary">Mettre A Jour</a>
                    @endif 
                    @endforeach  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
