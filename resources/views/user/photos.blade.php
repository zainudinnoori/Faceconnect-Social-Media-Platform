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
		<div class="container">
			<div class="col-md-12">
				<div class="row">
					@foreach($photos as $photo)
						<img style="display: inline" width="200px" data-toggle="modal" data-target="#showimage-{{ $photo->id }}" height="200px" class="img img-responsive show-orginal-image" src= "/images/{{ $photo->photo.'_tumbinal'.$photo->extension }}" name="{{ $photo->photo}}" extension="{{ $photo->extension }}">
						  <div class="modal fade" id="showimage-{{ $photo->id }}" role="dialog">
						    <div class="modal-dialog">
						      <div class="modal-content-orginal">
						      </div>
						    </div>
						  </div>
					@endforeach
				</div>
			</div>
		</div>
        @else
                <h1 style="color: red" align="center">No photo posted by {{ $user->name }} </h1>
                <h1 align="center"><i style="color: blue" class="fa fa-picture-o fa-1x"></i>
        @endif
	</article>
	
</div>									
@endsection