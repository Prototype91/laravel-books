@extends('layouts.master')

@section('content')
<div style="width: 80%; margin: 0 auto; text-align: center;">
    {{$books->links()}}
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Auteurs</th>
                <th>Genre</th>
                <th>Date de publication</th>
                <th>Status</th>
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
                <td>
                    <a href="{{route('book.show', $book->id)}}"><span>Show</span></a>
                </td>
                <td>Supprimer</td>
            </tr>
            @empty
            aucun titre ...
            @endforelse
        </tbody>
    </table>
    {{$books->links()}}
    @endsection
</div>