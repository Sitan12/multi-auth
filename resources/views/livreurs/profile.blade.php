@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <h1>{{ __('Mes informations') }}</h1>
         <div class="col-md-8">
                <div>
                    <h3 class="mr-3">{{ $user->name }}</h3>
                    <div>Adresse Email: {{ $user->email }}</div>
                    <div>Moyen de transport: {{ $user->profilelivreur->transport }}</div>
                
                    <a href="{{ route('profiles.edit', [$user->name]) }}" class="btn btn-primary mt-3">Mettre A Jour le profile</a>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
