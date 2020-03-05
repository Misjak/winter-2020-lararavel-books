<?php

namespace App\Http\Controllers;

use App\Book;
use App\Bookshop;
use Illuminate\Http\Request;

class BookshopController extends Controller
{
    public function index()
    {
        $bookshops = BookShop::all();
        return view('bookshops.index', compact('bookshops'));
    }

    public function create()
    {
        return view('bookshops.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'city' => 'required|max:255'
        ]);

        $bookshop = Bookshop::create($data);

        session()->flash('success_message', 'Bookshop ' . $bookshop->name . '  created');

        return redirect(action('BookshopController@index'));
    }


    public function show($id)
    {
        $bookshop = Bookshop::findOrFail($id);

        $books    = Book::all();
        return view('bookshops.show', compact('bookshop', 'books'));
    }


    public function addBook(Request $request, $id)
    {
        $bookshop = Bookshop::findOrFail($id);
        $book = $request->input('book');

//        if($bookshop->books()->find($book) === null){
            $bookshop->books()->attach($book);
//        }

//        previous block of code can be replaced by:
//        $bookshop->books()->syncWithoutDetaching($book);

        return redirect()->back();

//        following lines are equal:
//        return $bookshop->books;
//        return $bookshop->books()->get();

//        second syntax is neccessary if we want to f.e. some conditions
//        return $bookshop->books()->where('id','<', 5)->get();

//        to return SQL query - for debug purposes
//        return $bookshop->books()->where('id', '<', 5)->toSql();
    }


    public function removeBook(Request $request, $id){
        $bookshop = Bookshop::findOrFail($id);
        $book = $request->input('book');

        $bookshop->books()->detach($book);

        return redirect()->back();
    }
}

