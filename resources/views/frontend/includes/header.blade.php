<!-- header start -->
<div id="top-header">
	<div class="container">
		<ul id="header-top-label" class="list-unstyled pull-left">
			<li><i class="fa fa-phone"></i> Hotline: <span>{{ $metadata->getPhone_1() }}</span></li>
			<li><i class="fa fa-envelope"></i> Email: <span>{{ $metadata->getEmail_1() }}</span></li>
		</ul>
		<ul id="authen-zone" class="list-unstyled pull-right">
			<li><a id="header-cart" href="#"><i class="fa fa-shopping-cart"></i> 123 sản phẩm (<span class="price">3.456.000 <sup>₫</sup></span>)</a></li>
			@if (Auth::check())
				<li class="dropdown">
					<a data-target="#" href="{{ route('frontend.profile') }}" data-toggle="dropdown">{{ Auth::user()->nickname }} <span class="caret"></span></a>
					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="{{ route('frontend.profile') }}">Thông tin cá nhân</a></li>
						<li><a href="{{ route('frontend.profile.password') }}">Đổi mật khẩu</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="{{ route('auth.logout') }}">Đăng xuất</a></li>
					</ul>
				</li>
			@else
				<li><a href="{{ route('auth.register') }}">Đăng ký</a></li> /
				<li><a href="{{ route('auth.login') }}">Đăng nhập</a></li>
			@endif
		</ul>
	</div>
</div>
<div id="navbar-top" class="navbar navbar-default" role="navigation">
   <div class="container">
      <div class="navbar-header">
      	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      		<span class="sr-only">Toggle navigation</span>
      		<span class="icon-bar"></span>
      		<span class="icon-bar"></span>
      		<span class="icon-bar"></span>
      	</button>
			@if($metadata->getLogo())
				<a class="navbar-brand" href="{{ url('/') }}" style="background: url('{{ LOGO_SETTING.$metadata->getLogo() }}') center center no-repeat; background-size: 150px; width: 150px; height: 50px"></a>
			@else
				<a class="navbar-brand" href="{{ url('/') }}">{{ $metadata->getName() }}</a>
			@endif
      </div>
      <div id="head-search" class="pull-left">
      	<form class="form-inline" action="">
      		<input type="text" id="q" name="q" placeholder="Tìm kiếm" class="form-control input-sm input-search" value="{{ Request::get('q') }}">
      		<button class="btn btn-default fa fa-search"></button>
      	</form>
      </div>
      <div id="head-menu" class="navbar-collapse collapse pull-right">
			<ul class="nav navbar-nav">
				<li class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{ route('frontend.index') }}">Trang chủ</a></li>
				<li class="{{ Request::is('/gioi-thieu') ? 'active' : '' }}"><a href="{{ route('frontend.index') }}">Giới thiệu</a></li>
				<li class="{{ Request::is('/bao-gia') ? 'active' : '' }}"><a href="{{ route('frontend.index') }}">Báo giá</a></li>
				<li class="{{ Request::is('/huong-dan') ? 'active' : '' }}"><a href="{{ route('frontend.index') }}">Hướng dẫn</a></li>
				<li class="{{ Request::is('/lien-he') ? 'active' : '' }}"><a href="{{ route('frontend.index') }}">Liên hệ</a></li>
				{{-- {!! $categories !!}
				{{--
				@foreach($categories as $category)
					@if($category->level <= 1)
						<li class="dropdown {{ $category->checkUrl(explode('-', Request::segment(2))[0], $category->id) ? 'active' : '' }}">
							<a href="{{ $category->getUrlCat() }}" class="dropdown-hover">
								{{ $category->name }}
							@if($category->getCountByParent() > 0) <span class="caret"> </span> @endif
							</a>
							@if($category->getCountByParent() > 0)
								<ul class="dropdown-menu">
									@foreach($categories as $cat)
										@if($cat->level > 1 && $cat->parent_id == $category->id)
										<li>
											<a href="{{ $cat->getUrlCat() }}">{{ $cat->name }}</a>
										</li>
										@endif
									@endforeach
								</ul>
							@endif
						</li>
					@endif
				@endforeach
				 --}}
			</ul>
      </div>
   </div>
 </div>
 @section('script')
 <script type="text/javascript">
 	$(function() {
 		if($(window).width() < 753) {
 			$('.dropdown-hover').addClass('dropdown-toggle');
 			$('.dropdown-hover').attr('data-toggle', 'dropdown');
 		}
 	});
 </script>
 @stop