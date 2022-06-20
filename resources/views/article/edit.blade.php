@extends('layouts.base')
@section('titre')
Éditer l'article
@endsection
@section('contenu')
<div class='container'>
   <h1>Éditer l'article</h1>
   <form action="" method="POST">
       @csrf
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Modifier le Titre</label>
        <input type="text" name="titre" class="form-control" value='{{$article->titre}}' id="exampleFormControlInput1" placeholder="">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Modifier le Contenu</label>
        <textarea name="contenu" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$article->contenu}}</textarea>
      </div>
      <button type="submit" class="btn btn-success">Modifier</button>
   </form>
</div>
@endsection