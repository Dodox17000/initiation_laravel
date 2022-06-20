@extends('layouts.base')
@section('titre')
    Ajout d'un article
@endsection
@section('contenu')
<div class='container'>
   <h1>Ajout d'un article</h1>
   <form action="" method="POST">
       @csrf
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Titre</label>
        <input value="{{old('contenu')}}" type="text" name="titre" class="form-control @error('titre') is-invalid @enderror" id="exampleFormControlInput1" placeholder="Mettre titre">
      </div>
      @error('titre')
      <div class='alert alert-danger'>
        {{$message}}
      </div>
      @enderror
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Contenu de l'article</label>
        <textarea name="contenu" class="form-control @error('contenu') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3">{{old('contenu')}}</textarea>
      </div>
      @error('contenu')
      <div class='alert alert-danger'>
        {{ $message}} 
      </div>
      @enderror
      <div class="mb-3">
      <select name='category' class="form-select" aria-label="Default select example">
        @foreach($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
      </select>
      </div>
      <button type="submit" class="btn btn-primary">Ajouter</button>
   </form>
   @include('helpers.error')
</div>
@endsection