@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Restaurant_Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Vous etes connecté !!!') }}

                    <!-- -----------------ADD FOOD----------------- -->
                    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Nouveau Plat
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter un nouveau plat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="{{ route('restaurant.addFood') }}" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group row">
                            <label for="titre" class="col-md-4 col-form-label text-md-right">{{ __('Titre') }}</label>

                            <div class="col-md-6">
                                <input id="titre" type="text" class="form-control @error('titre') is-invalid @enderror" name="titre" value="{{ old('titre') }}"  autocomplete="titre" autofocus>

                                @error('titre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('titre') }}"  autocomplete="description" autofocus>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="prix" class="col-md-4 col-form-label text-md-right">{{ __('Prix') }}</label>

                            <div class="col-md-6">
                                <input id="prix" type="int" class="form-control @error('prix') is-invalid @enderror" name="prix" value="{{ old('prix') }}"  autocomplete="prix">

                                @error('prix')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-8 offset-md-2 justify-content-center custom-file">

                                <input id="validatedCustomFile" type="file" class="custom-file-input @error('image') is-invalid @enderror" name="image" >
                                <label for="validatedCustomFile" class="custom-file-label">{{ __('Choisir une image du plat') }}</label>
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                             
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Valider') }}
                                </button>
                            </div>
                        </div>
                    </form>
        </div>
        </div>
    </div>
    </div>
    </div>
</div>
</div>
</div>

    <div class="row p-4 justify-content-center">
        <div class="col-md-8 card">
                <h2>Liste des commandes</h2>
                <table class="table">
            
              <thead>
                <tr>
                  <th scope="col">Num Commande</th>
                  <th scope="col">Titre</th>
                  <th scope="col">Prix</th>
                  <th scope="col">Image</th>
                  <th scope="col">Client</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
              @foreach($commandes as $commande)
              @if(Auth::user()->id === $commande->restaurant_id)
              <tr> 
                <td>{{ $commande->id }}</td>
                <td>{{ $commande->plat->titre }}</td>
                <td>{{ $commande->plat->prix }}</td>
                <td><img src="/imagePlats/{{ $commande->plat->image }}" alt="" class="ronded-circle" width="100"></td>
                <td>{{ $commande->user->name }}</td> 
                <td>
                <form method="post" action="{{ route('commande.update',$commande->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <select id="livreur_id" type="int"  name="livreur_id"  autocomplete="livreur_id">
                    @foreach($users as $user)
                    @if($user->role === 'livreur')
                    <option value="{{ $user->id }}" >{{ $user->name}} </option>
                    @endif
                    @endforeach
                </select>
                <button type="submit" class="btn btn-success" name="valider" id="valider">Valider</button>
                </form>
                </td>  
              </tr>
              @endif
              @endforeach
              </tbody>
              
                </table> 
        </div>
    </div>
</div>
@endsection
