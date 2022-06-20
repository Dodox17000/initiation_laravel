@extends('layouts.base')

@section('titre')
   {{ $article->titre}}
@endsection

@section('contenu')
<div class='row text-center'>
    @if(session('success'))
        <div class='alert alert-success'>
            {{session('success')}}
        </div>
    @endif
</div>
<div class='row text-center mt-5'>
    <h3>{{ $article->titre}}</h3>
</div>
<div class='row text-center mt-5'>
    <p>{{ $article->contenu }} </p>
</div>
<div class='row text-center mt-5'>
    <p>{{ $article->category->name }} </p>
</div>
@endsection