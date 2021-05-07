<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// use Illuminate\Routing\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// // retourne une ressource en fonction de son id
// Route::get('book/{id}', function ($id) {
//     return App\Book::find($id);
// });

Auth::routes();

// routes sécurisées
// Route::resource('admin/book', 'BookController')->middleware('auth');

// Page d'accueil
Route::get('/', 'FrontController@index');

// Route pour afficher un livre, route sécurisée
Route::get('book/{id}', 'FrontController@show')->where(['id' => '[0-9]+']);

Route::get('author/{id}', 'FrontController@showBookByAuthor')->where(['id' => '[0-9]+']);

Route::get('genre/{id}', 'FrontController@showBooksByGenre')->where(['id' => '[0-9]+']);

Route::get('/home', 'HomeController@index')->name('home');

Route::post('search', 'FrontController@search');

Route::middleware(["auth", "checkElevation"])->group(function() {
    Route::resource('admin/book', 'BookController');
});


