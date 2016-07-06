@extends('admin/layouts/master')

@section('main-content')
	<h1>{{ trans('admin/general.modules.dashboard') }}</h1>
	<!--mini statistics start-->
	<div class="row">
		 <div class="col-md-3">
			  <div class="mini-stat clearfix">
					<span class="mini-stat-icon orange"><i class="fa fa-gavel"></i></span>
					<div class="mini-stat-info">
						 <span>320</span>
						 New Order Received
					</div>
			  </div>
		 </div>
		 <div class="col-md-3">
			  <div class="mini-stat clearfix">
					<span class="mini-stat-icon tar"><i class="fa fa-tag"></i></span>
					<div class="mini-stat-info">
						 <span>22,450</span>
						 Copy Sold Today
					</div>
			  </div>
		 </div>
		 <div class="col-md-3">
			  <div class="mini-stat clearfix">
					<span class="mini-stat-icon pink"><i class="fa fa-money"></i></span>
					<div class="mini-stat-info">
						 <span>34,320</span>
						 Dollar Profit Today
					</div>
			  </div>
		 </div>
		 <div class="col-md-3">
			  <div class="mini-stat clearfix">
					<span class="mini-stat-icon green"><i class="fa fa-eye"></i></span>
					<div class="mini-stat-info">
						 <span>32720</span>
						 Unique Visitors
					</div>
			  </div>
		 </div>
	</div>
	<!--mini statistics end-->
@stop