<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" href="{!! URL::asset('css/bootstrap.css') !!}" />
	<style>
	.container{width: 600px;}
	.btn{border-radius: 0px;}
	.alert{border-radius: 0px;}
	.form-control{border-radius: 0px;}
	</style>
</head>
<body>
    <div class="container">
    @yield('content')
    </div>
    <script src="{{ URL::asset('js/jq.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.js') }}"></script>
</body>
</html>