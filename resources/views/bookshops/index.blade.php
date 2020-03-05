@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Bookshops</h1>

        <a class="btn btn-primary" href="{{ action('BookshopController@create') }}">Create</a>

        @if(Session::has('success_message'))
            <div class="alert alert-success">
                {{ Session::get('success_message') }}
            </div>
        @endif

        @foreach($bookshops as $b)
            <div>
                <h3>{{ $b->name }}</h3>
                <p>{{ $b->city }}</p>
            </div>
        @endforeach
    </div>
@endsection
