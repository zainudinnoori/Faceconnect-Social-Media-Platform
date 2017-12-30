@extends('layouts.homemaster')
@section('profilecontent')

<div role="tabpanel" class="tab-pane active" id="tabs-2-tab-1">
		@foreach($users as $user)
			<article class="box-typical profile-post" style="background-color: #E8E8E8">
				<div class="profile-post-header">
					<div class="user-card-row">
						<div class="tbl-row">
							<div class="tbl-cell tbl-cell-photo">

								<a style="color: black" href=/user/{{ $user->id }}>
								<img style="height: 55px; width: 55px" src="/images/{{ $user->image }}">

							</div>
									<h4 style="color: darkred">{{ $user->name }}</h3>&nbsp</h4>
									<small style="color: darkblue">Joined on {{ $user->created_at}}</small>
									<br>
									<span style="color: darkblue" ><i class="fa  fa-envelope-open"></i>&nbsp {{ $user->email }} </span>
						</div>
						</a>
								
					</div>
						<div>
						<b>{{ $user->clocation}}&nbsp&nbsp{{ $user->ccountry }}</b><br>
						<small>Followers:&nbsp&nbsp&nbsp{{ count($user->follow) }}&nbsp<i class="fa fa-user"></i></small><br>
						<small>Followings:&nbsp&nbsp{{ count($user->followings) }}&nbsp<i class="fa fa-user"></i></small>
						</div>
				</div>
			</article>
			@endforeach
		</div>									
@endsection
@section('scripts')
<script type="text/javascript">
		
</script>
@endsection

