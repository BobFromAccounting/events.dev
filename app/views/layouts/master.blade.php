<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" contents="Tarek S Hafez">
    <meta name="csrf-token" content="{{{ csrf_token() }}}">
	<title>Laravel PHP Framework</title>
	@yield('head')
	
</head>
<body>
	@yield('content')

	@yield('script')
</body>
</html>
