<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Model\Book;

class BookController extends Controller
{
    public function getIndex()
    {
        $book = Book::all();
        return view("book.index",compact('book'));
    }   
    public function getCreate()
    {
        return view("book.create");
    }
    public function postStore(Request $request)
    {
        $input = $request->all();
        Book::create($input);
        return redirect('/book')
            ->with('message','Data inserted successfully');
    }
    public function getDelete(Request $request,$id)
    {
        Book::find($id)->delete();
        return redirect('/book')
            ->with('message','Successfully Deleted');
    }
    public function getEdit($id)
    {
        $book = Book::find($id);
        return view("/book/edit",compact('book'));
    }
    public function putUpdate(Request $request,$id)
    {
        $input = $request->all();
        $book = Book::find($id);
        $book->update($input);
        return redirect('/book')
            ->with('message','Successfully updated');
    }
}