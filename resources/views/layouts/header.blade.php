
{{-- <input type="text" name="search_text" id="search_text" placeholder='Search Text'> --}}
<form id="searchthis" action="/search" style="display:inline;" method="get">
	{{ csrf_field() }}
	<input id="namanyay-search-box" name="search_text" type="text" placeholder="Search for a friend"/>
	<input id="namanyay-search-btn" value="Go" type="submit"/>
</form>

<span class="col-lg-offset-1">
	<img class="img img-circle img-responsive" src=/images/{{ Auth::user()->image }} width="45px" height="45px">
</span>
<a href="/profile" style="color: black;">
	<span>
		<strong>{{ Auth::user()->name }}</strong>
	</span>
</a>
<span class="col-sm-offset-1">
	<a href="/home"><i class="fa fa-home fa-lg" style="color:darkblue" aria-hidden="true" title="Home"></i></a>
</span>&nbsp &nbsp&nbsp &nbsp
<span>
	<i class="fa fa-comments fa-lg" style="color:red" aria-hidden="true" title="Messages!"></i>
</span>&nbsp &nbsp

<span>
	<i class="fa fa-globe fa-lg" style="color:blue" aria-hidden="true" title="Notifications!" ></i>

<span class="col-lg-offset-1">
	<a href="/logout"><b>Logout</b></a>
</span>