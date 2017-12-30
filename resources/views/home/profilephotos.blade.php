@extends('layouts.master')
@section('profilecontent')

<div role="tabpanel" class="tab-pane active" ">
	@section('tabheader')
	<ul class="nav" role="tablist">
		<li class="nav-item">
			<a class="nav-link" href="profile" role="tab" data-toggle="tab">
				<span class="nav-link-in">My Posts</span>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href='setting' role="tab" data-toggle="tab">
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
			<a class="nav-link" href='followings' role="tab" data-toggle="tab">
				<span class="nav-link-in">Followings</span>
			</a>
		</li>
	</ul>
	@endsection
	<article class="box-typical profile-post">
		<div style="list-style: none ;padding: 10px">
			@foreach($photos as $photo)
				<div  style="padding: 20px;display: inline;" >
					<img  class="img img-responsive" style="padding: 3px; border: 1px solid blue;margin:5px"" src="/images/{{ $photo->photo }}"  height="171px" width="171px" alt="no pic">
					{{-- {{ $photo->created_at->toFormattedDateString() }} --}}
				</div>
			@endforeach
		</div>
	</article>
	
</div>									
@endsection