<!-- footer -->
<div class="row">
	<ul class="list-unstyled brand-list mg-0">
		<li><img src="https://pusher.com/assets/home/landing_page/icon_github-962ff079d660cfe0fc4aeb5fc83f6bfc17fcecd121e57d6b7a8d5127d7ad20f2.png"></li>
		<li><img src="https://pusher.com/assets/home/landing_page/icon_cloudapp-1a5d62c8134f57a7092fb20d5cd905c3e8a07e21769d1203ca41fe3fde999569.png"></li>
		<li><img src="https://pusher.com/assets/home/landing_page/icon_mailchimp-31000fa24f616740847237493ab52bdb3dccd71087af6c0826eeb764ccc6bb72.png"></li>
		<li><img src="https://pusher.com/assets/home/landing_page/icon_itv-41b97d8a847a2b940fdcea8108d23091e8c4a2fd441f8f34a35a73473cb29f66.png"></li>
		<li><img src="https://pusher.com/assets/home/landing_page/icon_codeship-5e45c43e62b44558d339c7a3792ec9c6c0ae7747d26fa34144594b6515b66379.png"></li>
		<li><img src="https://pusher.com/assets/home/landing_page/icon_financial_times-ad4f77c312ecd6e4890dfbad604e6ddc303838ee65ec46c44dd9b298015b4766.png"></li>
		<li><img src="https://pusher.com/assets/home/landing_page/icon_quizup-30116388ce84595bf2466f585e8afdb1dd99f9a12ecf9f6f3afebdfef998c65c.png"></li>
	</ul>
</div>

<div id="footer" class="row">
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				<h3>{{ $metadata->getName() }}</h3>
				<p>{{ $metadata->getShortDescription() }}</p>
				<p><i class="fa fa-map-marker"></i> {{ $metadata->getAddress() }}</p>
				<p><i class="fa fa-phone-square"></i> {{ $metadata->getPhone_1() }}</p>
				@if ($metadata->getPhone_2())
					<p><i class="fa fa-phone-square"></i> {{ $metadata->getPhone_2() }}</p>
				@endif
				<p><i class="fa fa-envelope"></i> {{ $metadata->getEmail_1() }} </p>
				@if ($metadata->getEmail_2())
					<p><i class="fa fa-envelope"></i> {{ $metadata->getEmail_2() }} </p>
				@endif
			</div>
			<div class="col-sm-4">
				<h4><span>Thông tin</span></h4>
				<ul class="extra-info list-unstyled">
					<li><a href="#"><i class="fa fa-angle-right"></i> Hình thức thanh toán</a></li>
					<li><a href="#"><i class="fa fa-angle-right"></i> Hướng dẫn đặt hàng</a></li>
					<li><a href="#"><i class="fa fa-angle-right"></i> Hướng dẫn đổi trả hàng</a></li>
					<li><a href="#"><i class="fa fa-angle-right"></i> Khiếu nại sản phẩm</a></li>
					<li><a href="#"><i class="fa fa-angle-right"></i> Chính sách giao nhận hàng và bảo hành</a></li>
				</ul>
			</div>
			<div class="col-sm-4">
				<h4><span>Kết nối với chúng tôi tại</span></h4>
				<ul class="social-list list-unstyled">
					<li><a href="#" class="fa fa-facebook"></a></li>
					<li><a href="#" class="fa fa-google-plus"></a></li>
					<li><a href="#" class="fa fa-twitter"></a></li>
				</ul>
				<h4><span>Đăng ký nhận tin sản phẩm mới</span></h4>
<<<<<<< HEAD
				<form class="form-inline" method="POST" id="subscribe-form" action="/subscribe">
					{!! csrf_field() !!}
					<div class="form-group">
						<input type="email" class="form-control input-sm" id="subscriber" name="subscriber" placeholder="Email">
=======
				<form class="form-inline" method="POST" id="subscribe-form" action="">
					<div class="form-group">
						<input type="email" class="form-control input-sm" id="subscriber" name="subscriber" placeholder="Email">
						{!! csrf_field() !!}
>>>>>>> f7a80eeaab2f4bf874a5e83740af8c60f8779c89
					</div>
					<button type="submit" id="btn-subscribe" class="btn btn-danger btn-sm">Đăng ký</button>
					<p><small>Chúng tôi sẽ không spam bạn, bạn có thể hủy đăng ký bất cứ lúc nào.</small></p>
				</form>
			</div>
		</div>
	</div>
</div>
