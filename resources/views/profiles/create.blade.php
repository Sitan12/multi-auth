@extends('layouts.app')

@section('content')
<div class="container py-4">
<h1 style="font-size: 50px; text-align:center;">Mettre A Jour mon Profil</h1>
<hr/>
    <form class="row card" action="{{ route('profiles.store', $user) }}" method="POST" >
    @csrf
    <div class="col-md-8 ">
    <div class="mb-3">
        <div class="mb-3">
            <label for="telephone" class="form-label" class="telephone" style=" color: #143959; font-size:19px" >Numero de telephone</label>
            <input type="tel" class="form-control" id="telephone" name="numero" required>
        </div>
        <div class="mb-3">
            <label for="adresse" class="form-label" style=" color: #143959; font-size:19px">Adresse</label>
            <input type="text" class="form-control" id="adresse" name="adresse">
        </div>
        <button type="submit" class="btn btn-success btn-lg btn-block pt-1 mb-3" style="font-size: 25px; " >Ajouter au Profil</button>
    </div>
  </form>
</div>
@endsection