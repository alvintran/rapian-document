@extends('frontend/layouts/profile')

@section('main-content')
<h3>Đổi mật khẩu</h3>
	<div class="panel-body">
		<form class="form-horizontal" method="post" enctype="multipart/form-data">
			<div class="form-group {{ $errors->has('old_password') ? 'has-error' : '' }}">
				<label for="phone" class="col-sm-3 control-label">Mật khẩu cũ <b class="text-danger">*</b></label>
				<div class="col-sm-6">
					<input class="form-control" type="password" placeholder="Mật khẩu" autocomplete="off" name="old_password" value="{{ Request::get('old_password') }}"/>
					{!! $errors->first('old_password', '<span class="help-inline text-danger">:message</span>') !!}
				</div>
			</div>
			<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
				<label for="phone" class="col-sm-3 control-label">Mật khẩu <b class="text-danger">*</b></label>
				<div class="col-sm-6">
					<input class="form-control" type="password" placeholder="Mật khẩu" autocomplete="off" name="password" value="{{ Request::get('password') }}"/>
					{!! $errors->first('password', '<span class="help-inline text-danger">:message</span>') !!}
				</div>
			</div>

			<div class="form-group {{ $errors->has('comfirm_password') ? 'has-error' : '' }}">
				<label for="phone" class="col-sm-3 control-label">Nhập lại mật khẩu <b class="text-danger">*</b></label>
				<div class="col-sm-6">
					<input class="form-control" type="password" placeholder="Nhập lại mật khẩu" autocomplete="off" name="password_confirmation" value="{{ Request::get('comfirm_password') }}"/>
					{!! $errors->first('comfirm_password', '<span class="help-inline text-danger">:message</span>') !!}
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-6">
			   	<button type="submit" class="btn btn-primary"><i class="fa fa-pencil"></i> {{ trans('form.btn.update') }}</button>
			   	<a href="{{ url('/') }}" class="btn btn-link">{{ trans('form.btn.back') }}</a>
				</div>
			</div>
			{!! csrf_field() !!}
		</form>
	</div>
@stop