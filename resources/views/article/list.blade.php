@extends('layouts.base')

@section('titre')
   Liste Article
@endsection

@section('contenu')
<div class='row text-center mt-5'>
    <h3>Liste des articles</h3>
</div>
<div class='row mt-5'> 
    <div class="col-8 offset-2">
        <a style='margin-bottom:2.5rem;align-item:center;'href="{{route('article_add')}}"class="btn btn-outline-success">
            <i class="fa-solid fa-file-plus"></i>Ajouter un article
        </a>
    <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Titre</th>
            <th scope="col">Résumé</th>
            <th scope="col">Categories</th>
            <th scope="col">Date de Création</th>
            <th scope="col">Voir</th>
            <th scope="col">Éditer</th>
            <th scope="col">Supprimer</th>
        </tr>
        </thead>
        <tbody>
            @foreach($articles as $article)
          <tr>
            <th scope="row">{{$article->id }}</th>
            <td>{{ $article->titre }}</td>
            <td>{{ $article->contenu }}</td>
            <td>{{ $article->category->name }}</td>
            <td>{{ $article->created_at }}</td>
            <td>
                <a href="{{route('article_detail', ['id' =>$article->id])}}"class="btn btn-outline-primary">
                    <i class="fa-solid fa-eye"></i>
                </a>
            </td>
            <td>
                @if(Auth::check())
                    <a href="{{route('article_editer', ['id' =>$article->id])}}" class="btn btn-outline-success">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                @endif
            </td>
            <td>
                @if(Auth::check())
                <a onclick="return confirm('Voulez-vous vraiment supprimer cet article ?')" href="{{ route('article_supprimer', ['id' =>$article->id]) }}" class="btn btn-outline-danger">
                    <i class="fa-solid fa-trash-can"></i>
                </a>
                @endif
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>        
    </div>
</div>
@endsection