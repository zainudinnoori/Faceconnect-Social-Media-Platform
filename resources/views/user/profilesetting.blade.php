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
		<form method="POST" action="/post" enctype="multipart/form-data" class="box-typical">
		{{ csrf_field() }}
		<textarea class="write-something" name="post_body"  placeholder="What`s on your mind"></textarea>
		<div class="box-typical-footer">
			<div class="tbl">
				<div class="tbl-row">
					<div class="tbl-cell">
						<button type="button" class="btn-icon">
							<i class="fa fa-globe"></i>
						</button>
						<button type="button" class="btn-icon">
							<i class="font-icon fa-globe"></i>
						</button>
						<button type="button" class="btn-icon">
							<i class=" fa fa-globe"></i>
						</button>
					</div>
					<div class="tbl-cell tbl-cell-action">
						<button type="submit" class="btn btn-rounded">Send</button>
					</div>
				</div>
			</div>
		</div>
	</form><!--.box-typical-->
</div>									
@endsection