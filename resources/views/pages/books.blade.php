@extends('layouts.list')

@section('content')


    @if(count($books) > 0)
        <div class="container mt-2">
            <a class="btn btn-primary" href="/indexByAuthor">Sort By Author</a>
            <a class="btn btn-primary" href="/indexByTitle">Sort By Title</a>
        </div>
            <div class="items mb-5">
                @foreach($books as $book)
                        <div class="item">
                            <h3 class="title">
                                <a href="/book/{{$book->id}}">{{$book->title}}</a>
                                <p>By {{$book->author}}</p>
                            </h3>
                        </div>
                @endforeach
            </div>

        <hr>
    @else
        <div class="card mb-5">
            <div class="card-body book-info">
                <p>Your Reading List is empty</p>
                <p>Add a new book below!</p>
            </div>
        </div>
    @endif


    {{-- Form for adding books --}}
    <h1>Add a new book to your list</h1>

    {{-- error handling for browsers that don't support html5 validation --}}
    @include('partials.errors')

    <form action="/book" method="POST">

        {{ csrf_field() }}

        <div class="form-group">
            <input type="text" class="form-control" id="title" name="title" placeholder="Book Title" required>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="author" name="author" placeholder="Author" required>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="pub_date" name="pub_date" placeholder="Publication Date" required>
        </div>
        <div class="form-group">
            <textarea class="form-control" name="notes" id="notes" placeholder="Enter Notes Here" cols="30" rows="5" maxlength="190" required></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save Book</button>
        </div>
       
    </form>

@endsection

@section('footer')
    <script src="{{asset('js/slider.js')}}"></script>
@endsection

{{-- <script src="{{asset('js/slider.js')}}" ></script> --}}