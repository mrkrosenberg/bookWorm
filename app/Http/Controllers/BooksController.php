<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Image;

class BooksController extends Controller
{
  
    // Index routes for sorting by author and title
    public function indexByAuthor()
    {
        $books = Book::all('author', 'asc')->paginate(50);

        return view('pages.books')->with('books', $books);
    }

      public function indexByTitle()
    {
        $books = Book::orderBy('title', 'desc')->paginate(50);

        return view('pages.books', compact('books'));
    }


    // Create new book
    public function store(Request $request)
    {
        $this->validate(request(), [
            'title' => 'required',
            'author' => 'required',
            'pub_date' => 'required'
        ]);

        $book = new Book;

        $book->title = $request->title;
        $book->author = $request->author;
        $book->pub_date = $request->pub_date;

        // save image (using intervention/image)
        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);

            $book->image = $filename;
        }

        $book->save();

        return redirect('/indexByAuthor')->with('success', 'Book Added To Your List');

    }

 
    // Show selected book
    public function show(Book $id)
    {

        return view('pages.book')->with('book', $id);

    }


    // Delete Book from database
    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();
        return redirect('/indexByAuthor')->with('success', 'Removed Book From List');
    }
}
