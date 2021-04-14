@extends('layouts.master')

@section('content')
<div style="width: 80%; margin: 0 auto; text-align: center; display: flex; flex-direction: column; justify-content: cneter;">
    <div>
        <button style="padding: 0; outline: none;"><a class="btn btn-primary" href="{{route('book.create')}}">Ajouter un Livre</a></button>
    </div>
    <div>
        {{$books->links()}}
    </div>
    @include('back.book.partials.flash')
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Auteurs</th>
                <th>Genre</th>
                <th>Date de publication</th>
                <th>Status</th>
                <th>Édition</th>
                <th>Show</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody>
            @forelse($books as $book)
            <tr>
                <td>{{$book->title}}</td>
                <td>
                    @forelse($book->authors as $author)
                    {{$author->name}}
                    @empty
                    aucun auteur
                    @endforelse
                </td>
                <td>{{$book->genre->name?? 'aucun genre' }}</td>
                <td>{{$book->created_at}}</td>
                <td>Status TODO</td>
                <td><a href="{{route('book.edit', $book->id)}}">Édition</a></td>
                <td>
                    <a href="{{route('book.show', $book->id)}}"><span>Show</span></a>
                </td>
                <td>
                    <form class="delete" method="POST" action="{{route('book.destroy', $book->id)}}">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <input class="btn btn-danger" type="submit" value="Supprimer">
                    </form>
                </td>
            </tr>
            @empty
            aucun titre ...
            @endforelse
        </tbody>
    </table>
    <div>
        {{$books->links()}}
    </div>
    @endsection
</div>
@section('scripts')
@parent
<script src="{{asset('js/confirm.js')}}"></script>
@endsection