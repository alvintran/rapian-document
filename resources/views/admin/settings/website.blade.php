@extends('admin/layouts/master')
@section('main-content')
	<h3>{{ trans('admin/general.update_info') . ' ' . trans('admin/general.modules.site') }}</h3>
	<div class="panel-body">
		<form class="form-horizontal bucket-form" method="post" action="{{ url('/admin/settings/website') }}" enctype="multipart/form-data">
			<div class="form-group">
				<label for="logo" class="col-sm-3 control-label">{{ trans('form.settings.logo') }}</label>
				<div class="controls col-sm-6 text-center">
					<div class="" style="width: 185px">
						<p><img src="{{ $website->getLogo('') }}" alt="{{ $website->name }}" /></p>
						<input type="file" name="logo" class="default input-file-logo"/>
					</div>
				</div>
			</div>
			<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
				<label for="name" class="col-sm-3 control-label">{{ trans('form.settings.name_setting') }} <b class="text-danger">*</b></label>
				<div class="col-sm-6">
			   	<input type="text" class="form-control" id="name" name="name" placeholder="{{ trans('form.settings.name_setting') }}" value="{{ Request::old('name', $website->name) }}" />
			   	{!! $errors->first('name', '<span class="help-inline text-danger">:message</span>') !!}
				</div>
			</div>

			{{-- Địa chỉ --}}
			<div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
				<label for="skype" class="col-sm-3 control-label">{{ trans('form.settings.address_setting') }} <b class="text-danger">*</b></label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="address" name="address" placeholder="{{ trans('form.settings.address_setting') }}" value="{{ Request::old('address', $website->address) }}" />
					{!! $errors->first('address', '<span class="help-inline text-danger">:message</span>') !!}
				</div>
			</div>

			<div class="form-group {{ $errors->has('email_1') ? 'has-error' : '' }}">
				<label for="email" class="col-sm-3 control-label">{{ trans('form.settings.email_1') }} <b class="text-danger">*</b></label>
				<div class="col-sm-6">
					<input type="email" class="form-control" id="email_1" name="email_1" placeholder="{{ trans('form.settings.email_1') }}" value="{{ Request::old('email_1', $website->email_1) }}" />
					{!! $errors->first('email_1', '<span class="help-inline text-danger">:message</span>') !!}
				</div>
			</div>

			<div class="form-group {{ $errors->has('email_2') ? 'has-error' : '' }}">
				<label for="email" class="col-sm-3 control-label">{{ trans('form.settings.email_2') }}</label>
				<div class="col-sm-6">
					<input type="email" class="form-control" id="email_2" name="email_2" placeholder="{{ trans('form.settings.email_2') }}" value="{{ Request::old('email_2', $website->email_2) }}" />
					{!! $errors->first('email_2', '<span class="help-inline text-danger">:message</span>') !!}
				</div>
			</div>

			<div class="form-group {{ $errors->has('email_3') ? 'has-error' : '' }}">
				<label for="email" class="col-sm-3 control-label">{{ trans('form.settings.email_3') }}</label>
				<div class="col-sm-6">
					<input type="email" class="form-control" id="email_3" name="email_3" placeholder="{{ trans('form.settings.email_3') }}" value="{{ Request::old('email_3', $website->email_3) }}" />
					{!! $errors->first('email_3', '<span class="help-inline text-danger">:message</span>') !!}
				</div>
			</div>

			{{-- Setting Phone--}}
			<div class="form-group {{ $errors->has('phone_1') ? 'has-error' : '' }}">
				<label for="phone" class="col-sm-3 control-label">{{ trans('form.settings.phone_1') }} <b class="text-danger">*</b></label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="phone_1" name="phone_1" placeholder="{{ trans('form.settings.phone_1') }}" value="{{ Request::old('phone_1', $website->phone_1) }}" />
					{!! $errors->first('phone_1', '<span class="help-inline text-danger">:message</span>') !!}
				</div>
			</div>

			<div class="form-group {{ $errors->has('phone_2') ? 'has-error' : '' }}">
				<label for="phone" class="col-sm-3 control-label">{{ trans('form.settings.phone_2') }}</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="phone_2" name="phone_2" placeholder="{{ trans('form.settings.phone_2') }}" value="{{ Request::old('phone_2', $website->phone_2) }}" />
					{!! $errors->first('phone_2', '<span class="help-inline text-danger">:message</span>') !!}
				</div>
			</div>

			<div class="form-group {{ $errors->has('phone_3') ? 'has-error' : '' }}">
				<label for="phone" class="col-sm-3 control-label">{{ trans('form.settings.phone_3') }}</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="phone_3" name="phone_3" placeholder="{{ trans('form.settings.phone_3') }}" value="{{ Request::old('phone_3', $website->phone_3) }}" />
					{!! $errors->first('phone_3', '<span class="help-inline text-danger">:message</span>') !!}
				</div>
			</div>

			{{-- Setting Yahoo--}}
			<div class="form-group {{ $errors->has('yahoo_1') ? 'has-error' : '' }}">
				<label for="yahoo" class="col-sm-3 control-label">{{ trans('form.settings.yahoo_1') }}</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="yahoo_1" name="yahoo_1" placeholder="{{ trans('form.settings.yahoo_1') }}" value="{{ Request::old('yahoo_1', $website->yahoo_1) }}" />
					{!! $errors->first('yahoo_1', '<span class="help-inline text-danger">:message</span>') !!}
				</div>
			</div>

			<div class="form-group {{ $errors->has('yahoo_2') ? 'has-error' : '' }}">
				<label for="yahoo" class="col-sm-3 control-label">{{ trans('form.settings.yahoo_2') }}</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="yahoo_2" name="yahoo_2" placeholder="{{ trans('form.settings.yahoo_2') }}" value="{{ Request::old('yahoo_2', $website->yahoo_2) }}" />
					{!! $errors->first('yahoo_2', '<span class="help-inline text-danger">:message</span>') !!}
				</div>
			</div>

			<div class="form-group {{ $errors->has('yahoo_3') ? 'has-error' : '' }}">
				<label for="yahoo" class="col-sm-3 control-label">{{ trans('form.settings.yahoo_3') }}</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="yahoo_3" name="yahoo_3" placeholder="{{ trans('form.settings.yahoo_3') }}" value="{{ Request::old('yahoo_3', $website->yahoo_3) }}" />
					{!! $errors->first('yahoo_3', '<span class="help-inline text-danger">:message</span>') !!}
				</div>
			</div>

			{{-- Setting Skype--}}
			<div class="form-group {{ $errors->has('skype_1') ? 'has-error' : '' }}">
				<label for="skype" class="col-sm-3 control-label">{{ trans('form.settings.skype_1') }}</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="skype_1" name="skype_1" placeholder="{{ trans('form.settings.skype_1') }}" value="{{ Request::old('skype_1', $website->skype_1) }}" />
					{!! $errors->first('skype_1', '<span class="help-inline text-danger">:message</span>') !!}
				</div>
			</div>

			<div class="form-group {{ $errors->has('skype_2') ? 'has-error' : '' }}">
				<label for="skype" class="col-sm-3 control-label">{{ trans('form.settings.skype_2') }}</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="skype_2" name="skype_2" placeholder="{{ trans('form.settings.skype_2') }}" value="{{ Request::old('skype_2', $website->skype_2) }}" />
					{!! $errors->first('skype_2', '<span class="help-inline text-danger">:message</span>') !!}
				</div>
			</div>

			<div class="form-group {{ $errors->has('skype_3') ? 'has-error' : '' }}">
				<label for="skype" class="col-sm-3 control-label">{{ trans('form.settings.skype_3') }}</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="skype_3" name="skype_3" placeholder="{{ trans('form.settings.skype_3') }}" value="{{ Request::old('skype_3', $website->skype_3) }}" />
					{!! $errors->first('skype_3', '<span class="help-inline text-danger">:message</span>') !!}
				</div>
			</div>

			{{-- Mô tả ngắn --}}
			<div class="form-group {{ $errors->has('short_description') ? 'has-error' : '' }}">
				<label for="skype" class="col-sm-3 control-label">{{ trans('form.settings.short_description') }}</label>
				<div class="col-sm-6">
					<textarea class="form-control" id="short_description" name="short_description" placeholder="{{ trans('form.settings.short_description') }}">{{ Request::old('short_description', $website->short_description) }}</textarea>
					{!! $errors->first('short_description', '<span class="help-inline text-danger">:message</span>') !!}
				</div>
			</div>

			{{-- Bài viết giới thiệu về công ty--}}
			<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
				<label for="description" class="col-sm-3 control-label">{{ trans('form.settings.description') }}</label>
				<div class="col-sm-9">
					<textarea class="form-control ckeditor" id="description" name="description" placeholder="{{ trans('form.settings.description') }}">{{ Request::old('description', $website->description) }}</textarea>
					{!! $errors->first('description', '<span class="help-inline text-danger">:message</span>') !!}
				</div>
			</div>

			{{-- Liên hệ công ty--}}
			<div class="form-group {{ $errors->has('contact') ? 'has-error' : '' }}">
				<label for="contact" class="col-sm-3 control-label">{{ trans('form.settings.contact') }}</label>
				<div class="col-sm-9">
					<textarea class="form-control ckeditor" id="contact" name="contact" placeholder="{{ trans('form.settings.contact') }}">{{ Request::old('contact', $website->contact) }}</textarea>
					{!! $errors->first('contact', '<span class="help-inline text-danger">:message</span>') !!}
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-6">
					<button type="submit" class="btn btn-primary"><i class="fa fa-pencil"></i> {{ trans('form.btn.update') }}</button>
					<a href="{{ url('/admin/settings/website') }}" class="btn btn-link">{{ trans('form.btn.back') }}</a>
				</div>
			</div>
			{!! csrf_field() !!}
		</form>
	</div>
@stop