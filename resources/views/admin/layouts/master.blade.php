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
	<link href="/css/bootstrap-reset.css" rel="stylesheet">
	<link href="/font-awesome/css/font-awesome.css" rel="stylesheet">
	<link href="/js/data-tables/DT_bootstrap.css" rel="stylesheet">
	<link href="/css/clndr.css" rel="stylesheet">
	<!-- Js styles for this template -->
	<link rel="stylesheet" type="text/css" href="/js/select2/select2.css" />
	<!-- Custom styles for this template -->
	<link href="/css/style.css" rel="stylesheet">
	<link href="/css/style-responsive.css" rel="stylesheet"/>
	<link href="/css/admin.css" rel="stylesheet">
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
<!-- Placed js at the end of the document so the pages load faster -->
<!--Core js-->
<script src="/js/jquery.js"></script>
<script src="/js/jquery-ui/jquery-ui-1.10.1.custom.min.js"></script>
<script src="/bs3/js/bootstrap.min.js"></script>
<script src="/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="/js/jquery.scrollTo.min.js"></script>
<script src="/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
<script src="/js/jquery.nicescroll.js"></script>
<script src="/js/jquery.easing.min.js"></script>
<script src="/js/calendar/clndr.js"></script>
<script src="/js/underscore-min.js"></script>
<script src="/js/calendar/moment-2.2.1.js"></script>
<script src="/js/evnt.calendar.init.js"></script>
<script src="/js/gauge/gauge.js"></script>
<script src="/js/jquery.customSelect.min.js" ></script>
<script src="/js/advanced-datatable/js/jquery.dataTables.js"></script>
<script src="/js/data-tables/DT_bootstrap.js"></script>
<script type="text/javascript" src="/js/ckeditor/ckeditor.js"></script>
<script src="/js/tinymce4x/tinymce.min.js"></script>
<!--common script init for all pages-->
<script src="/js/select2/select2.js"></script>
<script src="/js/scripts.js"></script>
<script src="/js/dynamic_table_init.js"></script>
<script src="/js/admin.js"></script>
<!--script for this page-->
@yield('scripts')
</body>
</html>