<?php

namespace App\Http\Controllers;

use DB;

class BookController extends Controller
{
    public function index()
    {

        return null;
        $name    = 'Slavo';
        $surname = "Kozar";

//        $view = view('books')
//            ->with('user', $name)
//            ->with('surname', $surname);

//        $view = view('books')
//            ->with([
//                'user' => $name,
//                'surname' => $surname
//            ]);

//        $view = view('books', [
//                'user' => $name,
//                'surname' => $surname
//            ]);

        $user = 'Slavo';

        $comment = "I <strong>like</strong> your app!";
        $age     = 20;

        //version without pagination
        $books = DB::select('SELECT * FROM `books`');

        //version with pagination
        $page = 1;
        if (isset($_GET[ 'page' ]) && $_GET[ 'page' ] >= 1) {
            $page = $_GET[ 'page' ];
        }
        $offset = ($page - 1) * 4;

        $books = DB::select('SELECT * FROM `books` OFFSET LIMIT ' . $offset . ', 4');

        $view  = view('books',
            compact('user', 'surname', 'comment', 'age', 'books')
        );
        return $view;
    }
}
