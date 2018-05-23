@extends('layouts.app')

@section('content')

@include('partials.navbar2')

    @if($book->image)
        {{-- using asset helper creates a url --}}
        <img src="{{ asset('images/' . $book->image) }}" height="400" width="800">
    @endif
    <div class="card card-body">
        <h3>{{$book->title}}</h3>
        <p>By: {{$book->author}}</p>
        <p>Published on: {{$book->pub_date}}</p>
            {{-- Form to delete book --}}
        <form action="/book/delete/{{$book->id}}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button class="btn btn-danger">Remove book from list</button>
        </form>
    </div>


    

@endsection