    @extends('layouts.app')
    
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