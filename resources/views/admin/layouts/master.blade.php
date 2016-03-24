<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="{{ trans('admin/general.title') }}">
	<link rel="shortcut icon" href="/images/favicon.png">
	<title>{{ trans('admin/general.heading') }}</title>
	<!--Core CSS -->
	<link href="/bs3/css/bootstrap.min.css" rel="stylesheet">
	<link href="/js/jquery-ui/jquery-ui-1.10.1.custom.min.css" rel="stylesheet">
	<link href="/font-awesome/css/font-awesome.css" rel="stylesheet">
	<link href="/js/data-tables/DT_bootstrap.css" rel="stylesheet">
	<!-- Js styles for this template -->
	<link href="/js/select2/select2.css" rel="stylesheet" />

	<!-- Minify thành 1 file -->
	<link href="/css/admin_all.css" rel="stylesheet">
	@yield('style')
	<!-- Just for debugging purposes. Don't actually copy this line! -->
	<!--[if lt IE 9]>
	<script src="/js/ie8-responsive-file-warning.js"></script><![endif]-->
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->
</head>
<body>
<section id="container">
	@include('admin/partials/header')
	@include('admin/partials/aside')
	<section id="main-content">
		<section class="wrapper">
			@include('notifications')
			@yield('main-content')
		</section>
	</section>
</section>
<script src="/js/admin_all.js"></script>
<!--script for this page-->
@yield('scripts')
</body>
</html>
