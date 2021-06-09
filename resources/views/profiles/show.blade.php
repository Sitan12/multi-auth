@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <h1>{{ __('Mon Profile') }}</h1>
        <div class="col-md-2">
            <img src="/photoProfile/{{ $user->profile->photo }}" alt="" class="ronded-circle ml-5" width="100px" >
         </div>
         <div class="col-md-8">
                <div>
                    <h3 class="mr-3 mb-3 ">{{ $user->name }}</h3>
                    <div>Votre Adresse Email: {{ $user->email }}</div>
                    <div>Votre Adresse Tel: {{ $user->profile->numero }}</div>
                    <div>Votre Adresse Adresse: {{ $user->profile->adresse }}</div>
                
                    <a href="{{ route('profiles.edit', [$user->name]) }}" class="btn btn-primary mt-3">Mettre A Jour</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
