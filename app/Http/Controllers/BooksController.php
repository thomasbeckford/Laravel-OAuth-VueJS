<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\BookResource as BooksResource;
use App\Book;

class BooksController extends Controller
{

    public function index()
    {

        return Book::all();
    }

    public function show($id)
    {
        return Book::find($id);
    }

    public function store(Request $request)
    {
        $userid = $request->user()->id;
        $request->request->add(['user_id' => $userid]);
        return Book::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $book->update($request->all());

        return $book;
    }

    public function delete(Request $request, $id)
    {

        $userid = $request->user()->id;
        $book = Book::findOrFail($id);
        
        if($book->user_id == $userid){
          $book->delete();
        return 204;

        } else {
        
        return 409;
        }

    }

}
