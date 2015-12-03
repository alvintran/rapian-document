<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	@include('frontend/includes/metadata')
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,500,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="/frontend/css/bootstrap.min.css">
	<link href="/font-awesome/css/font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" href="/frontend/css/style.css">
	<link rel="stylesheet" href="/frontend/css/profile.css">
	@yield('styles')
</head>
<body>
	@include('frontend/includes/header')
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				@include('notifications')
				@yield('main-content')
			</div>
		</div>
		@include('frontend/includes/footer')
	</div>
<!-- javascript -->
<script src="/js/jquery.js"></script>
<script src="/frontend/js/bootstrap.min.js"></script>
<script src="/frontend/js/style.js"></script>
@yield('script')
{!! $metadata->getJsCodes() !!}
</body>
</html>
