<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Genre;

class FrontController extends Controller
{

    public function __construct()
    {
        // méthode pour injecter des données à une vue partielle 
        view()->composer('partials.menu', function ($view) {
            $genres = Genre::pluck('name', 'id')->all(); // on récupère un tableau associatif ['id' => 1]
            $view->with('genres', $genres); // on passe les données à la vue
        });
    }

    public function index()
    {
        $books = Book::published()->paginate(5);

        return view('front.index', ['books' => $books]);
    }

    public function show(int $id)
    {
        $book = Book::find($id);
        return view('front.show', ['book' => $book]);
    }

    public function showBookByAuthor(int $id)
    {
        $author = Author::find($id);
        $books = $author->books()->paginate(5);

        return view('front.author', ['books' => $books, 'author' => $author]);
    }

    public function showBooksByGenre(int $id)
    {
        $genre = Genre::find($id);

        $books = $genre->books()->paginate(5);

        return view('front.genre', ['books' => $books, 'genre' => $genre]);
    }
}
