@extends('admin/layouts/master')

@section('main-content')
	<h3>{{ trans('admin/general.update_info') }} mật khẩu</h3>
	<div class="panel-body">
		<form class="form-horizontal bucket-form" method="post" action="{{ route('user.changePassword', Auth::user()->id) }}" enctype="multipart/form-data">

			<div class="form-group {{ $errors->has('old_password') ? 'has-error' : '' }}">
				<label for="old_password" class="col-sm-3 control-label">Mật khẩu cũ <b class="text-danger">*</b></label>
				<div class="col-sm-6">
			   	<input type="password" class="form-control" id="old_password" name="old_password" placeholder="Mật khẩu cũ" value="">
			   	{!! $errors->first('old_password', '<span class="help-inline text-danger">:message</span>') !!}
				</div>
			</div>

			<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
				<label for="password" class="col-sm-3 control-label">Mật khẩu mới <b class="text-danger">*</b></label>
				<div class="col-sm-6">
			   	<input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu mới" value="">
			   	{!! $errors->first('password', '<span class="help-inline text-danger">:message</span>') !!}
				</div>
			</div>

			<div class="form-group {{ $errors->has('password_confimation') ? 'has-error' : '' }}">
				<label for="password_confimation" class="col-sm-3 control-label">Xác nhận mật khẩu <b class="text-danger">*</b></label>
				<div class="col-sm-6">
			   	<input type="password" class="form-control" id="password_confimation" name="password_confimation" placeholder="Xác nhận mật khẩu" value="">
			   	{!! $errors->first('password_confimation', '<span class="help-inline text-danger">:message</span>') !!}
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-6">
			   	<button type="submit" class="btn btn-primary"><i class="fa fa-pencil"></i> {{ trans('form.btn.update') }}</button>
			   	<a href="{{ url('/admin/users') }}" class="btn btn-link">{{ trans('form.btn.back') }}</a>
				</div>
			</div>
			{!! csrf_field() !!}
			<input type="file" name="avatar" id="avatar">
		</form>
	</div>
@stop
