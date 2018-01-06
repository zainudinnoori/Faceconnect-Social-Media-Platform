@extends('layouts.master')
@section('profilecontent')
<style type="text/css">
	.name-bordered{
		border:1px dashed blue!important;
		padding:5px;
		
	}
	.inputs-unbordered{
		border:none!important;
		/*padding:5px;*/		
	}

</style>
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
					<span class="nav-link-in">Setting</span>
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
		<table class="table table-condensed">
			<thead>
				<th colspan="3">Update your information and privacy
					<span style="margin-left: 10em ">
						<button onclick="update()" class="btn btn-group btn-primary"  >Edit</button>
						<button onclick="cancleupdate()" class="btn btn-group btn-danger" >Cancel</button>
					</span>
				</th>
			</thead>
			<tbody>
				<form method="POST" action="profile/{{ Auth::id() }}">
					{{ csrf_field() }}
					{{ method_field('PUT')}}
					<tr>
						<td>Name:</td>
						<td>
							<input class="editable-inputs" id="name" disabled  style="border-color:transparent;" type="" value="{{ Auth::user()->name }}" name="name">
							{{-- <span id="update_name" style="color:red;font-weight: bold;visibility:hidden; ">Update</span> --}}
						</td>
						<td>
							<button style="border: 0;background-color: transparent;" type="submit" class="comment-row-item-action edit">
								<span class="pencle_icon" style="color :blue"></span>
							</button>
						</td>
					</tr>
					<tr>
						<td>Email:</td>
						<td>
							<input class="editable-inputs" disabled style="border-color:transparent;" type="" value="{{ Auth::user()->email }}" name="email"></td>
						<td>
							<button style="border: 0;background-color: transparent;" type="submit" class="comment-row-item-action edit">
								<span class="pencle_icon" style="color :gray"></span>
							</button>
						</td>
					</tr>
					<tr>
						<td>Country:</td>
						<td>
							@include('home.countries')
						</td>
						<td>
							<button style="border: 0;background-color: transparent;" type="submit" class="comment-row-item-action edit">
								<span class="pencle_icon" style="color :gray"></span>
							</button>
						</td>
					</tr>
					<tr>
						<td>Local address:</td>
						<td>
							<input class="editable-inputs" disabled style="border-color:transparent;" type="" value="{{ Auth::user()->clocation }}" name="clocation">
						</td>
						<td>
							<button style="border: 0;background-color: transparent;" type="submit" class="comment-row-item-action edit">
								<span class="pencle_icon" style="color :gray"></span>
							</button>
						</td>
					</tr>
					<tr>
						<td>Date of birth</td>
						<td>
							<input class="editable-inputs" disabled style="border-color:transparent;" type="" value="{{ Auth::user()->dob }}" id="datepicker" name="dob">
						</td>
						<td>
							<button  style="border: 0;background-color: transparent;" type="submit" class="comment-row-item-action edit">
								<span class="pencle_icon" style="color :gray"></span>
							</button>
						</td>
					</tr>
					<tr>
						<td>Gender</td>
						<td>
							<select class="editable-inputs" disabled style="border-color:transparent; value="{{ Auth::user()->gender }}" name="gender">
								<option>Male</option>
								<option>Female</option>
							</select>
							{{-- <input class="editable-inputs" disabled style="border-color:transparent;" type="" value="{{ Auth::user()->gender }}" name="gender"> --}}
							
						</td>
						<td>
							<button  style="border: 0;background-color: transparent;" type="submit" class="comment-row-item-action edit">
								<span class="pencle_icon" style="color :gray"></span>
							</button>
						</td>
					</tr>
					<tr>
						<td>About</td>
						<td>
							<textarea class="write-something editable-inputs" disabled style="border-color:transparent;" name="about"> 
								{{ Auth::user()->about }} 
							</textarea>
						</td>
						<td>
							<button  style="border: 0;background-color: transparent;" type="submit" class="comment-row-item-action edit">
								<span class="pencle_icon" style="color :gray"></span>
							</button>
						</td>
					</tr>
					<tr>
						<td colspan="3">
							<button onclick="update()" id="save-changes-button" hidden class="btn btn-group btn-warning center-block">Save Changes</button>
						</td>
					</tr>
				</form>
			</tbody>
		</table>
	</article>

</div>									
@endsection
@section('scripts')
	
	<script type="text/javascript">
		function update(){
			$('.pencle_icon').html('...<i class="fa fa-pencil"></i>');
			$(".editable-inputs").addClass('name-bordered');
			$(".editable-inputs").removeClass('inputs-unbordered');
			$('#name').focus(); 
			$('.editable-inputs').removeAttr('disabled');
		}

  	function cancleupdate(){
  		$(".editable-inputs").addClass('inputs-unbordered');

  		$(".editable-inputs").removeClass('name-bordered');
  		$('.pencle_icon').html('');
  		$('.editable-inputs').Attr('disabled');
  		$('#save-changes-button').removeAttr('hidden');
  	}

  $( function() {
    $( "#datepicker" ).datepicker();
  } );

	</script>

@endsection