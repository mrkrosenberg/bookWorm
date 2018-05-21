@extends('layouts.app')

@section('content')
    {{-- <a href="/indexByAuthor" class="btn btn-primary">Go Back</a> --}}
    @if($book->image)
        {{-- using asset helper creates a url --}}
        <img src="{{ asset('images/' . $book->image) }}" height="400" width="800">
    @endif
    <div class="card card-body">
        <h3>{{$book->title}}</h3>
        <p>By: {{$book->author}}</p>
        <p>Published on: {{$book->pub_date}}</p>
    </div>

    {{-- Form to delete book --}}
    <h3>Remove this book from list?</h3>
    {{-- <a href="/book/delete/{{$book->id}}" class="btn btn-danger">Remove Book</a> --}}
    <form action="/book/delete/{{$book->id}}" method="POST">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button class="btn btn-danger">Remove book from list</button>
    </form>
    

@endsection