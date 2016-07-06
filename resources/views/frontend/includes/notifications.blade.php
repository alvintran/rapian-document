<ul>
	@foreach ($errors->all() as $error)
		<li class="text-danger">{{ $error }}</li>
	@endforeach
	@if (session('message'))
		<li class="text-danger">{{ session('message') }}</li>
	@endif
</ul>