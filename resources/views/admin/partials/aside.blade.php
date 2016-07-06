<!--sidebar start-->
<aside>
	<div id="sidebar" class="nav-collapse">
		<!-- sidebar menu start-->
		<div class="leftside-navigation">
			<ul class="sidebar-menu" id="nav-accordion">
				<li>
					<a class="{{ Request::is("admin/dashboard") ? 'active' : '' }}" href="{{ route('dashboard') }}">
						<i class="fa fa-dashboard"></i>
						<span>{{ trans('admin/general.modules.dashboard') }}</span>
					</a>
				</li>
				@if(Entrust::ability('superadmin', 'setting'))
					<li class="sub-menu">
						<a href="javascript:;" class="{{ Request::is("admin/settings*") ? 'active' : '' }}">
							<i class="fa fa-cog"></i>
							<span>{{ trans('admin/general.modules.setting') }}</span>
						</a>
						<ul class="sub">
							<li class="{{ Request::is("admin/settings/website") ? 'active' : '' }}"><a href="{{ route('website.edit') }}">{{ trans('admin/general.modules.site') }}</a></li>
							<li class="{{ Request::is("admin/settings/metadata") ? 'active' : '' }}"><a href="{{ route('metadata.show') }}">{{ trans('admin/general.modules.metadata') }}</a></li>
							<li class="{{ Request::is("admin/settings/social") ? 'active' : '' }}"><a href="{{ route('social.show') }}">{{ trans('admin/general.modules.social') }}</a></li>
						</ul>
					</li>
				@endif
				@if(Entrust::ability('superadmin', 'user.view,roles.view,permissions.view'))
					<li class="sub-menu">
						<a href="javascript:;" class="{{ (Request::is("admin/users*") or Request::is("admin/roles*") or Request::is("admin/permissions*")) ? 'active' : '' }}">
							<i class="fa fa-user"></i>
							<span>{{ trans('admin/general.modules.user') }}</span>
						</a>
						<ul class="sub">
							@if(Entrust::ability('superadmin', 'user.view'))
								<li class="{{ Request::is("admin/users*") ? 'active' : '' }}"><a href="{{ route('user.index') }}">{{ trans('admin/general.modules.users') }}</a></li>
							@endif
							@if(Entrust::ability('superadmin', 'roles.view'))
								<li class="{{ Request::is("admin/roles*") ? 'active' : '' }}"><a href="{{ route('role.index') }}">{{ trans('admin/general.modules.roles') }}</a></li>
							@endif
							@if(Entrust::ability('superadmin', 'permissions.view'))
								<li class="{{ Request::is("admin/permissions*") ? 'active' : '' }}"><a href="{{ route('permission.index') }}">{{ trans('admin/general.modules.permissions') }}</a></li>
							@endif
						</ul>
					</li>
				@endif
				@if(Entrust::ability('superadmin', 'category.view'))
					{{--Quản lý danh mục--}}
					<li class="sub-menu">
						<a href="javascript:;" class="{{ Request::is("admin/categories*") ? 'active' : '' }}">
							<i class="fa fa-align-center"></i>
							<span>{{ trans('admin/general.modules.category') }}</span>
						</a>
						<ul class="sub">
							<li class="{{ Request::is("admin/categories*") ? 'active' : '' }}"><a href="{{ route('category.index') }}">{{ trans('admin/general.modules.category') }}</a></li>
						</ul>
					</li>
				@endif
				@if(Entrust::ability('superadmin', 'blog.view'))
					<li class="sub-menu">
						<a href="javascript:;" class="{{ Request::is("admin/blogs*") ? 'active' : '' }}">
							<i class="fa fa-user"></i>
							<span>Quản lý bài viết</span>
						</a>
						<ul class="sub">
							<li class="{{ Request::is("admin/blogs*") ? 'active' : '' }}"><a href="{{ route('blog.index') }}">Quản lý bài viết</a></li>
						</ul>
					</li>
				@endif
			</ul>
		</div>
		<!-- sidebar menu end-->
	</div>
</aside>
<!--sidebar end-->
