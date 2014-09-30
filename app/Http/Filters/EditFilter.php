<?php
namespace App\Http\Filters;

use App\Model\Settings;
use Illuminate\Contracts\Auth\Authenticator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EditFilter
{

    protected $auth;

    public function __construct(Authenticator $authenticator)
    {
        $this->auth = $authenticator;
    }

    public function filter()
    {
        $settings = DB::table('users')
            ->join('usersettings', 'users.id', '=', 'usersettings.user_id')
            ->where('users.id','=',Auth::user()->id)
            ->get();
        $settings = $settings[0];
        if ($settings->edit_book != '1')
        {
            return redirect("/book")
                ->with("message", "Edit Book operation Unauthorized for you");
        }
    }

}
