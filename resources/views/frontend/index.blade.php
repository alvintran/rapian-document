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
		<div class="row" id="">
			<div class="col-sm-6">
				<h3 class="text-center"><span>Bạn muốn</span></h3>
				<div class="text-center">
					<button class="btn btn-lg btn-primary">Tạo đơn hàng</button>
					<button class="btn btn-lg btn-default">Tìm hàng</button>
				</div>
			</div>
			<div class="col-sm-6">
				<h3 class="text-center"><span>Nguồn hàng tham khảo</span></h3>
				<div class="row">
					<ul class="list-unstyled col-sm-4 col-xs-4">
						<li><i class="fa fa-shopping-cart"></i> Thời trang</li>
						<li><a href="#"><i class="fa fa-amazon"></i> Amazon</a></li>
						<li><a href="#"><i class="fa fa-usd"></i> Amazon US</a></li>
						<li><a href="#"><i class="fa fa-usd"></i> Amazon US</a></li>
						<li><a href="#"><i class="fa fa-usd"></i> Amazon US</a></li>
					</ul>
					<ul class="list-unstyled col-sm-4 col-xs-4">
						<li><i class="fa fa-shopping-cart"></i> Công nghệ</li>
						<li><a href="#"><i class="fa fa-shopping-cart"></i> Amazon US</a></li>
						<li><a href="#"><i class="fa fa-shopping-cart"></i> Amazon US</a></li>
						<li><a href="#"><i class="fa fa-shopping-cart"></i> Amazon US</a></li>
						<li><a href="#"><i class="fa fa-shopping-cart"></i> Amazon US</a></li>
					</ul>
					<ul class="list-unstyled col-sm-4 col-xs-4">
						<li><i class="fa fa-shopping-cart"></i> Đồ gia dụng</li>
						<li><a href="#"><i class="fa fa-shopping-cart"></i> Amazon US</a></li>
						<li><a href="#"><i class="fa fa-shopping-cart"></i> Amazon US</a></li>
						<li><a href="#"><i class="fa fa-shopping-cart"></i> Amazon US</a></li>
						<li><a href="#"><i class="fa fa-shopping-cart"></i> Amazon US</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<h3 class="text-center"><span>Đang khuyến mại</span></h3>
				<ul class="list-unstyled product-items row">
					<li class="col-sm-3 col-xs-6">
						<div class="product-item">
							<h4 class="product-name">Apple Iphone 6S Gold Rose 64GB</h4>
							<p><span class="product-price">23.500.000<sup>₫</sup></span> <span class="product-price-origin">29.000.000<sup>₫</sup></span></p>
							<a class="product-img" href="#"><img src="http://ss.nguyenhats.com/uploads/thumbs/big/d1aebc3416f9cfec3de42d52fc04cfad6a63ea34.jpg"></a>
							<p class="text-center"><a href="#" class="btn btn-default btn-sm">Xem chi tiết</a> <a href="#" class="btn btn-danger btn-sm"><i class="fa fa-shopping-cart"></i> Đặt mua</a></p>
						</div>
					</li>
					<li class="col-sm-3 col-xs-6">
						<div class="product-item">
							<h4 class="product-name">Apple Iphone 6S Gold Rose 64GB</h4>
							<p><span class="product-price">23.500.000<sup>₫</sup></span></p>
							<a class="product-img" href="#"><img src="http://ss.nguyenhats.com/uploads/thumbs/big/d1aebc3416f9cfec3de42d52fc04cfad6a63ea34.jpg"></a>
							<p class="text-center"><a href="#" class="btn btn-default btn-sm">Xem chi tiết</a> <a href="#" class="btn btn-danger btn-sm"><i class="fa fa-shopping-cart"></i> Đặt mua</a></p>
						</div>
					</li>
					<li class="col-sm-3 col-xs-6">
						<div class="product-item">
							<h4 class="product-name">Apple Iphone 6S Gold Rose 64GB</h4>
							<p><span class="product-price">23.500.000<sup>₫</sup></span></p>
							<a class="product-img" href="#"><img src="http://ss.nguyenhats.com/uploads/thumbs/big/d1aebc3416f9cfec3de42d52fc04cfad6a63ea34.jpg"></a>
							<p class="text-center"><a href="#" class="btn btn-default btn-sm">Xem chi tiết</a> <a href="#" class="btn btn-danger btn-sm"><i class="fa fa-shopping-cart"></i> Đặt mua</a></p>
						</div>
					</li>
					<li class="col-sm-3 col-xs-6">
						<div class="product-item">
							<h4 class="product-name">Apple Iphone 6S Gold Rose 64GB</h4>
							<p><span class="product-price">23.500.000<sup>₫</sup></span></p>
							<a class="product-img" href="#"><img src="http://ss.nguyenhats.com/uploads/thumbs/big/d1aebc3416f9cfec3de42d52fc04cfad6a63ea34.jpg"></a>
							<p class="text-center"><a href="#" class="btn btn-default btn-sm">Xem chi tiết</a> <a href="#" class="btn btn-danger btn-sm"><i class="fa fa-shopping-cart"></i> Đặt mua</a></p>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
@stop

@section('scripts')
	<script type="text/javascript" src="/owl-carousel/owl.carousel.min.js"></script>
	<script type="text/javascript">
		$(function() {
			$("#home-slider").owlCarousel({
				slideSpeed : 500,
				paginationSpeed : 400,
				singleItem: true,
				autoPlay: true
			});
		});
	</script>
@stop