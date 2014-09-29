<?php
namespace App\Http\Controllers;

use App\Model\User;
use Illuminate\Routing\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Contracts\Auth\Authenticator;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    protected $auth;
    public function __construct(Authenticator $auth)
    {
        $this->auth = $auth;
        $this->beforeFilter('book',['only'=>'getSettings']);
    }
    public function getLogin()
    {
        return view('user/login');
    }
    public function postLogin(UserRequest $request)
    {
        $input = $request->only('username','password');
        if($this->auth->attempt($input))
        {
            return redirect("/book");
        }
        else
        {
            return redirect("/user/login")
                ->with('mismatch','Username password miss-match');
        }
    }
    public function getLogout()
    {
        $this->auth->logout();
        return redirect("/user/login")
            ->with("message","user successfully logged out");
    }
    public function getRegister()
    {
        return view("user/register");
    }
    public function postRegister(UserRequest $request)
    {
        $user = new User;
        $user->username = $request->input('username');
        $user->password = Hash::make($request->input('password'));
        $user ->save();
        return redirect('/user/login')
            ->with('message','Registered successfully');
    }
    public function getSettings()
    {
        $user = User::all();
        return view("user/settings",compact('user'));
    }
}