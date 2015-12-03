@extends('admin/layouts/master')

@section('main-content')
	<section class="panel">
		<header class="panel-heading">
			<h4>
				{{ trans('admin/general.modules.user') }}
				<a href="{{ route('user.create') }}" class="btn btn-xs btn-primary pull-right"><i class="fa fa-plus"></i> {{ trans('form.btn.create') }}</a>
			</h4>
		</header>
		<div class="panel-body">
			<div class="adv-table">
				<div class="dataTables_wrapper">
					<form method="get" action="" class="form-filter form-inline">
						<label>{{ trans('form.name') }} <input type="text" name="name" class="form-control search-box-modules input-sm" placeholder="Name" value="{{ Request::get('name', '') }}"></label>
						<label>{{ trans('form.email') }} <input type="text" name="email" class="form-control search-box-modules input-sm" placeholder="Email" value="{{ Request::get('email', '') }}"></label>
						<label>{{ trans('form.phone') }} <input type="text" name="phone" class="form-control search-box-modules input-sm" placeholder="Phone" value="{{ Request::get('phone', '') }}"></label>
						<button type="submit" class="btn btn-default btn-sm"><i class="fa fa-search"></i> {{ trans('form.btn.search') }}</button>
					</form>
					<hr>
					<table class="display table table-bordered table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th>{{ trans('form.avatar') }}</th>
								<th class="sorting" aria-sort="descending" url-sort="/admin/users{{ createLinkSort2('name') }}">{{ trans('form.name') }}</th>
								<th class="sorting" aria-sort="descending" url-sort="/admin/users{{ createLinkSort2('nickname') }}">{{ trans('form.nickname') }}</th>
								<th class="sorting" aria-sort="descending" url-sort="/admin/users{{ createLinkSort2('email') }}">{{ trans('form.email') }}</th>
								<th>{{ trans('form.phone') }}</th>
								<th>{{ trans('table.role_column') }}</th>
								<th class="sorting" aria-sort="descending" url-sort="/admin/users{{ createLinkSort2('active') }}">Active</th>
								<th colspan="2" align="center">{{ trans('table.actions') }}</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($users as $key => $user)
								<tr>
									<td>{{ $key + 1 }}</td>
									<td><img width="40" src="{{ $user->getAvatarPath('sm_') }}" class="img-rounded" alt="Avatar"></td>
									<td>{{ $user->name }}</td>
									<td>{{ $user->nickname }}</td>
									<td>{{ $user->email }}</td>
									<td>{{ $user->phone }}</td>
									<td>
										@foreach ($user->roles as $ind => $role)
											{{ $role->display_name }}
											@if ($user->roles->count() > 1 && $ind < ($user->roles->count() - 1))
												{{ ' / ' }}
											@endif
										@endforeach
									</td>
									<td class="text-center">
										@if($user->id != 1)
											<a href="{{ route('user.active', $user->id) }}" class="btn-active btn btn-xs btn-primary">{{ $user->showCheckActive() }}</a>
										@endif
									</td>
									<td>
										@if($user->id != 1)
											<a href="{{ route('user.edit', $user->id) }}" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a>
										@endif
									</td>
									<td>
										@if($user->id != 1)
											<a href="{{ route('user.destroy', $user->id) }}" class="btn btn-xs btn-danger btn-delete-action"><i class="fa fa-trash-o"></i></a>
									</td>
										@endif
								</tr>
							@endforeach
						</tbody>
					</table>
					@include('admin/partials/paginate', ['data' => $users, 'appended' => ['email' => Request::get('email'), 'phone' => Request::get('phone')]])
				</div>
			</div>
		</div>
	</section>
@stop
@section('script')
<script type="text/javascript">
	$(function() {
	   $('.sorting').click(function(ev) {
	      return window.location.href = $(this).attr('url-sort');
	   });
	});
</script>
@stop