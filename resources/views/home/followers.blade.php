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
				<span class="nav-link-in">Settings</span>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href='photos' role="tab" data-toggle="tab">
				<span class="nav-link-in">Photos</span>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link active" href='followers' role="tab" data-toggle="tab">
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
		<table class="table table-striped">
			@if(count($followers))
			<div class="container">
				<div class="row">
					@foreach($followers as $follower)
						<div class="col-sm-3 col-md-3 col-lg-3 user-{{ $follower->id }}">
							<div class="panel panel-body" id="panel-{{ $follower->id }}" style="border-color: #eee ">
								<div class="content"  style="padding-bottom:15px">
									<div class="content-left" style="position: relative;">
										<a href="/user/{{ $follower->id }}">
										<img src='/images/{{ $follower->image }}' width="80px" height="80px" class="img img-circle" style="border: 3px dashed blue;padding: 2px"> 
										</a>
									</div>
									<div class="content-body" style="position: absolute; display: block; padding-right: 20px;right: 2px;top:10px; width:150px;word-wrap: break-word;">
										<span class="content-name">{{ $follower->name }}</span><br>
										<span class="content-info">
											{{ $follower->clocation }}{{ $follower->ccountry }} <br>
											<button user_id="{{ $follower->id }}" class="btn btn-sm btn-danger block-user" style="margin:5px">Block</button>

										</span>
									</div>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
			<center>{{ $followers->links() }}</center>
				@else
					<div class="col-sm-6 col-md-6 col-lg-6 col-md-offset-3" style="padding:10px">
						<h3>Welcome</h3>
						<h1 style="color: darkred">You Have No Followers yet</h1>
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