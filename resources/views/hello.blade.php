<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<title>Book Shop</title>
	<link rel="stylesheet" href="{!! URL::asset('css/bootstrap.css') !!}" />
</head>
<body>
	    <div class="container">
	        @if(Session::has("message"))
                <p class="alert alert-danger">{!! Session::get("message") !!}</p>
            @endif
            <span class="alert alert-info">Thank you</span>
	    </div>

        <script src="{{ URL::asset('js/bootstrap.js') }}"></script>
</body>
</html>