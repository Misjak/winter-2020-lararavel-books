{{--resourcers/views/books/create.blade.php--}}
<form action="/books-orm" method="post" enctype="multipart/form-data">
    @csrf
    <label>Title</label><br>
    <input type="text" name="title"><br>
    <br>
    <label>Authors</label><br>
    <input type="text" name="authors"><br>
    <br>
    <label for="">Image</label><br>
    <input type="file" name="image_file"><br>
    <br>
    <label for="">Publisher</label><br>
    <br>
    <select name="publisher_id">
        @foreach($publishers as $publisher)
            <option value="{{ $publisher->id }}">
                {{ $publisher->title }}
            </option>
        @endforeach
    </select><br>
    <br>
    <input type="submit" value="submit">
</form>
