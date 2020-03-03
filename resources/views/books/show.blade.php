<div style="display:flex; flex-direction:row;margin-bottom:1rem">
    <div style="width: 15rem">
        <img src="{{$book->image}}" alt="{{ $book->title }}">
    </div>
    <div>
        <h1>{{ $book->title }}</h1>
        <p>{{ $book->authors }}</p>
        <p>Published by: {{ $book->publisher }}</p>
        <a href="{{ action('BookORMController@index') }}">
            Back to index
        </a>
    </div>
</div>

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(Session::has('success_message'))
    <div class="alert alert-success">
        {{ Session::get('success_message') }}
    </div>
@endif

<form action="{{ action('ReviewController@store', $book->id) }}" method="post">
    @csrf

    <input type="text" name="name" value="{{ old('name') }}" placeholder="Your name"><br>
    <br>

    <input type="email" name="email" value="{{ old('email') }}" placeholder="Your email address"><br>
    <br>

    <textarea name="review" cols="30" rows="10" placeholder="Write your review here">{{ old('review') }}</textarea><br>
    <br>

    <input type="submit" value="Submit review">

</form>

<h2>Reviews:</h2>

@foreach ($book->reviews as $review)

    <div class="review">
        <strong>{{ $review->name }}</strong><br>
        <br>
        <pre>{{ $review->review }}</pre>
    </div>

@endforeach