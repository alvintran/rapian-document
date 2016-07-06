<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	@include('frontend/includes/metadata')
	<!-- core css -->
	<link rel="stylesheet" href="/frontend/css/bootstrap.min.css">
	<link href="/font-awesome/css/font-awesome.css" rel="stylesheet">
	<!-- custom style -->
	<link rel="stylesheet" href="/frontend/css/login.css">
</head>
<body>
	<div class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container">
		   <div class="navbar-header">
				<a class="navbar-brand" href="{{ url('/') }}">Taobao blog</a>
		   </div>
		</div>
	</div>
	<div class="container">
		<div class="col-md-offset-1 col-sm-10 col-wc">
			@include('notifications')
			<div class="pull-right">
				<a href="{{ url('/') }}">Trở về trang chủ</a>
			</div>
		</div>
	</div>
</body>
</html>