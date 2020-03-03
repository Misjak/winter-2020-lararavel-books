<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Books (paginated)</title>

    <style>

        .pagination {
            display: flex;
        }

        .page-item {
            list-style-type: none;
            margin: 0.5em;
            border: 1px solid black;
            padding: 0.25em;
        }
    </style>
</head>
<body>

    {{ $books->links() }}

    <hr>

    @foreach ($books as $book)

        <div class="book" style="margin-bottom: 1em">
            <h2>{{ $book->title }}</h2>
            By {{ $book->authors }}
        </div>

    @endforeach

    <hr>

    {{ $books->links() }}

    
</body>
</html>