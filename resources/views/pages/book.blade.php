@extends('layouts.list')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <div class="card card-body book-info">
                <h3>{{$book->title}}</h3>
                <p>By: {{$book->author}}</p>
                <p>Published on: {{$book->pub_date}}</p>
                <p>{{$book->notes}}</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-body">
                    {{-- Form to delete book --}}
                    <form action="/book/delete/{{$book->id}}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <a class="btn btn-primary mb-5" href="/indexByAuthor">Back to List</a>
                        <br/>
                        <button class="btn btn-danger">Remove book from list</button>
                    </form>

            </div>
        </div>
    </div>

@endsection