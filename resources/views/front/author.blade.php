@extends('layouts.master')

@section('content')
<div style="width: 80%; margin: 0 auto; text-align: center">
    <h1>Tous les livres de l'auteur : {{$author->name}}</h1>
    {{$books->links()}}
</div>

<ul class="list-group">
    @forelse($books as $book)
    <li class="list-group-item" style="padding: 20px; width: 80%; margin: 0 auto; margin-bottom: 20px;">
        <h2><a href="{{url('book', $book->id)}}">{{$book->title}}</a></h2>
        <div style="display: flex;">
            <div style="margin-right: 20px;">
                <a href="#">
                    <img width="171" src="{{asset('images/'.$book->picture->link)}}" alt="{{$book->picture->title}}">
                </a>
            </div>
            <div>
                {{$book->description}}
            </div>
        </div>
        <h3>Liste des autres Auteur(s) :</h3>
        <ul>
            @forelse($book->authors as $relationAuthor)
            <li><a href="{{url('author', $author->id)}}">{{$relationAuthor->name}}</a></li>
            @empty
            <li>Aucun auteur</li>
            @endforelse
        </ul>
    </li>
    @empty
    <li>Désolé pour l'instant aucun livre n'est publié sur le site</li>
    @endforelse
</ul>
<div style="width: 80%; margin: 0 auto; text-align: center">
    {{$books->links()}}
</div>
@endsection