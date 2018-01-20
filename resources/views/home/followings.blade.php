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
			<a class="nav-link" href='photos' role="tab" data-toggle="tab">
				<span class="nav-link-in">Photos</span>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href='followers' role="tab" data-toggle="tab">
				<span class="nav-link-in">Followers</span>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link active" href='followings' role="tab" data-toggle="tab">
				<span class="nav-link-in">Followings</span>
			</a>
		</li>
	</ul>
	@endsection
	<article class="box-typical profile-post">
		<table class="table table-striped">
			@if(count($followings))
			<div class="container">
					<div class="row">
				@foreach($followings as $following)
							<div class="col-sm-3 col-md-3 col-lg-3">
								<div class="panel panel-body" id="panel-{{ $following->id }}" style="border-color: #eee;margin:5px; ">
									<div class="content"  style="padding-bottom:20px">
										<div class="content-left" style="position: relative;">
											<a href="/user/{{ $following->id }}">
											<img src='/images/{{ $following->image }}' width="80px" height="80px" class="img img-circle" style="border: 3px dashed green;padding: 2px;margin:-3px"> 
											</a>
										</div>
										<div class="content-body" style="position: absolute; display: block; padding-right: 20px;right: 2px;top:10px; width:150px;word-wrap: break-word;">
											<span class="content-name">{{ $following->name }}</span><br>
											<span class="content-info">
												{{ $following->clocation }}{{ $following->ccountry }} <br>
												<button user_id="{{ $following->id }}" class="btn btn-sm btn-primary unfollow" style="margin: 5px" title="Unfollow {{ $following->name }}">Unfollow</button>
											</span>
										</div>
									</div>
								</div>
							</div>
							@endforeach

							</div>
						</div>
						<center>{{ $followings->links() }}</center>
				@else
					<div class="col-sm-6 col-md-6 col-lg-6 col-md-offset-3" style="padding:10px">
						<h3>Welcome</h3>
						<h1 style="color: darkred">You Have No Followings yet</h1>
						<h2>Search and find friends</h2>
						<form id="searchthis" action="/search" style="float: left;" method="get">
							{{ csrf_field() }}
							<input id="namanyay-search-box" name="search_text" type="text" placeholder="Search for a friend"/>
							<input id="namanyay-search-btn" value="Go" type="submit"/>
						</form>	
					</div>
				@endif
		</table>
	</article>
	
</div>									
@endsection
@section('scripts')
	<script>

		$('.unfollow').on('click',function(e) {
			var user_id = $(this).attr('user_id');
			var data = {_token:'{{ csrf_token() }}',method:'post'};
			$.ajax({
				url: "/unfollow/"+user_id,
				type: "POST",
				data: data,
				dataType:"html"
				,
				success: function ()
		        {	
		        	$('#panel-'+user_id).fadeOut("slow");
				}
		});
	});

	</script>

@endsection