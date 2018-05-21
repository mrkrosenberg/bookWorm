<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexByAuthor()
    {
        $books = Book::orderBy('author', 'asc')->paginate(50);
        // $books = Book::all('title');

        return view('pages.books')->with('books', $books);
    }

      public function indexByTitle()
    {
        $books = Book::orderBy('title', 'desc')->paginate(50);

        return view('pages.books')->with('books', $books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // call index function from here to re-render the page
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'author' => 'required',
            'pub_date' => 'required'
        ]);

        // create new book
        // $book = new Book;
        // $book->title = $request->input('title');
        // $book->author = $request->input('author');
        // $book->pub_date = $request->input('pub_date');

        // save the new book 
        // $book->save();

        $book = Book::create([
            'title' => request('title'),
            'author' => request('author'),
            'pub_date' => request('pub_date')
        ]);

        return redirect('/')->with('success', 'Book Added To Your List');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);
        // $post = Post::where('title', $id);
        return view('pages.book')->with('book', $book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
