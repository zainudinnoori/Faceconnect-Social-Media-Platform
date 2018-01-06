@extends('layouts.usermaster')
@section('profilecontent')

<div role="tabpanel" class="tab-pane active" ">
	@section('tabheader')
	<ul class="nav" role="tablist">
		<li class="nav-item">
			<a class="nav-link" href=/user/{{ $user->id }} role="tab" data-toggle="tab">
				<span class="nav-link-in">Posts</span>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link active" href='photos' role="tab" data-toggle="tab">
				<span class="nav-link-in">Photos</span>
			</a>
		</li>
	</ul>
	@endsection
	<article class="box-typical profile-post">
		@if(count($photos))
		<ul style="list-style: none ;padding: 10px">
			@foreach($photos as $photo)
				<li  style="display: inline;padding: 20px" >
					<img  class="img img-responsive" style="padding: 5px; border: 1px solid blue;margin:5px"" src="/images/{{ $photo->photo.'_tumbinal'.$photo->extension }}"  height="200px" width="200px" alt="no pic">
					{{-- {{ $photo->created_at->toFormattedDateString() }} --}}
				</li>
			@endforeach
		</ul>
        @else
                <h1 style="color: red" align="center">No photo posted by {{ $user->name }} </h1>
                <h1 align="center"><i style="color: blue" class="fa fa-picture-o fa-1x"></i>
        @endif
	</article>
	
</div>									
@endsection