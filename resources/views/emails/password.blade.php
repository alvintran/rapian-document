@extends('emails/layout')

@section('content')
	Bấm vào link sau để tiến hành reset mật khẩu: <a href="{{ route('auth.reset-password', $token) }}" target="_blank">Reset mật khẩu</a>
@stop