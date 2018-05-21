<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Book;
use App\Http\Resources\BookResource;

class ApiBooksController extends Controller
{
  // Get collection of all books
    public function index()
    {
        
        $books = Book::orderBy('author', 'asc')->paginate(30);

        return BookResource::collection($books);
      
    }


    // Create new book resource
    public function store(Request $request)
    {
        // conditional for update function
        $book = $request->isMethod('put') ? Book::findOrFail($request->book_id) : new Book;

        // creates new db entry
        $book->id = $request->input('book_id');
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->pub_date = $request->input('pub_date');

        if($book->save()) {
            return new BookResource($book);
        }
    }


    // Show one specific book
    public function show($id)
    {
        $book = Book::findOrFail($id);

        return new BookResource($book);

    }


    // Delete book from database
    public function destroy($id)
    {
        $book = Book::findOrFail($id);

        if($book->delete()) {
            return new BookResource($book);
        }
    }
}
