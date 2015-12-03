@extends('admin/layouts/master')

@section('main-content')
	<h3>{{ trans('admin/general.update_info') . ' ' . trans('admin/general.modules.users') }}</h3>
	<div class="panel-body">
		<form class="form-horizontal bucket-form" method="post" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data">
			<div class="form-group">
				<label for="email" class="col-sm-3 control-label">{{ trans('form.avatar') }}</label>
				<div class="col-sm-6 text-center">
					<p><img width="140" src="{{ $user->getAvatarPath('md_') }}" class="img-thumbnail" alt="Avatar"></p>
					{{-- <button class="btn btn-warning btn-sm"><i class="fa fa-refresh"></i>	{{ trans('form.btn.change') }}</button> --}}
				</div>
			</div>

			<div class="form-group">
				<label for="email" class="col-sm-3 control-label">{{ trans('form.avatar') }}</label>
				<div class="col-sm-6 text-center">
					<input type="file" name="avatar" class="form-control">
				</div>
			</div>

			<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
				<label for="email" class="col-sm-3 control-label">{{ trans('form.email') }} <b class="text-danger">*</b></label>
				<div class="col-sm-6">
			   	<input type="email" class="form-control" id="email" name="email" placeholder="{{ trans('form.email') }}" value="{{ Request::old('email', $user->email) }}">
			   	{!! $errors->first('email', '<span class="help-inline text-danger">:message</span>') !!}
				</div>
			</div>

			<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
				<label for="password" class="col-sm-3 control-label">{{ trans('form.password') }} <b class="text-danger">*</b></label>
				<div class="col-sm-6">
			   	<input type="password" class="form-control" id="password" name="password" placeholder="{{ trans('form.password') }}" value="{{ Request::old('password', $user->getPassword()) }}" />
			   	{!! $errors->first('password', '<span class="help-inline text-danger">:message</span>') !!}
				</div>
			</div>

			<div class="form-group {{ $errors->has('nickname') ? 'has-error' : '' }}">
				<label for="nickname" class="col-sm-3 control-label">{{ trans('form.nickname') }} <b class="text-danger">*</b></label>
				<div class="col-sm-6">
			   	<input type="text" class="form-control" id="nickname" name="nickname" placeholder="{{ trans('form.nickname') }}" value="{{ Request::old('nickname', $user->nickname) }}">
			   	{!! $errors->first('nickname', '<span class="help-inline text-danger">:message</span>') !!}
				</div>
			</div>
			<div class="form-group">
				<label for="name" class="col-sm-3 control-label">{{ trans('form.name') }} <b class="text-danger">*</b></label>
				<div class="col-sm-6 {{ $errors->has('name') ? 'has-error' : '' }}">
			   	<input type="text" class="form-control" id="name" name="name" placeholder="{{ trans('form.name') }}" value="{{ Request::old('name', $user->name) }}">
			   	{!! $errors->first('name', '<span class="help-inline text-danger">:message</span>') !!}
				</div>
			</div>
			<div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
				<label for="phone" class="col-sm-3 control-label">{{ trans('form.phone') }} <b class="text-danger">*</b></label>
				<div class="col-sm-6">
			   	<input type="text" class="form-control" id="phone" name="phone" placeholder="{{ trans('form.phone') }}" value="{{ Request::old('phone', $user->phone) }}">
			   	{!! $errors->first('phone', '<span class="help-inline text-danger">:message</span>') !!}
				</div>
			</div>
			<div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
				<label for="address" class="col-sm-3 control-label">{{ trans('form.address') }} <b class="text-danger">*</b></label>
				<div class="col-sm-6">
			   	<input type="text" class="form-control" id="address" name="address" placeholder="{{ trans('form.address') }}" value="{{ Request::old('address', $user->address) }}">
			   	{!! $errors->first('address', '<span class="help-inline text-danger">:message</span>') !!}
				</div>
			</div>
			<div class="form-group">
				<label for="role_name" class="col-sm-3 control-label">{{ trans('form.role_name') }}</label>
				<div class="col-sm-6">
					<ul class="role-list list-inline checkbox-list">
						<li>
							<label for="checkbox_all" class="text-danger noselect">
								<input type="checkbox" id="checkbox_all" class="checkbox_all"> {{ trans('form.all') }}
								<p class="text-muted">All</p>
							</label>
						</li>
						@if (Entrust::ability('superadmin', 'role.edit'))
							@foreach ($roles as $role)
								<li>
									<label class="tooltips noselect" for="role_{{ $role->id }}" data-placement="top" data-toggle="tooltip" data-original-title="{{ $role->description }}">
										<input class="checkbox-child" type="checkbox" id="role_{{ $role->id }}" name="roles[]" value="{{ $role->id }}" {{ in_array($role->id, $user_roles) ? 'checked' : '' }}> {{ $role->display_name }}
										<p class="text-muted">{{ $role->name }}</p>
									</label>
								</li>
							@endforeach
						@endif
					</ul>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-6">
			   	<button type="submit" class="btn btn-primary"><i class="fa fa-pencil"></i> {{ trans('form.btn.update') }}</button>
			   	<a href="{{ url('/admin/users') }}" class="btn btn-link">{{ trans('form.btn.back') }}</a>
				</div>
			</div>
			{!! csrf_field() !!}
		</form>
	</div>
@stop
