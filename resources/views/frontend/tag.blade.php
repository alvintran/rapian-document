@extends('frontend/layouts/master')

@section('main-content')
<h1>Tags</h1><hr>
@foreach($allTags as $tag)
	<a href="" class="tag-content">{{ $tag->tag }}</a>
@endforeach
@stop