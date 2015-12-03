@extends('admin/layouts/master')

@section('style')
	<link rel="stylesheet" type="text/css" href="/js/jquery-tags-input/jquery.tagsinput.css" />
	<link rel="stylesheet" type="text/css" href="/js/ckeditor/contents.css">
	<style type="text/css">
	#cke_116_fileInput {
		height: 500px !important;
	}
	</style>
@stop

@section('main-content')

	<h3>{{ trans('admin/general.create_info') . ' ' }}Blog</h3>
	<div class="panel-body">
		<form class="form-horizontal bucket-form" method="post" action="{{ route('blog.store') }}" enctype="multipart/form-data">

			<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
				<label for="title" class="col-sm-2 control-label">Tiêu đề <b class="text-danger">*</b></label>
				<div class="col-sm-10">
			   	<input type="text" class="form-control" id="title" name="title" placeholder="Tiêu đề bài viết" value="{{ Request::old('title') }}" />
			   	{!! $errors->first('title', '<span class="help-inline text-danger">:message</span>') !!}
				</div>
			</div>

			<div class="form-group">
				<label for="image" class="col-sm-2 control-label">Ảnh mô tả <b class="text-danger">*</b></label>
				<div class="col-sm-10">
					<input name="image" type="file" class="form-control" placeholder='Image' />
					{!! $errors->first('image', '<span class="help-inline text-danger">:message</span>') !!}
				</div>
			</div>

			<div class="form-group {{ $errors->has('teaser') ? 'has-error' : '' }}">
				<label for="teaser" class="col-sm-2 control-label">Tóm tắt <b class="text-danger">*</b></label>
				<div class="col-sm-10">
				   <input type="text" class="form-control" id="teaser" name="teaser" placeholder="Tóm tắt bài viết" value="{{ Request::old('teaser') }}" />
					{!! $errors->first('teaser', '<span class="help-inline text-danger">:message</span>') !!}
				</div>
			</div>

			<div class="form-group">
				<label for="active_hot" class="col-sm-2 control-label">Danh mục <b class="text-danger">*</b></label>
				<div class="col-sm-10 {{ $errors->has('active') ? 'has-error' : '' }}">
					<select name="category_id" id="category" class="form-control">
						@foreach($categories as $category)
						<option value="{{ $category->id }}">{{ $category->mask }}</option>
						@endforeach
					</select>
			   	{!! $errors->first('category', '<span class="help-inline text-danger">:message</span>') !!}
				</div>
			</div>

			<div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
				<label for="content" class="col-sm-2 control-label">Nội dung <b class="text-danger">*</b></label>
				<div class="col-sm-10">
				{{-- 	<textarea class="form-control" id="content" name="content" placeholder="Nội dung bài viết"></textarea> --}}
			   	<textarea class="form-control ckeditor" placeholder="Nội dung bài viết" name="content" rows="6" style="visibility: hidden; display: none;">{{ Request::old('content') }}</textarea>
			   	{!! $errors->first('content', '<span class="help-inline text-danger">:message</span>') !!}
				</div>
			</div>

			<div class="form-group">
				<label class=" col-md-2 control-label">Tags</label>
				<div class="col-md-10">
				   <input id="tags_1" name="tags" type="text" class="tags" value="{{ Request::old('tags') }}" />
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
			   	<button type="submit" class="btn btn-primary"><i class="fa fa-pencil"></i> {{ trans('form.btn.create') }}</button>
			   	<a href="{{ route('blog.store') }}" class="btn btn-link">{{ trans('form.btn.back') }}</a>
				</div>
			</div>
			{!! csrf_field() !!}
			{{-- <input type="file" name="avatar" id="avatar"> --}}
		</form>
	</div>
@stop
@section('script')
<script type="text/javascript" src="/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
<script src="/js/jquery-tags-input/jquery.tagsinput.js"></script>
<script type="text/javascript" src="/js/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
$(function() {
	CKEDITOR.replace( 'content',{
	   filebrowserBrowseUrl : '/browser/browse.php',
	   filebrowserUploadUrl : '/uploader/upload.php'
	});

	// $('#tags_1').tagsInput({width:'auto'});

	// Input tags
	$('#tags_1').tagsInput({
		autocomplete_url: '/api/tags/tags.json',
		width: "auto",
		defaultText: "Thêm tag",
		placeholderColor: "#666"
	});
});
</script>
@stop