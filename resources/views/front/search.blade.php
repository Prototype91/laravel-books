@extends('layouts.master')

@section('content')
<form action="{{url('search')}}" method="POST" style="text-align: center; margin: 20px 0 20px 0">
    {{csrf_field()}}
    <h2>Rechercher un Livre :</h2>
    <input type="text" name='searchInput'>
    <button type="submit">Rechercher</button>
</form>
<ul class="list-group">
    @forelse($books as $book)
    <li class="list-group-item" style="padding: 20px; width: 80%; margin: 0 auto; margin-bottom: 20px;">
        <h2><a href="{{url('book', $book->id)}}">{{$book->title}}</a></h2>
        <div style="display:flex;">
            @if($book->picture)
            <div style="margin-right: 20px;">
                <a href="#">
                    <img src="{{asset('images/'.$book->picture->link)}}">
                </a>
            </div>
            @endif
            <div>
                {{$book->description}}
            </div>
        </div>
        <div class="author">
            <h3>Auteur(s) :</h3>
            <ul>
                @forelse($book->authors as $author)
                <li><a href="{{url('author', $author->id)}}">{{$author->name}}</a></li>
                @empty
                <li>Aucun auteur</li>
                @endforelse
            </ul>
        </div>
    </li>
    @empty
    <li style="text-align: center">Désolé aucun article à afficher...</li>
    @endforelse
</ul>
@endsection