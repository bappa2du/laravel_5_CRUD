<?php namespace App\Http\Filters;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Contracts\Auth\Authenticator;

class BookFilter {

    protected $auth;

    public function __construct(Authenticator $authenticator)
    {
        $this -> auth = $authenticator;
    }

	public function filter(Route $route, Request $request)
	{
		if($this->auth->guest())
        {
            return redirect("/book")
                ->with("message","Sorry.. Access-denied");
        }
	}

}
