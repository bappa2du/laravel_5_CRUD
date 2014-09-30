<?php
namespace App\Http\Controllers;

use App\Model\Settings;
use App\Model\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Contracts\Auth\Authenticator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    protected $auth;
    public function __construct(Authenticator $auth)
    {
        $this->auth = $auth;
        $this->beforeFilter('book',['only'=>['getSettings','getSettingsEdit']]);
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
        try
        {
            $user = new User;
            $user->username = $request->input('username');
            $user->password = Hash::make($request->input('password'));
            $user ->save();


            $settings = new Settings;
            /*
             * default privilege only create book
             */
            $settings -> user_id = $user->id;
            $settings -> create_book = 1;
            $settings -> edit_book = 0;
            $settings -> delete_book = 0;
            $settings -> save();
            return redirect('/user/login')
                ->with('message','Registered successfully');
        }
        catch(QueryException $e)
        {
            return redirect('/user/register')
                ->with('message','Username not available');
        }
    }
    public function getSettings()
    {
        $settings = DB::table('users')
            ->leftJoin('usersettings', 'users.id', '=', 'usersettings.user_id')
            ->get();
        //$settings = Settings::all();
        return view("user/settings",compact('settings'));
    }
    public function getSettingsEdit($id)
    {
        $settings = DB::table('users')
            ->join('usersettings','users.id','=','usersettings.user_id')
            ->where('usersettings.id','=',$id)
            ->get();
        $settings = $settings[0];

        return view("user/settings/edit",compact('settings'));

    }
    public function putSettingsEdit($id,Request $request)
    {
        $settings =Settings::find($id);
        if($request->input('create_book') === 'create'){$m = 1;}else{$m=0;}
        $settings->create_book = $m;
        if($request->input('edit_book') === 'edit'){$m = 1;}else{$m=0;}
        $settings->edit_book = $m;
        if($request->input('delete_book') === 'delete'){$m = 1;}else{$m=0;}
        $settings->delete_book = $m;


        $settings->save();
        return redirect("/user/settings")
            ->with('message','Settings updated');
    }
}