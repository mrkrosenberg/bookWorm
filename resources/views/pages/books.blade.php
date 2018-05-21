@extends('layouts.app')

@section('content')
    <h1>Your Reading List:</h1>
    <a href="/indexByTitle">Sort by title</a>
    <a href="/">Sort by author</a>
        @if(count($books) > 0)
        <div class="items mb-5">
            @foreach($books as $book)
                    <div class="item">
                        <h3>{{$book->title}}</h3>
                    </div>
            @endforeach
        </div>
        <hr>
    @else
        <p>Your Reading List is empty</p>
    @endif

    {{-- Form for adding books --}}
    <h1>Add a new book to your list</h1>
    <form action="/book" method="POST">

        {{ csrf_field() }}

        <div class="form-group">
            <input type="text" class="form-control" id="title" name="title" placeholder="Book Title">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="author" name="author" placeholder="Author">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="pub_date" name="pub_date" placeholder="Publication Date">
        </div>
        <div class="form-group">
            <button type="submit" class="btn">Save Book</button>
        </div>
    </form>

@endsection