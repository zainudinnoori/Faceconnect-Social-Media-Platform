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
			<a class="nav-link" href='/followings' role="tab" data-toggle="tab">
				<span class="nav-link-in">Followings</span>
			</a>
		</li>
	</ul>
	@endsection
	<article class="box-typical profile-post">
		<table class="table table-striped">
			<thead>
				<th colspan="4">
					Have a look on your followes
				</th>
				<tr>
					<th>.</th>
					<th>Name</th>
					<th>Followers</th>
					<th>Followings</th>
				</tr>


			</thead>		
			<tbody>
				{{-- {{ dd($followers) }} --}}
				@foreach($followers as $follower)
				
					<tr>
						
						<td>
							<a href=/user/{{ $follower->id }}> <img class="img img-rounded img-responsive" width="40px" height="40px" src=/images/{{ $follower->image }}> </a>
						</td>
						<td>
							<a style="color: black" href=/user/{{ $follower->id }}>{{ $follower->name }}</a>
						</td>
						<td>
							{{ count($follower->followers) }} &nbspPeople
						</td>
						<td>
							{{ count($follower->follow) }} &nbspPeople
						</td>
						
					</tr>
				
				@endforeach
				
			</tbody>
		</table>
	</article>
	
</div>									
@endsection