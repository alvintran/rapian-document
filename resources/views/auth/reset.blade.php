@extends('auth/layout')

@section('content')
	<div class="row">
		<div class="inner_wrap col-sm-12">
			<form method="post" action="{{ route('auth.post.reset-password') }}" class="form-horizontal">
				<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
					<input readonly="true" class="form-control" type="text" placeholder="Email" autocomplete="off" name="email" value="{{ Request::old('email', $email[0]) }}">
					{!! $errors->first('email', '<span class="help-inline text-danger">:message</span>') !!}
				</div>

				<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
					<input class="form-control" type="password" placeholder="Mật khẩu" autocomplete="off" name="password" value="{{ Request::get('password') }}"/>
					{!! $errors->first('password', '<span class="help-inline text-danger">:message</span>') !!}
				</div>

				<div class="form-group {{ $errors->has('comfirm_password') ? 'has-error' : '' }}">
					<input class="form-control" type="password" placeholder="Nhập lại mật khẩu" autocomplete="off" name="password_confirmation" value="{{ Request::get('comfirm_password') }}"/>
					{!! $errors->first('comfirm_password', '<span class="help-inline text-danger">:message</span>') !!}
				</div>

				<div class="row" id="auth-footer">
					<button type="submit" class="btn btn-vtvd">Reset mật khẩu</button>
				</div>
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="token" value="{{ $token }}">
			</form>
		</div>
	</div>
@stop
