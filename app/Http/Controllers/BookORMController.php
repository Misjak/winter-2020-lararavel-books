<?php

namespace App\Http\Controllers;

use App\Book;
use App\Publisher;
use Illuminate\Http\Request;

class BookORMController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);

        $publisher = $book->publisher;

        $booksByPublisher = $publisher ? $publisher->books : [];


        return view('books.show', compact('book'));
    }

    public function create(){
        $publishers = Publisher::all();
        return view('books.create', compact('publishers'));
    }

    public function store(Request $request){
        $book = new Book;

        $book->title = $request->input('title');
        $book->authors = $request->input('authors');
        $book->image = $request->input('image');
        $book->publisher_id = $request->input('publisher_id');

        $book->save();

    }

    public function edit($id){
        $book = Book::find($id);
        $publishers = Publisher::all();

        return view('books.edit', compact('book', 'publishers'));
    }

    public function update(Request $request, $id){
        $book = Book::findOrFail($id);

        $book->title = $request->input('title');
        $book->authors = $request->input('authors');
        $book->image = $request->input('image');
        $book->publisher_id = $request->input('publisher_id');

        $book->save();

        return redirect('/books-orm/' . $book->id);
    }


    public function delete($id){
        $book = Book::find($id);
        $book->delete();

        return redirect('/books-orm');
    }


}
