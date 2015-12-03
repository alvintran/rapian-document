<!--header start-->
<header class="header fixed-top clearfix">
	<!--logo start-->
	<div class="brand">
		<a href="{{ route('dashboard') }}" class="logo">
			{{ trans('admin/general.heading') }}
		</a>
		<div class="sidebar-toggle-box">
			<div class="fa fa-bars"></div>
		</div>
	</div>
	<!--logo end-->

	{{-- <div class="nav notify-row" id="top_menu">
		<!--  notification start -->
		<ul class="nav top-menu">
			<!-- inbox dropdown start-->
			<li id="header_inbox_bar" class="dropdown">
				<a data-toggle="dropdown" class="dropdown-toggle" href="#">
					<i class="fa fa-envelope-o"></i>
					<span class="badge bg-important">4</span>
				</a>
				<ul class="dropdown-menu extended inbox">
					<li>
						<p class="red">{{ trans('admin/header.inbox.unread_messages', ['count' => 4]) }}</p>
					</li>
					<li>
						<a href="#">
							<span class="photo"><img alt="avatar" src="/images/avatar-mini.jpg"></span>
							<span class="subject">
								<span class="from">Jonathan Smith</span>
								<span class="time">Just now</span>
							</span>
							<span class="message">
								Hello, this is an example msg.
							</span>
						</a>
					</li>
					<li>
						<a href="#">
							<span class="photo"><img alt="avatar" src="{{ Auth::user()->getAvatarPath() }}"></span>
							<span class="subject">
								<span class="from">Jane Doe</span>
								<span class="time">2 min ago</span>
							</span>
							<span class="message">
								Nice admin template
							</span>
						</a>
					</li>
					<li>
						<a href="#">
							<span class="photo"><img alt="avatar" src="{{ Auth::user()->getAvatarPath() }}"></span>
							<span class="subject">
								<span class="from">Tasi sam</span>
								<span class="time">2 days ago</span>
							</span>
							<span class="message">
								This is an example msg.
							</span>
						</a>
					</li>
					<li>
						<a href="#">
							<span class="photo"><img alt="avatar" src="{{ Auth::user()->getAvatarPath() }}"></span>
							<span class="subject">
								<span class="from">Mr. Perfect</span>
								<span class="time">2 hour ago</span>
							</span>
							<span class="message">
								Hi there, its a test
							</span>
						</a>
					</li>
					<li>
					<a href="#">{{ trans('admin/header.inbox.see_all') }}</a>
					</li>
				</ul>
			</li>
			<!-- inbox dropdown end -->

			<!-- notification dropdown start-->
			<li id="header_notification_bar" class="dropdown">
				<a data-toggle="dropdown" class="dropdown-toggle" href="#">
					<i class="fa fa-bell-o"></i>
					<span class="badge bg-warning">3</span>
				</a>
				<ul class="dropdown-menu extended notification">
					<li>
						<p>{{ trans('admin/header.notifications') }}</p>
					</li>
					<li>
						<div class="alert alert-info clearfix">
							<span class="alert-icon"><i class="fa fa-bolt"></i></span>
							<div class="noti-info">
								<a href="#"> Server #1 overloaded.</a>
							</div>
						</div>
					</li>
					<li>
						<div class="alert alert-danger clearfix">
							<span class="alert-icon"><i class="fa fa-bolt"></i></span>
							<div class="noti-info">
								<a href="#"> Server #2 overloaded.</a>
							</div>
						</div>
					</li>
					<li>
						<div class="alert alert-success clearfix">
							<span class="alert-icon"><i class="fa fa-bolt"></i></span>
							<div class="noti-info">
								<a href="#"> Server #3 overloaded.</a>
							</div>
						</div>
					</li>
				</ul>
			</li>
			<!-- notification dropdown end -->
		</ul>
		<!--  notification end -->
	</div> --}}
	<div class="top-nav clearfix">
		<ul class="nav pull-right top-menu">
			<li class="dropdown">
				<a data-toggle="dropdown" class="dropdown-toggle" href="#">
					<img class="blog-image img-thumbnail" style="background: url('{{ Auth::user()->getAvatarPath() }}') center center no-repeat; height: 35px; width: 35px; padding: 0px; background-size: cover; display: inline;" />
					{{-- <img width="35px" height="35px" alt="avatar" src="{{ Auth::user()->getAvatarPath() }}"> --}}
					<span class="username">{{ Auth::user()->nickname }}</span>
					<b class="caret"></b>
				</a>
				<ul class="dropdown-menu extended logout">
					<li><a href="{{ url('/admin/profile') }}"><i class="fa fa-suitcase"></i>{{ trans('general.profile') }}</a></li>
					<li><a href="{{ url('/admin/password') }}"><i class="fa fa-lock"></i> Đổi mật khẩu</a></li>
					<li><a href="{{ route('admin.logout') }}"><i class="fa fa-key"></i> {{ trans('general.logout') }}</a></li>
				</ul>
			</li>
		</ul>
		<!--search & user info end-->
	</div>
</header>
<!--header end-->