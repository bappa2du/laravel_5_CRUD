<?php
namespace App\Http\Filters;

use Illuminate\Support\Facades\Auth;

class AdminFilter
{

    public function filter()
    {
        if(Auth::user()->username != 'admin')
        {
            return redirect('/book')
                ->with('message','Access Denied');
        }
    }

}
