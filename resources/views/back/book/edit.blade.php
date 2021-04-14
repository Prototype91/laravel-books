@extends('layouts.master')

@section('content')
<div style="width: 80%; margin: 0 auto;">
    <div>
        <h1>Ajouter un Livre : </h1>
        <form action="{{route('book.store')}}" method="post">
            {{ csrf_field() }}
            <div>
                <div>
                    <label for="title">Titre :</label> <br>
                    <input type="text" name="title" value="{{old('title')}}" id="title" placeholder="Titre du livre">
                    @if($errors->has('title')) <span class="error">{{$errors->first('title')}}</span>@endif
                </div>
                <div>
                    <label for="price">Description :</label> <br>
                    <textarea type="text" name="description"></textarea>
                    @if($errors->has('description')) <span class="error bg-warning text-warning">{{$errors->first('description')}}</span> @endif
                </div>
            </div>
            <div>
                <label for="genre">Genre :</label>
                <select id="genre" name="genre_id">
                    <option value="0" {{ is_null(old('genre_id'))? 'selected' : '' }}>No genre</option>
                    @foreach($genres as $id => $name)
                    <option value="{{$id}}">{{$name}}</option>
                    @endforeach
                </select>
            </div>
            <h1>Choisissez un ou plusieurs Auteurs</h1>
            <div>
                @forelse($authors as $id => $name)
                <input name="authors[]" value="{{$id}}" type="checkbox" id="author{{$id}}">
                <label for="author{{$id}}">{{$name}}</label> <br>
                @empty
                @endforelse
            </div>
    </div>
    <div>
        <div>
            <h2>Status</h2>
            <input type="radio" name="status" value="published" checked> publier<br>
            <input type="radio" name="status" value="unpublished"> dépublier<br>
        </div>
        <div>
            <h2>Fichier :</h2>
            <input type="file" name="picture">
            @if($errors->has('picture')) <span class="error bg-warning text-warning">{{$errors->first('picture')}}</span> @endif
        </div>
    </div> <br>
    <button class="btn btn-primary" type="submit">Ajouter un livre</button>
    </form>
</div>
@endsection