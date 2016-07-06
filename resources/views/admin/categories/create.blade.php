@extends('admin/layouts/master')

@section('main-content')
	<h3>{{ trans('admin/general.create_info') . ' ' . trans('admin/general.modules.cate') }}</h3>
	<div class="panel-body">
		<form class="form-horizontal bucket-form" method="post" action enctype="multipart/form-data">

			<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
				<label for="name" class="col-sm-3 control-label">{{ trans('form.categories.category_name') }} <b class="text-danger">*</b></label>
				<div class="col-sm-6">
					<input type="name" class="form-control" id="name" name="name" placeholder="{{ trans('form.categories.category_name') }}" value="{{ Request::old('name') }}" />
					{!! $errors->first('name', '<span class="help-inline text-danger">:message</span>') !!}
				</div>
			</div>

			<div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
				<label for="type" class="col-sm-3 control-label">{{ trans('form.categories.type') }} <b class="text-danger">*</b></label>
				<div class="col-sm-6">
					<select name="type" id="type" class="form-control">
						<option value="0">{{ trans('form.categories.type') }}</option>
						@foreach($type as $key => $value)
							<option value="{{ $key }}" {{ Request::old('type') == $key ?  'selected=selected' : '' }}>{{ $value }}</option>
						@endforeach
					</select>
					{!! $errors->first('type', '<span class="help-inline text-danger">:message</span>') !!}
				</div>
			</div>

			<div class="form-group {{ $errors->has('parent_id') ? 'has-error' : '' }} parent">
				<label for="parent_id" class="col-sm-3 control-label">{{ trans('form.categories.parent_id') }}</label>
				<div class="col-sm-6">
					<select name="parent_id" id="parent_id" class="populate select2" style="width: 100%; padding: 10px 0px; height: 30px;">
						<option value="0">{{ trans('form.categories.parent_id') }}</option>
						@foreach($categories as $category)
							<option value="{{ $category->id }}" {{ Request::old('parent_id') == $category->id ?  'selected=selected' : '' }}>{{ $category->mask }}</option>
						@endforeach
					</select>
					{!! $errors->first('parent_id', '<span class="help-inline text-danger">:message</span>') !!}
				</div>
			</div>

			<div class="form-group {{ $errors->has('icon') ? 'has-error' : '' }}">
				<label for="icon" class="col-sm-3 control-label">{{ trans('form.categories.icon') }} </label>
				<div class="col-sm-6">
					<input type="icon" class="form-control" id="icon" name="icon" placeholder="{{ trans('form.categories.icon') }}" value="{{ Request::old('icon') }}" />
					<p class="help-block">Support: <a href="http://getbootstrap.com/components/#glyphicons" target="_blank">Bootstrap</a> - <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">Fontawesome</a></p>
					{!! $errors->first('icon', '<span class="help-inline text-danger">:message</span>') !!}
				</div>
			</div>

			<div class="form-group {{ $errors->has('background') ? 'has-error' : '' }}">
				<label for="background" class="col-sm-3 control-label">{{ trans('form.categories.background') }} </label>
				<div class="col-sm-6">
					<input type="background" class="form-control" id="background" name="background" placeholder="{{ trans('form.categories.background') }}" value="{{ Request::old('background') }}" />
					{!! $errors->first('background', '<span class="help-inline text-danger">:message</span>') !!}
				</div>
			</div>

			<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
				<label for="description" class="col-sm-3 control-label">{{ trans('form.categories.description') }} </label>
				<div class="col-sm-6">
					<textarea type="description" class="form-control" id="description" name="description" placeholder="{{ trans('form.categories.description') }}">{{ Request::old('description') }}</textarea>
					{!! $errors->first('description', '<span class="help-inline text-danger">:message</span>') !!}
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-6">
					<button type="submit" class="btn btn-primary"><i class="fa fa-pencil"></i> {{ trans('form.btn.create') }}</button>
					<a href="{{ url('/admin/categories') }}" class="btn btn-link">{{ trans('form.btn.back') }}</a>
				</div>
			</div>
			{!! csrf_field() !!}
		</form>
	</div>
@stop