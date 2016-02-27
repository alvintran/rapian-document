@extends('frontend/layouts/master')

@section('styles')
	<link href="/owl-carousel/owl.carousel.css" rel="stylesheet">
@stop

@section('main-content')
	<div class="row">
		<div id="home-slider" class="owl-carousel owl-theme">
			<div class="item">
				<h1>Đặt hàng từ Nhật Bản dễ dàng với JPOrder</h1>
				{{-- <ul>
					<li>Hàng nội địa Nhật Bản</li>
					<li>KHÔNG sản xuất tại nước thứ 3</li>
					<li>Nhập khẩu chính ngạch</li>
					<li>KHÔNG phải hàng xách tay</li>
				</ul> --}}
				<img src="/images/jporder1.jpg" alt="JPO_1">
			</div>
			{{-- <div class="item">
				<img src="/images/jporder2.jpg" alt="JPO_2">
			</div>
			<div class="item">
				<img src="/images/jporder3.jpg" alt="JPO_3">
			</div>
			<div class="item">
				<img src="/images/jporder4.jpg" alt="JPO_4">
			</div>
			<div class="item">
				<img src="/images/jporder5.jpg" alt="JPO_5">
			</div> --}}
		</div>
	</div>
	<div id="make-request" class="row">
		<div class="container">
			<div class="row" id="inner-make-request">
				<div class="col-sm-4">
					<i class="pull-left fa fa-search"></i>
					<h2>Tìm và mua hộ hàng từ Nhật</h2>
					<p>Quý khách có yêu cầu cụ thể về mặt hàng cần mua hoặc cần tìm, vui lòng tạo một yêu cầu:</p>
				</div>
				<div class="col-sm-4">
					<i class="pull-left fa fa-thumbs-up"></i>
					<h2>Nhanh chóng và uy tín</h2>
					<p>Quý khách có yêu cầu cụ thể về mặt hàng cần mua hoặc cần tìm, vui lòng tạo một yêu cầu:</p>
				</div>
				<div class="col-sm-4">
					<i class="pull-left fa fa-phone"></i>
					<h2>Hỗ trợ 24/7</h2>
					<p>Quý khách có yêu cầu cụ thể về mặt hàng cần mua hoặc cần tìm, vui lòng tạo một yêu cầu:</p>
				</div>
			</div>
		</div>
	</div>
	<div class="container product-list">
		<div class="row">
			<h1>Upload to S3</h1>
			<form action="" method="POST" enctype="multipart/form-data">
			  	<div class="form-group">
			    	<label for="upload">File input</label>
			    	<input type="file" id="upload" name="upload">
			  	</div>
			  	<button type="submit" class="btn btn-default">Upload</button>
			  	{{ csrf_field() }}
			</form>
		</div>
	</div>
@stop
