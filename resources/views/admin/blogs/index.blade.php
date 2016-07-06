@extends('admin/layouts/master')

@section('main-content')
	<section class="panel">
		<header class="panel-heading">
			<h4>
				QUẢN LÝ BLOGS
				<a href="{{ route('blog.create') }}" class="btn btn-xs btn-primary pull-right"><i class="fa fa-plus"></i> {{ trans('form.btn.create') }}</a>
			</h4>
			<span id="kq"></span>
		</header>
		<div class="panel-body">
			<div class="adv-table">
				<div class="dataTables_wrapper">
					<form method="get" action="" class="form-filter form-inline">
						<label>Tiêu đề <input type="text" name="title" class="form-control search-box-modules input-sm" placeholder="Tiêu đề" value="{{ Request::get('title', '') }}"></label>
						<label>Danh mục
							<select name="category" id="" class="form-control input-sm">
								<option value="0" >Danh mục</option>
								@foreach($categories as $category)
									<option value="{{ $category->id }}" {{ $category->id == Request::get('category', '') ? 'selected="selected"' : '' }}>{{ $category->mask }}</option>
								@endforeach
							</select>
						</label>
						<button type="submit" class="btn btn-default btn-sm"><i class="fa fa-search"></i> {{ trans('form.btn.search') }}</button>
					</form>
					<hr>
					<table class="display table table-bordered table-striped">
						<thead>
							<tr>
								<th width="50">#</th>
								<th width="140">Ảnh</th>
								<th class="sorting" aria-sort="descending" url-sort="/admin/blogs{{ createLinkSort2('title') }}">Tiêu đề</th>
								<th width="140" class="sorting" aria-sort="descending" url-sort="/admin/blogs{{ createLinkSort2('user_id') }}">Tác giả</th>
								<th width="70" class="sorting" aria-sort="descending" url-sort="/admin/blogs{{ createLinkSort2('active') }}">Active</th>
								<th width="70" class="sorting" aria-sort="descending" url-sort="/admin/blogs{{ createLinkSort2('hot') }}">Hot</th>
								<th colspan="2" align="center">{{ trans('table.actions') }}</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($blogs as $key => $blog)
								<tr>
									<td>{{ $key + 1 }}</td>
									<td>
										<a href="{{ $blog->getUrl() }}" class="blog-image img-thumbnail" style="background: url('{{ $blog->getThumbnail('sm_') }}') center center no-repeat; height: 60px; width: 100px; background-size: cover; display: block;"></a>
									</td>
									<td>{{ $blog->title }}</td>
									<td>{{ $blog->author->name }}</td>
									@if(Entrust::hasRole('superadmin'))
									<td class="text-center">
										<a href="{{ route('blog.active', $blog->id) }}" class="btn-active btn btn-xs btn-primary">{{ $blog->showCheckActive() }}</a>
									</td>
									<td class="text-center">
										<a href="{{ route('blog.hot', $blog->id) }}" class="btn-active btn btn-xs btn-primary">{{ $blog->showCheckHot() }}</a>
									</td>
									@else
									<td class="text-center">
										<a href="" class="btn-active btn btn-xs btn-primary">{{ $blog->showCheckActive() }}</a>
									</td>
									<td class="text-center">
										<a href="" class="btn-active btn btn-xs btn-primary">{{ $blog->showCheckHot() }}</a>
									</td>
									@endif
									<td width="70" class="text-center">
										<a href="{{ route('blog.edit', $blog->id) }}" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a>
									</td>
									<td width="70" class="text-center">
										<a href="{{ route('blog.destroy', $blog->id) }}" class="btn btn-xs btn-danger btn-delete-action"><i class="fa fa-trash-o"></i></a>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
					@include('admin/partials/paginate', ['data' => $blogs, 'appended' => ['title' => Request::get('title'), 'category' => Request::get('category_id')]])
				</div>
			</div>
		</div>
	</section>
@stop
@section('script')
<script type="text/javascript">
	$(function() {
	   $('.sorting').click(function(ev) {
	      return window.location.href = $(this).attr('url-sort');
	   });
	});
</script>
@stop