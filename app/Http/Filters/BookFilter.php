<?php
namespace App\Http\Filters;

use Illuminate\Contracts\Auth\Authenticator;

class BookFilter
{

    protected $auth;

    public function __construct(Authenticator $authenticator)
    {
        $this->auth = $authenticator;
    }

    public function filter()
    {
        if ($this->auth->guest()) {
            return redirect("/user/login")
                ->with("message", "Please login to view this page");
        }
    }

}
