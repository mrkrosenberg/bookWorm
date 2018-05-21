<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Image;

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

        return view('pages.books', compact('books'));
    }

      public function indexByTitle()
    {
        $books = Book::orderBy('title', 'desc')->paginate(50);

        return view('pages.books', compact('books'));
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
        $this->validate(request(), [
            'title' => 'required',
            'author' => 'required',
            'pub_date' => 'required'
        ]);

        // Book::create([
        //     'title' => request('title'),
        //     'author' => request('author'),
        //     'pub_date' => request('pub_date'),
        //     'image' => request('file')
        // ]);

        $book = new Book;

        $book->title = $request->title;
        $book->author = $request->author;
        $book->pub_date = $request->pub_date;

        // save image (using intervention/image)
        if ($request->hasFile('file')) {
            $image = $request->file('file');
            // gives the image a time stamp identifier
            $filename = time() . '.' . $image->getClientOriginalExtension();
            // set location to the public folder
            $location = public_path('images/' . $filename);
            // make an image object and configure optional settings
            // save it at the specified location
            Image::make($image)->resize(800, 400)->save($location);

            // saves the image file name in the database (for later reference)
            $book->image = $filename;
        }

        $book->save();

        return redirect('/')->with('success', 'Book Added To Your List');

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
        $book = Book::find($id);
        $book->delete();
        return redirect('/')->with('success', 'Removed Book From List');
    }
}
