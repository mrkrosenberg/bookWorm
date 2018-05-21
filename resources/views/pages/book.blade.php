@extends('layouts.app')

@section('content')
    <a href="/" class="btn btn-primary">Go Back</a>
    <h1>Book Detail Page</h1>
    <h3>{{$book->title}}</h3>
    <h3>{{$book->author}}</h3>
    <h3>{{$book->pub_date}}</h3>

    {{-- Form to delete book --}}
    <h3>Remove this book from list?</h3>
    {{-- <a href="/book/delete/{{$book->id}}" class="btn btn-danger">Remove Book</a> --}}
    <form action="/book/delete/{{$book->id}}" method="POST">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button class="btn btn-danger">Remove book from list</button>
    </form>
    

@endsection