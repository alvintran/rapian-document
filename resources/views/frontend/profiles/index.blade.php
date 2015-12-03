@extends('frontend/layouts/profile')

@section('main-content')
<h3>Thông tin cá nhân</h3>
	<div class="panel-body">
		<form class="form-horizontal" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label class="col-sm-3 control-label">&nbsp;</label>
				<div class="col-sm-2 text-center">
					<p><img src="{{ $user->getAvatarPath('md_') }}" class="img-sm img-thumbnail" alt="Avatar"></p>
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
			   	<input readonly="true" type="email" class="form-control" id="email" name="email" placeholder="{{ trans('form.email') }}" value="{{ Request::old('email', $user->email) }}">
			   	{!! $errors->first('email', '<span class="help-inline text-danger">:message</span>') !!}
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
				<label for="name" class="col-sm-3 control-label">{{ trans('form.name') }}</label>
				<div class="col-sm-6">
			   	<input type="text" class="form-control" id="name" name="name" placeholder="{{ trans('form.name') }}" value="{{ Request::old('name', $user->name) }}">
				</div>
			</div>
			<div class="form-group">
				<label for="phone" class="col-sm-3 control-label">{{ trans('form.phone') }}</label>
				<div class="col-sm-6">
			   	<input type="text" class="form-control" id="phone" name="phone" placeholder="{{ trans('form.phone') }}" value="{{ Request::old('phone', $user->phone) }}">
				</div>
			</div>
			<div class="form-group">
				<label for="address" class="col-sm-3 control-label">{{ trans('form.address') }}</label>
				<div class="col-sm-6">
			   	<input type="text" class="form-control" id="address" name="address" placeholder="{{ trans('form.address') }}" value="{{ Request::old('address', $user->address) }}">
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