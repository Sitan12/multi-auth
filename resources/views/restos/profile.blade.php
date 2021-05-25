@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <h1>{{ __('Mes informations') }}</h1>
        
         <div class="col-md-8">
                <div>
                    <h3 class="mr-3">{{ $user->name }}</h3>
                    <div>Email: {{ $user->email }}</div>
                    <div>Telephone: {{ $user->profiler->telephone }}</div>
                    <div>Lieu: {{ $user->profiler->adresse }}</div>
                    <div>Categorie: {{ $user->profiler->categorie }}</div>
                    <div>Reseau social: {{ $user->profiler->reseausocial }}</div>
                    <a href="{{ route('restaurant.EditProfile', [$user->name]) }}" class="btn btn-primary">Mettre A Jour Mon profile</a>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
