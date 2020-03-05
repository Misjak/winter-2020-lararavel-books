@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $bookshop->name }}</h1>
        <h3>{{ $bookshop->city }}</h3>

        <h3>Books:</h3>
        <form action="{{ action('BookshopController@addBook', [$bookshop->id]) }}" method="post">
            @csrf
            <select name="book" id="">
                @foreach($books as $book)
                    <option value="{{ $book->id }}">{{ $book->title }}</option>
                @endforeach
            </select>
            <button type="submit">Add</button>
        </form>

        @foreach($bookshop->books as $book)
            <div style="display:flex">
                <h4>{{ $book->title }}</h4>
                <form action="{{ action('BookshopController@removeBook', [$bookshop->id]) }}"
                      method="post">
                    @csrf
                    <input type="hidden" name="book" value="{{ $book->id }}">
                    <button type="submit">Remove</button>
                </form>

            </div>
        @endforeach
    </div>
@endsection
