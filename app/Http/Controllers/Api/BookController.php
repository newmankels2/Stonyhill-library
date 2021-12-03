<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Book;
use Illuminate\Http\Response;

class BookController extends Controller
{
    public function viewBook()
    {
        $book = Book::all();
        return response()->json($book, Response::HTTP_OK);
    }

    public function saveBook(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'desc' => 'required',
            'author' => 'required'
        ]);

        Book::create($request->all());

        return response()->json('Book saved succesfully');
    }

    public function updateBook(Request $request, $id)
    {
        $book = Book::find($id);
        $request->validate([
            'title' => 'required',
            'desc' => 'required',
            'author' => 'required'
        ]);

        $book->update($request->all());

        return response()->json('Book updated succesfully');
    }

    public function deleteBook($id)
    {
        $book = Book::find($id);
        $book->delete();
        return response()->json('Book deleted succesfully', Response::HTTP_OK);
    }

    public function searchBook($title)
    {
        $search = Book::where("title", "LIKE", "%".$title."%")->get();
    
        return response()->json($search, Response::HTTP_OK);
    
    }

}
