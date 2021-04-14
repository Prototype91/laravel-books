@extends('layouts.master')

@section('content')
<div style="width: 80%; margin: 0 auto;">
    <div>
        <h1>Modifier le Livre : </h1>
        <form action="{{route('book.update', $book->id)}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{method_field('PUT')}}
            <div>
                <div>
                    <label for="title">Titre :</label> <br>
                    <input type="text" name="title" value="{{$book->title}}" id="title" placeholder="Titre du livre">
                    @if($errors->has('title')) <span class="error">{{$errors->first('title')}}</span>@endif
                </div>
                <div>
                    <label for="price">Description :</label> <br>
                    <textarea type="text" name="description">{{$book->description}}</textarea>
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
                <input name="authors[]" value="{{$id}}" @if( is_null($book->authors) == false and in_array($id, $book->authors()->pluck('id')->all()))
                checked
                @endif
                type="checkbox"
                id="author{{$id}}">
                <label for="author{{$id}}">{{$name}}</label> <br>
                @empty
                @endforelse
            </div>
    </div>
    <div>
        <div>
            <h2>Status</h2>
            <input type="radio" @if($book->status == 'published') checked @endif name="status" value="published" checked> publié<br>
            <input type="radio" @if($book->status == 'unpublished') checked @endif name="status" value="unpublished"> non-publié<br>
        </div>
        <div>
            <h2>Fichier :</h2>
            <input type="file" name="picture">
            @if($errors->has('picture')) <span class="error bg-warning text-warning">{{$errors->first('picture')}}</span> @endif
        </div>
        @if($book->picture)
        <div>
            <h2>Image associée : </h2>
            <img src="{{asset('images/'.$book->picture->link)}}" alt="">
        </div>
        @endif
    </div> <br>
    <button class="btn btn-primary" type="submit">Modifier le Livre</button>
    </form>
</div>
@endsection