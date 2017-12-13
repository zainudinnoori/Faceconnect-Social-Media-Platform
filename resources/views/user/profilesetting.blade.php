@extends('layouts.master')
@section('profilecontent')

<div role="tabpanel" class="tab-pane active" id="tabs-2-tab-1">
	@section('tabheader')
		<ul class="nav" role="tablist">
			<li class="nav-item">
				<a class="nav-link" href="/profile" role="tab" data-toggle="tab">
					<span class="nav-link-in">My Posts</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link active" href='/setting' role="tab" data-toggle="tab">
					<span class="nav-link-in">setting</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="/photos" role="tab" data-toggle="tab">
					<span class="nav-link-in">Photos</span>
				</a>
			</li>
		</ul>
	@endsection
	<article class="box-typical profile-post">
		
	</article>

</div>									
@endsection