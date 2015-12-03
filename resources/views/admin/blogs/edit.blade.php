@extends('admin/layouts/master')

@section('main-content')
	<link rel="stylesheet" type="text/css" href="/js/jquery-tags-input/jquery.tagsinput.css" />
	<link rel="stylesheet" type="text/css" href="/js/ckeditor/contents.css">
	<h3>{{ trans('admin/general.create_info') . ' ' }}Sửa blog</h3>
	<div class="panel-body">
		<form class="form-horizontal bucket-form" method="post" action="{{ route('blog.update', $blog->id) }}" enctype="multipart/form-data">
			<div class="form-group">
				<label for="image" class="col-sm-2 control-label">Ảnh mô tả <b class="text-danger">*</b></label>
				<div class="col-sm-2">
					<img src="{{ $blog->getThumbnail() }}" alt="" width="140">
				</div>
				<div class="col-sm-8">
					{{-- <button class="btn btn-warning btn-sm" id="upload"><i class="fa fa-refresh"></i>	Chọn ảnh</button> --}}
					<input name="image" type="file" class="form-control" placeholder='Image' />
					{!! $errors->first('image', '<span class="help-inline text-danger">:message</span>') !!}
				</div>
			</div>
			<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
				<label for="title" class="col-sm-2 control-label">Tiêu đề <b class="text-danger">*</b></label>
				<div class="col-sm-10">
			   	<input type="text" class="form-control" id="title" name="title" placeholder="Tiêu đề bài viết" value="{{ Request::old('title') ? Request::old('title') : $blog->title }}" />
			   	{!! $errors->first('title', '<span class="help-inline text-danger">:message</span>') !!}
				</div>
			</div>
			<div class="form-group {{ $errors->has('teaser') ? 'has-error' : '' }}">
				<label for="teaser" class="col-sm-2 control-label">Tóm tắt <b class="text-danger">*</b></label>
				<div class="col-sm-10">
				   <input type="text" class="form-control" id="teaser" name="teaser" placeholder="Tóm tắt bài viết" value="{{ Request::old('teaser') ? Request::old('teaser') : $blog->teaser }}" />
					{!! $errors->first('teaser', '<span class="help-inline text-danger">:message</span>') !!}
				</div>
			</div>
			<div class="form-group">
				<label for="active_hot" class="col-sm-2 control-label">Danh mục <b class="text-danger">*</b></label>
				<div class="col-sm-10 {{ $errors->has('active') ? 'has-error' : '' }}">
					<select name="category_id" id="category" class="form-control">
						@foreach($categories as $category)
						<option value="{{ $category->id }}" {{ $category->id == $blog->category_id ? 'selected' : '' }}>{{ $category->mask }}</option>
						@endforeach
					</select>
			   	{!! $errors->first('category', '<span class="help-inline text-danger">:message</span>') !!}
				</div>
			</div>
			<div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
				<label for="content" class="col-sm-2 control-label">Nội dung <b class="text-danger">*</b></label>
				<div class="col-sm-10">
			   	<textarea class="form-control ckeditor" placeholder="Nội dung bài viết" name="content" rows="6" style="visibility: hidden; display: none;">{{ Request::old('content') ? Request::old('content') : $blog->content}}</textarea>
			   	{!! $errors->first('content', '<span class="help-inline text-danger">:message</span>') !!}
				</div>
			</div>
			<div class="form-group">
				<label class=" col-md-2 control-label">Tags</label>
				<div class="col-md-10">
				   <input id="tags_1" name="tags" type="text" class="tags" value="{{ $blog->tags }}" />
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
			   	<button type="submit" class="btn btn-primary"><i class="fa fa-pencil"></i> {{ trans('form.btn.update') }}</button>
			   	<a href="{{ route('blog.store') }}" class="btn btn-link">{{ trans('form.btn.back') }}</a>
				</div>
			</div>
			{!! csrf_field() !!}
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
		   filebrowserUploadUrl : '/admin/upload'
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