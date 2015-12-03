@extends('auth/layout')

@section('content')
	<div class="row">
		<div class="inner_wrap col-sm-12">
			<form method="post" action="{{ route('auth.post.login') }}">
				<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
					<input class="form-control" type="text" placeholder="Email" autofocus autocomplete="off" name="email" value="{{ Request::old('email') }}"/>
					{!! $errors->first('email', '<span class="help-inline text-danger">:message</span>') !!}
				</div>
				<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
					<input class="form-control" type="password" placeholder="Mật khẩu" autocomplete="off" name="password" value="{{ Request::old('password') }}"/>
					{!! $errors->first('password', '<span class="help-inline text-danger">:message</span>') !!}
				</div>
				<div class="form-group">
					<label for="remember" class="control-label"><input type="checkbox" id="remember" name="remember"> Giữ trạng thái đăng nhập</label>
				</div>
				<div class="row" id="auth-footer">
					<button type="submit" class="btn btn-danger">Đăng nhập</button>
					<a href="/" class="btn btn-default">Trở lại</a>
					<a class="btn btn-link" href="{{ route('auth.socialite', 'facebook') }}"><i class="fa fa-facebook"></i> Đăng nhập với Facebook</a>
					<div class="text-center auth-notice-lbl">
						<span>Nếu chưa có tài khoản, hãy</span>
						<a class="link-color" href="{{ route('auth.register') }}">đăng ký</a> . <a href="{{ route('auth.forget') }}">Quên mật khẩu?</a>
					</div>
				</div>
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
			</form>
		</div>
	</div>
@stop