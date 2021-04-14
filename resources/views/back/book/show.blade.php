@extends('layouts.master')

@section('content')
<div style="width: 80%; margin: 0 auto; text-align: center">
    @if(!empty($book->title))
    <h1 style="margin-bottom: 20px;">{{$book->title}}</h1>
    @endif
    <div style="margin-right: 20px;">
        @if(!empty($book->picture))
        <a href="#">
            <img src="{{asset('images/'.$book->picture->link)}}">
        </a>
        @endif
    </div>
</div>
<div style="width: 80%; margin: 0 auto;">
    <div class="description">
        <h2>Description :</h2>
        <p>{{$book->description}}</p>
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
</div>
@endsection