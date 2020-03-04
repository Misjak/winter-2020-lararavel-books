<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Book;

class BookQueryBuilderController extends Controller
{
    public function index()
    {
        // $query = DB::table('books')
        //     ->limit(10)
        //     ->orderBy('title', 'asc');

        // $data = $query->get();


        // $books = Book::query()
        //     ->limit(10)
        //     ->orderBy('title', 'asc')
        //     ->where('title', 'like', 'A%')
        //     ->get();
        //     // ->pluck('authors', 'title');

        // dd($books);

        $books = Book::query()
            ->orderBy('title', 'asc')
            ->with('publisher')
            ->with('reviews')
            ->paginate(100);

        return view('books.page', compact('books'));
    }
}
