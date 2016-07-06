@extends('frontend/layouts/master')

@section('main-content')
@if($blog)
	<div class="crumb">
		<span class="back">Bạn đang ở: </span>
		<div itemscope="article" itemtype="http://schema.org/WebPage">
			<ol class="breadcrumb" itemprop="breadcrumb">
				<li><a href="/">Trang chủ</a></li> &raquo;
				<li><a href="{{ route('frontend.blogByCategory', [$blog->category->id, $blog->category->slug]) }}">{{ $blog->category->name }}</a></li> &raquo;
				<li><a href="">Kỹ thuật trồng dâu tây</a></li>
			</ol>
		</div>
		<div class="clearfix"></div>
	</div>
	<h1 class="detail-title">{{ $blog->title }}</h1>
		<div class="text-right">
			<a href="{{ $blog->author->getUrlAut() }}" class="text-success">{{ $blog->author->nickname }}</a><br>
			<i class="timestamps see-more-color pull-right">Ngày viết: {{ $blog->created_at }}</i>
	</div>
	<p class="blog-teaser teaser">
		{{ $blog->teaser }}
	</p>
	<img src="{{ $blog->getThumbnail() }}" alt="" class="image">
	<div class="blog-content font-16">
		{!! $blog->content !!}
	</div>
	@if($blog->getTags() != '')
	<i class="fa fa-tags tag-icon"></i> <b class="tag-title">Tags:</b> {!! $blog->getTags() !!}
	@endif
	<br>
	<hr>
	<h2>Comments</h2>
	<div class="row">
		<div class="fb-like col-sm-12" data-share="true" data-show-faces="true"></div>
	</div>
	<div class="row">
		<div id="fb-root"></div>
		<div class="fb-comments col-sm-12" data-width="100%" data-href="{{ URL::current() }}" data-numposts="10"></div>
	</div>
@endif
@stop
@section('script')
<script>
window.fbAsyncInit = function() {
 FB.init({
   appId      : '469135149934644',
   xfbml      : true,
   version    : 'v2.4'
 });
};

(function(d, s, id){
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {return;}
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));


(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.4&appId=469135149934644";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
@stop