@extends('layouts.profilemaster')
@section('profilecontent')
<style type="text/css">
	
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
				<a class="nav-link active" href='#' role="tab" data-toggle="tab">
					<span class="nav-link-in">Setting</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="/photos" role="tab" data-toggle="tab">
					<span class="nav-link-in">Photos</span>
				</a>
			</li>
			<li class="nav-item">
			<a class="nav-link" href='/followers' role="tab" data-toggle="tab">
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
	<div class="container" style="margin: -16px  0px 0px 0px">
		<div class="row">
	        <div style="width: 100%">
	            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 bhoechie-tab-menu">
	              <div class="list-group">
	                <a href="#" class="list-group-item active text-center">
	                 <center> <i class="fa fa-cog fa-2x" aria-hidden="true"></i><br/>Genral settings</center>
	                </a>
	                <a href="#" class="list-group-item text-center">
	                <center> <i class="fa fa-shield fa-2x" aria-hidden="true"></i><br/>Security</center>
	                </a>
	                <a href="#" class="list-group-item text-center">
	                <center> <i class="fa fa-user-secret fa-2x" aria-hidden="true"></i><br/>Privacy</center>
	                </a>
	                <a href="#" class="list-group-item text-center">
	                 <center><i class="fa fa-users fa-2x" aria-hidden="true"></i><br/>Followers</center>
	                </a>
	                <a href="#" class="list-group-item text-center">
	                <center> <i class=" fa fa-lock fa-2x" aria-hidden="true"></i><br/>Blocking</center>
	                </a>
	              </div>
	            </div>
	            <div class="col-lg-10 col-md-8 col-sm-11 col-xs-11 bhoechie-tab">
	                <!-- Genral setting section -->
	                <div class="bhoechie-tab-content active" style="margin:5px; margin-bottom:0px" >
						<table class="table table-condensed">
							<thead>
								<th colspan="3">Update your information and privacy
									<span style="margin-left: 10em ">
										<button id="edit-button" class="btn btn-group btn-primary"  >Edit</button>
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
											</button>
												<span class="pencle_icon" style="color :gray"></span>
										</td>
									</tr>
									<tr>
										<td>Country:</td>
										<td id="cCountries">
											<input type="text" class="inputs-unbordered" id="currentCountry" name=""
												 style="border-color:none;" value="{{ Auth::user()->ccountry }}">
											@include('home.countries')
										</td>
										<td>
											<button style="border: 0;background-color: transparent;" type="submit" class="comment-row-item-action edit">
											</button>
												<span class="pencle_icon" style="color :gray"></span>
										</td>
									</tr>
									<tr>
										<td>Local address:</td>
										<td>
											<input class="editable-inputs" disabled style="border-color:transparent;" type="" value="{{ Auth::user()->clocation }}" name="clocation">
										</td>
										<td>
											<button style="border: 0;background-color: transparent;" type="submit" class="comment-row-item-action edit">
											</button>
												<span class="pencle_icon" style="color :gray"></span>
										</td>
									</tr>
									<tr>
										<td>Date of birth:</td>
										<td id="date-of-birth">
											<input class="editable-inputs" disabled style="border-color:transparent;" type="" value="{{ Auth::user()->dob }}" id="datepicker" name="dob">
										</td>
										<td id="date-of-birth-edit" hidden>
											<div  class="editable-inputs">
											 <select aria-label="Day" name="birthday_day" id="day" title="Day" class="_5dba">
		                                        @for($i=1 ;$i<=31 ;$i++)
		                                        <option value="{{$i}}">{{$i}}</option>
		                                        @endfor
		                                        </select>
		                                    <select aria-label="Month" name="birthday_month" id="month" title="Month" class="_5dba">
		                                        <option value="0">Month</option>
		                                        <option value="1">Jan</option>
		                                        <option value="2">Feb</option>
		                                        <option value="3">Mar</option>
		                                        <option value="4">Apr</option>
		                                        <option value="5">May</option>
		                                        <option value="6">Jun</option>
		                                        <option value="7">Jul</option>
		                                        <option value="8">Aug</option>
		                                        <option value="9">Sep</option>
		                                        <option value="10">Oct</option>
		                                        <option value="11">Nov</option>
		                                        <option value="12" selected="1">Dec</option>
		                                    </select>
		                                        <select aria-label="Year" name="birthday_year" id="year" title="Year" class="_5dba">
		                                        @for($i=2017 ;$i>=1950 ;$i--)
		                                        <option value="{{$i}}">{{$i}}</option>
		                                        @endfor
		                                    </select>
		                                </div>
										</td>
										<td>
											<button  style="border: 0;background-color: transparent;" type="submit" class="comment-row-item-action edit">
											</button>
												<span class="pencle_icon" style="color :gray"></span>
										</td>
									</tr>
									<tr>
										<td>Gender:</td>
										<td>
											<input type="text" id="gender" disabled class="inputs-unbordered" value="{{ Auth::user()->gender }}"/>
											<div class="form-group" hidden id="gender-select">
												<select class=" form-control editable-inputs" style="border-color:transparent; width:14em" value="{{ Auth::user()->gender }}" name="gender">
													<option>Male</option>
													<option>Female</option>
												</select>
											</div>
										</td>
										<td>
											<button  style="border: 0;background-color: transparent;" type="submit" class="comment-row-item-action edit">
											</button>
												<span class="pencle_icon" style="color :gray"></span>
										</td>
									</tr>
									<tr>
										<td>Bio</td>
										<td>
											<textarea class="write-something editable-inputs"
											 style="border-color:transparent; padding: 0px" disabled name="about">{{ Auth::user()->about }}</textarea>
										</td>
										<td>
											<button  style="border: 0;background-color: transparent;" type="submit" class="comment-row-item-action edit">
											</button>
												<span class="pencle_icon" style="color :gray"></span>
										</td>
									</tr>
									<tr id="save-cancle-operations" hidden>
										<td colspan="3">
											<div class="btn btn-group" id="oprations" hidden style="left: 35%">
												<button id="save-changes" class="btn btn-group btn-warning center-block">Save Changes</button>
												<a id="cancle-edit" href="/setting" class="btn btn-group btn-danger" >Cancel</a>
											</div>
										</td>
									</tr>
								</form>

							</tbody>
						</table>
	                </div>
	                <!-- train section -->
	                <div class="bhoechie-tab-content">
	                    <center>
	                      
	                      <h2 style="margin-top: 0;color:#55518a">Coming Soon Security options</h2>
	                    </center>
	                </div>
	    
	                <!-- hotel search -->
	                <div class="bhoechie-tab-content">
	                    <center>
	                      <h2 style="margin-top: 0;color:#55518a">Coming Soon Privacy</h2>
	                    </center>
	                </div>
	                <div class="bhoechie-tab-content">
	                    <center>
	                      <h2 style="margin-top: 0;color:#55518a">Coming Soon Followers setting</h2>
	                    </center>
	                </div>
	                <div class="bhoechie-tab-content">
	                    <center>
	                      <h2 style="margin-top: 0;color:#55518a">Coming Soon Blocking users</h2>
	                    </center>
	                </div>
	            </div>
	        </div>
	  </div>
	</div>
	</article>

