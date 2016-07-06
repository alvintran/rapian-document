@extends('admin/layouts/master')

@section('main-content')
	<section class="panel">
		<header class="panel-heading">
			<h4>
				{{ trans('admin/general.modules.category') }}
				<a href="{{ route('admin.category.create') }}" class="btn btn-xs btn-primary pull-right"><i class="fa fa-plus"></i> {{ trans('form.btn.create') }}</a>
			</h4>
		</header>

		<div class="panel-body">
			<div class="adv-table">
				<div class="dataTables_wrapper">
					<form method="get" action="" class="form-filter form-inline">
						<label>{{ trans('form.categories.category_name') }} <input type="text" name="name" class="form-control search-box-modules input-sm" placeholder="Tìm theo tên danh mục" value="{{ Request::get('name', '') }}"></label>
						<label>{{ trans('form.categories.type') }}
							<select name="type" id="type" class="form-control input-sm">
								<option value="0">{{ trans('form.categories.type') }}</option>
								@foreach($type as $key => $value)
									<option value="{{ $key }}" {{ Request::get('type') == $key ? 'selected="selected"' : '' }} >{{ $value }}</option>
								@endforeach
							</select>
						</label>
						<button type="submit" class="btn btn-default btn-sm"><i class="fa fa-search"></i> {{ trans('form.btn.search') }}</button>
					</form>
					<hr>
					<table class="display table table-bordered table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th>{{ trans('form.categories.category_name') }}</th>
								<th>{{ trans('form.categories.type') }}</th>
								<th width="50" class="text-center">{{ trans('table.active') }}</th>
								<th width="50" class="text-center">{{ trans('table.edit') }}</th>
								<th width="50" class="text-center">{{ trans('table.delete') }}</th>
							</tr>
						</thead>

						<tbody>
							@if(count($category) > 0)
								@foreach($category as $key => $cate)
									<tr>
										<td width="50">{{ $key + 1 }}</td>
										<td class="{{ $cate->level == 2 || $cate->level == 1  ? 'text-strong' : '' }}">{{ $cate->mask }}</td>
										<td width="150" class="text-center"><label class="btn {{ $cate->showBtnCss() }} btn-xs">{{ $cate->level == 1 ? $cate->showType() : '' }}</label></td>
										<td>
											{!! makeActiveButton(route('admin.category.active', [$cate->getId()]), $cate->getStatus()) !!}
										</td>
										<td class="text-center">
											{!! makeEditButton(route('admin.category.edit', [$cate->getId()])) !!}
										</td>
										<td>
											{!! makeDeleteButton(route('admin.category.destroy', [$cate->getId()])) !!}
										</td>
									</tr>
								@endforeach
							@else
								<tr>
									<td colspan="4" class="text-center">Chưa có danh mục nào!</td>
								</tr>
							@endif
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
@stop