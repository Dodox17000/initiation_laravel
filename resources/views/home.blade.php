@extends('layouts.base')
@section('titre')
    {{$titre}}
@endsection
@section('contenu')
<h1>{{$titre}}</h1>
 <p>Path : {{$path}}</p>
 <p>method : {{$method}}</p>
 <p>url : {{$url}}</p>
 <p>ip : {{$ip}}</p>
@endsection