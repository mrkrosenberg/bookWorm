@extends('layouts.list')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <div class="card card-body book-info">
                <table class="table">
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Publication Date</th>
                    </tr>
                    <tr>
                        <td>{{$book->title}}</td>
                        <td>{{$book->author}}</td>
                        <td>{{$book->pub_date}}</td>
                    </tr>
                </table>
                <hr>
                <h6>Notes:</h6>
                <p>{{$book->notes}}</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-body">
                    {{-- Form to delete book --}}
                    <form action="/book/delete/{{$book->id}}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <a class="btn btn-primary mb-5" href="/index">Back to List</a>
                        <br/>
                        <button class="btn btn-danger">Remove book from list</button>
                    </form>

            </div>
        </div>
    </div>

@endsection