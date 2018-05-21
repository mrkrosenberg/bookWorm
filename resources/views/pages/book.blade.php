@extends('layouts.app')

@section('content')
    <a href="/" class="btn btn-primary">Go Back</a>
    <h1>Book Detail Page</h1>
    <h3>{{$book->title}}</h3>
    <h3>{{$book->author}}</h3>
    <h3>{{$book->pub_date}}</h3>

    {{-- Form to edit book information --}}
    <h3>Something Wrong? Edit book entry:</h3>
    <form action=""></form>

    {{-- Form to delete book --}}
    <h3>Remove this book from list?</h3>
    

@endsection