<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function getLogin()
    {
        return view('user/login');
    }
    public function postLogin(UserRequest $request)
    {
        $input = $request->all();
    }
    public function getRegister()
    {
        return view("user/register");
    }
}