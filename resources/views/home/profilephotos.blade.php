@extends('layouts.master')
@section('profilecontent')

<div role="tabpanel" class="tab-pane active" ">
	@section('tabheader')
	<ul class="nav" role="tablist">
		<li class="nav-item">
			<a class="nav-link" href="/profile" role="tab" data-toggle="tab">
				<span class="nav-link-in">My Posts</span>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href='/setting' role="tab" data-toggle="tab">
				<span class="nav-link-in">setting</span>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link active" href='photos' role="tab" data-toggle="tab">
				<span class="nav-link-in">Photos</span>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href='followers' role="tab" data-toggle="tab">
				<span class="nav-link-in">Followers</span>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href='/followings' role="tab" data-toggle="tab">
				<span class="nav-link-in">Followings</span>
			</a>
		</li>
	</ul>
	@endsection
	<article class="box-typical profile-post">
		<ul style="list-style: none ;padding: 10px">
			@foreach($photos as $photo)
				<li  style="display: inline;padding: 20px" >
					<img  class="img img-responsive" style="padding: 5px; border: 1px solid blue;margin:5px"" src="/images/{{ $photo->photo }}"  height="200px" width="200px" alt="no pic">
					{{-- {{ $photo->created_at->toFormattedDateString() }} --}}
				</li>
			@endforeach
		</ul>
	</article>
	
</div>									
@endsection