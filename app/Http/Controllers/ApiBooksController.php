<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Book;
use App\Http\Resources\BookResource;

class ApiBooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all books
        $books = Book::orderBy('created_at', 'desc')->paginate(10);

        // return collection of books as a resource
        return BookResource::collection($books);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::findOrFail($id);

        return new BookResource($book);

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
        $book = Book::findOrFail($id);

        if($book->delete()) {
            return new BookResource($book);
        }
    }
}
