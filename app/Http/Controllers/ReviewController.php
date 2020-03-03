<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;

class ReviewController extends Controller
{
    public function store(Request $request, $book_id)
    {
        // validate the request
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'review' => 'required|max:255'
        ]);

        // create a new review (make sure to attach it to the right Book)
        $review = new Review;
        $review->book_id = $book_id;
        $review->name = $request->input('name');
        $review->email = $request->input('email');
        $review->review = $request->input('review');
        $review->save();

        // send success message
        session()->flash('success_message', 'Review saved.');

        // redirect
        return redirect()->action('BookORMController@show', $book_id);
    }
}
