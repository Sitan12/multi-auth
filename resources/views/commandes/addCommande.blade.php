@extends('layouts.app')

@section('content')
<div class="container">
<div class="modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Passer ma commande</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body card">

      <form method="POST" action="{{ route('commande.add') }}" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group row">
                        <div class="col-md-6">
                            <label for="titre" class="col-md-4 col-form-label text-md-right">{{ __('Plat Commandé') }}</label>
                            <input id="titre" type="text" class="form-control @error('titre') is-invalid @enderror" name="titre" value="{{ old('titre') }}"  autocomplete="titre" autofocus>

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
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Confirmer</button>
        <button type="button" class="btn btn-primary">Annuler</button>
      </div> -->
    </div>
  </div>
</div>
</div>
@endsection
