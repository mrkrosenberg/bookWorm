@extends('layouts.list')

@section('content')

    <div class="card card-body">
        <h3>{{$book->title}}</h3>
        <p>By: {{$book->author}}</p>
        <p>Published on: {{$book->pub_date}}</p>
            {{-- Form to delete book --}}
        <form action="/book/delete/{{$book->id}}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <a class="btn btn-primary" href="/indexByAuthor">Back to List</a>
            <button class="btn btn-danger">Remove book from list</button>
        </form>
    </div>

@endsection