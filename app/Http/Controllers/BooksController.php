<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\User;
use Image;

class BooksController extends Controller
{

    /**
     * Create a new controller instance
     * 
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function indexByAuthor()
    {
        $books = Book::orderBy('author', 'asc')->paginate(50);

        return view('pages.books', compact('books'));
    }

      public function indexByTitle()
    {
        $books = Book::orderBy('title', 'desc')->paginate(50);

        return view('pages.books', compact('books'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'title' => 'required',
            'author' => 'required',
            'pub_date' => 'required'
        ]);

        Book::create([
            'title' => request('title'),
            'author' => request('author'),
            'pub_date' => request('pub_date'),
            'notes' => request('notes'),
        ]);

        // $book = new Book;

        // $book->title = $request->title;
        // $book->author = $request->author;
        // $book->pub_date = $request->pub_date;
        // $book->notes = $request->notes;

        // $book->save();

        return redirect('/indexByAuthor')->with('success', 'Book Added To Your List');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $id)
    {

        return view('pages.book')->with('book', $id);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();
        return redirect('/indexByAuthor')->with('success', 'Removed Book From List');
    }
}
