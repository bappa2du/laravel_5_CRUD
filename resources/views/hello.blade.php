    @if(Session::has("message"))
            <li>{!! Session::get("message") !!}</li>
    @endif
{!! 'Thank you laravel' !!}