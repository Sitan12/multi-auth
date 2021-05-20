@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <h1>{{ __('Mes informations') }}</h1>
        <div class="col-md-2">
            <img src="data:image/png;base64,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"
             alt="" class="ronded-circle ml-5" width="100px" >
         </div>
         <div class="col-md-8">
                <div>
                    <h3 class="mr-3">{{ $user->name }}</h3>
                    <div>Email: {{ $user->email }}</div>
                    
                    <a href="{{ route('profiles.create', [$user->name]) }}" class="btn btn-success">Mettre A Jour</a>
                    <a href="{{ route('profiles.edit', [$user->name]) }}" class="btn btn-primary">Modifier mes informations</a>
    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection