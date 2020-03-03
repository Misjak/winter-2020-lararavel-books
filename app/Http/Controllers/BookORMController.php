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

        // if in request there is a file named 'image_file'
        if ($file = $request->file('image_file')) {
            // handle the file upload
            //              input name           folder     disk
            // $request->file('image_file')->store('covers', 'uploads');

            $original_name = $file->getClientOriginalName();
            //              folder   new name for file    disk
            $file->storeAs('covers',   $original_name,  'uploads');
        }

        $book = new Book;

        $book->title = $request->input('title');
        $book->authors = $request->input('authors');
        $book->image = '/uploads/covers/'.$original_name;
        $book->publisher_id = $request->input('publisher_id', 0);

        $book->save();

        return redirect()->action('BookORMController@show', $book->id);
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
