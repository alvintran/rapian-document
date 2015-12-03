@extends('admin/layouts/master')

@section('main-content')
	<h3>{{ trans('admin/general.update_info') . ' ' . trans('admin/general.modules.social') }}</h3>
	<div class="panel-body">
		<form class="form-horizontal bucket-form" method="post" action="{{ url('/admin/settings/social') }}" enctype="multipart/form-data">

			{{-- Js_Codes--}}
			<div class="form-group {{ $errors->has('js_codes') ? 'has-error' : '' }}">
				<label for="skype" class="col-sm-3 control-label">{{ trans('form.settings.js_codes') }}</label>
				<div class="col-sm-6">
					<textarea class="form-control" id="js_codes" name="js_codes" placeholder="{{ trans('form.settings.js_codes') }}" rows="10">{{ Request::old('js_codes', $social->js_codes) }}</textarea>
					<p class="text-muted text-social">Google analytics, Facebook, Vchat...</p>
					{!! $errors->first('js_codes', '<span class="help-inline text-danger">:message</span>') !!}
				</div>
			</div>

			<div class="form-group {{ $errors->has('facebook') ? 'has-error' : '' }}">
				<label for="skype" class="col-sm-3 control-label">{{ trans('form.settings.facebook') }}</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="facebook" name="facebook" placeholder="{{ trans('form.settings.facebook') }}" value="{{ Request::old('facebook', $social->facebook) }}" />
					{!! $errors->first('facebook', '<span class="help-inline text-danger">:message</span>') !!}
				</div>
			</div>

			<div class="form-group {{ $errors->has('googleplus') ? 'has-error' : '' }}">
				<label for="skype" class="col-sm-3 control-label">{{ trans('form.settings.googleplus') }}</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="googleplus" name="googleplus" placeholder="{{ trans('form.settings.googleplus') }}" value="{{ Request::old('googleplus', $social->googleplus) }}" />
					{!! $errors->first('googleplus', '<span class="help-inline text-danger">:message</span>') !!}
				</div>
			</div>

			<div class="form-group {{ $errors->has('twitter') ? 'has-error' : '' }}">
				<label for="skype" class="col-sm-3 control-label">{{ trans('form.settings.twitter') }}</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="twitter" name="twitter" placeholder="{{ trans('form.settings.twitter') }}" value="{{ Request::old('twitter', $social->twitter) }}" />
					{!! $errors->first('twitter', '<span class="help-inline text-danger">:message</span>') !!}
				</div>
			</div>

			<div class="form-group {{ $errors->has('linkin') ? 'has-error' : '' }}">
				<label for="skype" class="col-sm-3 control-label">{{ trans('form.settings.linkin') }}</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="linkin" name="linkin" placeholder="{{ trans('form.settings.linkin') }}" value="{{ Request::old('linkin', $social->linkin) }}" />
					{!! $errors->first('linkin', '<span class="help-inline text-danger">:message</span>') !!}
				</div>
			</div>

			<div class="form-group {{ $errors->has('youtube') ? 'has-error' : '' }}">
				<label for="skype" class="col-sm-3 control-label">{{ trans('form.settings.youtube') }}</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="youtube" name="youtube" placeholder="{{ trans('form.settings.youtube') }}" value="{{ Request::old('youtube', $social->youtube) }}" />
					{!! $errors->first('youtube', '<span class="help-inline text-danger">:message</span>') !!}
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-6">
					<button type="submit" class="btn btn-primary"><i class="fa fa-pencil"></i> {{ trans('form.btn.update') }}</button>
					<a href="{{ url('/admin/settings/social') }}" class="btn btn-link">{{ trans('form.btn.back') }}</a>
				</div>
			</div>

			{!! csrf_field() !!}
		</form>
	</div>
@stop