<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Model\Book;

class BookController extends Controller
{
//    public function __construct()
//    {
//        $this -> beforeFilter('book',['only'=>['getDelete']]);
//    }
    public function getIndex()
    {
        $book = Book::all();
        return view("book.index",compact('book'));
    }   
    public function getCreate()
    {
        return view("book.create");
    }
    public function postStore(BookRequest $request)
    {
        $input = $request->all();
        Book::create($input);
        return redirect('/book')
            ->with('message','Data inserted successfully');
    }
    public function getDelete($id)
    {
        Book::find($id)->delete();
        return redirect('/book')
            ->with('message',"Successfully Deleted Book ");
    }
    public function getEdit($id)
    {
        $book = Book::find($id);
        return view("/book/edit",compact('book'));
    }
    public function putUpdate(BookRequest $request,$id)
    {
        $input = $request->all();
        $book = Book::find($id);
        $book->update($input);
        return redirect('/book')
            ->with('message','Successfully updated');
    }
}