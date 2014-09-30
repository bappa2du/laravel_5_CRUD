<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Http\Requests\BookRequest;
use App\Model\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function __construct()
    {
        $this -> beforeFilter('book');
        $this -> beforeFilter('create_book',['only'=>['getCreate','postStore']]);
        $this -> beforeFilter('edit_book',['only'=>['getEdit','putUpdate']]);
        $this -> beforeFilter('delete_book',['only'=>'getDelete']);
    }
    public function getIndex()
    {
        $book = Book::paginate(3);
        $settings = DB::table('users')
            ->join('usersettings', 'users.id', '=', 'usersettings.user_id')
            ->where('users.id','=',Auth::user()->id)
            ->get();
        $settings = $settings[0];
        return view("book.index")
            ->with(compact("book"))
            ->with(compact('settings'));
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