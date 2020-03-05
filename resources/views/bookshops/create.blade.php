@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create bookshop</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ action('BookshopController@store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" name="city" value="{{ old('city') }}">
            </div>
            <button class="btn btn-primary" type="submit">Create</button>
        </form>
    </div>
@endsection
