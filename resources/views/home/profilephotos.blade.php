@extends('layouts.profilemaster')
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
		<div class="container">
			<div class="row" style="margin-bottom:25px">
				@if(count($photos))
				@foreach($photos as $photo)
					<div class="col-md-2" style="height: 200px;" id="photo-block-{{ $photo->id }}">
						<img  class="img img-thumbnail image " id="myImg-{{$photo->id}}" photo-id="{{$photo->id}}"  style="padding: 3px; border:5px groove lightblue ;margin:5px" height="171px" width="171px" src="/images/{{ $photo->photo.'_tumbinal'.$photo->extension }}"  alt="no pic">
						<div  style="position: relative; margin-left: 45%">
							<a class="photo-delete" photo-id="{{ $photo->id }}" title="Delete photo">
								<i style="color: red" class="fa fa-trash"></i>
							</a>
						</div>
					</div>
				@endforeach
				{{-- if there are no images --}}
				@else
					<div class="col-md-10 col-lg-10">
						<h1 style="color:red" align="center">No Photos <i class="fa fa-picture-o" style="color: blue"></i></h1>
						<h4 align="center">It looks you haven't post any photos yet </h4>
					    <form method="post" action="post" enctype="multipart/form-data">
				    		{{csrf_field()}}
							<div class="image-upload" align="center">
							    <label for="file-input">
								        <i style="color:lightblue" class="fa fa-plus fa-4x" title="Add photo to your gallery"></i>
							    </label>
							    <input type="file" id="file-input" name="images[]" multiple ><br>
						   		 <button style="margin-bottom:10px" class="btn btn-sm btn-default">Post</button>
							</div>
							</form>
							<h5 align="center">Click on '+' sign and add images to your gallery</h5>
					</div>
				@endif
				
			</div>
		</div>
		{{-- modal for images  --}}
		<div id="myModal" class="modal">
			<span class="close">&times;</span>
		    <div id="myCarousel" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
					<div class="item active" id="activeimage"></div>
					@foreach($photos as $photo)
						<div class="item photoid">
							<img src='/images/{{ $photo->photo.'_orginal'.$photo->extension }}' alt="" style="width:50%; margin:auto">
						</div>
					@endforeach
				
			</div>
			<a class="left carousel-control" href="#myCarousel" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" data-slide="next">
		 		<span class="glyphicon glyphicon-chevron-right"></span>
		 		<span class="sr-only">Next</span>
			</a> 
		</div>
		</div>
	</article>
	
</div>									
@endsection
@section('scripts')
<script>
	$('.image').click(function(){
		var photo_id = $(this).attr('photo-id');
		var src = $(this).attr('src');
		var modal = document.getElementById('myModal');
		modal.style.display = "block";
		$('.photoid').removeClass('active');
		$('#activeimage').empty();
		$('#activeimage').addClass('active');
		$('#activeimage').html('<img src='+src+' alt="" style="width:50%; margin:auto">');
		var span = document.getElementsByClassName("close")[0];
		span.onclick = function() { 
		    modal.style.display = "none";
		}
	});

	$('.carousel').carousel({
    interval: false
	}); 

	$('.close').click(function(){
		$('.item').removeClass('active');
	})

</script>
@endsection