</div>									
@endsection
@section('scripts')
	
	<script type="text/javascript">
	$('#edit-button').click(function(){
			$(".editable-inputs").removeClass('inputs-unbordered');
			$(".editable-inputs").addClass('name-bordered');
			$('#name').focus(); 
			$('.pencle_icon').html('...<i class="fa fa-pencil"></i>');
			$('.editable-inputs').removeAttr('disabled');
			$('#oprations').removeAttr('hidden');
			$('#currentCountry').attr('hidden','hidden');
			$('#cCountry').removeAttr('hidden');
			$('#edit-button').attr('hidden','hidden');
			$('#gender-select').removeAttr('hidden');
			$('#gender').attr('hidden','hidden');
			$('#save-cancle-operations').removeAttr('hidden');
			$('#date-of-birth-edit').removeAttr('hidden');
			$('#date-of-birth').attr('hidden','hidden');

		})

  // 	$('#cancle-edit').click(function(event){
  // 		event.preventDefault();
  // 		$(".editable-inputs").removeClass('name-bordered');
  // 		$(".editable-inputs").addClass('inputs-unbordered');
  // 		$('.pencle_icon').html('');
  // 		$('.editable-inputs').attr('disabled');
  // 		$('#oprations').attr('hidden','hidden');
		// $('#currentCountry').removeAttr('hidden');
		// $('#edit-button').removeAttr('hidden');
		// $('#cCountry').attr('hidden','hidden');
		// $('#gender-select').attr('hidden','hidden');
		// $('#gender').removeAttr('hidden');
		// $('.inputs-unbordered').attr('disabled','disabled');


  // 	})

  	$(document).ready(function() {
	 $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
        $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
    });
});

  $( function() {
    $( "#datepicker" ).datepicker();
  } );

	</script>

@endsection