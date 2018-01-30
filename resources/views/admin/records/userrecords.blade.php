@extends('admin.layouts.adminmaster')
@section('content')
<div class="container-fluid">
    <div class="col-md-3">
        <div class="panel panel-info">
            <div class="panel-heading">
                <span style="font-size: 25px">List of all users</span><br>
                <input class="form-control system-search" id="" name="q" placeholder="Search for" required>
            </div>
            <div class="panel-body" style="max-height: 500px; overflow:scroll;">
                <table class="table table-list-search" id="example">
                    <tbody>
                    @foreach($users as $key => $user)
                        <tr>
                            <td>{{ $key }} </td>
                            <td>{{ $user->name }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" id="menu1" type="button" data-toggle="dropdown"><span class="caret"></span></button>
                                    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1" style="left:-125px">
                                      <li role="presentation"><a role="menuitem" tabindex="-1" href="/Impersonate/user/{{ $user->id }}">Impersonate</a></li>
                                      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Suspend account</a></li>
                                      <li role="presentation" style="background-color: red"><a role="menuitem" tabindex="-1" href="/admin/delete/user/{{ $user->id }}">Delete account</a></li>
                                    </ul>
                                </div>
                            </td>
                            {{-- <td><a href="/Impersonate/user/{{ $user->id }}">Impersonate</a> </td> --}}
                        </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-9">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                       <h3> Currently registered users</h3>
                </div>
                <div class="panel-body text-center">
                    <span style="font-size: 65px;">{{ $noOfUsers }}</span><sub>People</sub>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                       <h3> Currently users Relations</h3>
                </div>
                <div class="panel-body text-center">
                    <span style="font-size: 65px;">{{ $noOfRelations }}</span><sub>Relations</sub>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                       <h3>Currently users <span style="font-size: 15px">Like & Comments</span></h3>
                </div>
                <div class="panel-body text-center">
                    <span style="font-size: 65px;">{{ $noOfLikes+$noOfComments }}</span><sub>Times</sub>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                       <h3>Online users</h3>
                </div>
                <div class="panel-body text-center">
                    <span style="font-size: 65px;">22</span><sub>Users</sub>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="row">
        <div class='col-md-3'>
            <h4>Search report of previous days</h4>
        </div>
         <div class='col-md-2'>
            <div class="form-group">
                <div class='input-group date' id='datetimepicker6'>
                    <input type='text' id="fromdate" class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group">
                <div class='input-group date' id='datetimepicker7'>
                    <input type='text' id="todate" class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
        <div class="div col-md-1">
            <button class="btn btn btn-primary" id="search"> Go</button>
        </div>
    </div>
{{--     <div class="row" >
        <div class="col-md-6 col-md-offset-3 text-center">
            Searching...
        </div>
    </div> --}}
    <div class="row" id="searchResult" hidden>
        <div class="col-md-9 col-md-offset-3">
        <div class="col-md-4">
        <div class="panel panel-danger">
            <div class="panel-heading">
                   <h3>registered users</h3>
            </div>
            <div class="panel-body text-center">
                <span style="font-size: 65px;" id="registerdUsers">2500</span><sub>people</sub>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-danger">
            <div class="panel-heading">
                   <h3>users Relations</h3>
            </div>
            <div class="panel-body text-center">
                <span style="font-size: 65px;" id="userRelations">2500</span><sub>people</sub>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-danger">
            <div class="panel-heading">
                   <h3>users <span style="font-size: 20px" > Likes & Comments</span></h3>
            </div>
            <div class="panel-body text-center">
                <span style="font-size: 65px;" id="userLikeComments">2500</span><sub>people</sub>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">

    $('#search').click(function(){
    var fromdate= $('#fromdate').val();
    var todate= $('#todate').val();
    var data={fromdate:fromdate,todate:todate,method:'get',_token:'{{ csrf_token() }}'}
    $.ajax(
    {
      url:'/admin/user/search',
      type: 'get',
      dataType: "JSON",
      data: data,
            success: function (data)
            { 
                swal(
                  'Success!',
                  'Result found.',
                  'success'
                )
                $('#searchResult').removeAttr('hidden');
                $('#registerdUsers').text('502');
                $('#userRelations').text('5000');
                $('#userLikeComments').text('800');
            }
        });
      // console.log("It failed");
});

    function myFunction() {
      var input, filter, table, tr, td, i;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = document.table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
          if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }       
      }
    }

    $(document).ready(function(){
    $(".dropdown-toggle").dropdown();
});

$(document).ready(function() {
    var activeSystemClass = $('.list-group-item.active');

    //something is entered in search form
    $('.system-search').keyup( function() {
       var that = this;
        // affect all table rows on in systems table
        var tableBody = $('.table-list-search tbody');
        var tableRowsClass = $('.table-list-search tbody tr');
        $('.search-sf').remove();
        tableRowsClass.each( function(i, val) {
        
            //Lower text for case insensitive
            var rowText = $(val).text().toLowerCase();
            var inputText = $(that).val().toLowerCase();
            if(inputText != '')
            {
                $('.search-query-sf').remove();
                tableBody.prepend('<tr class="search-query-sf"><td colspan="6"><strong>Searching for: "'
                    + $(that).val()
                    + '"</strong></td></tr>');
            }
            else
            {
                $('.search-query-sf').remove();
            }

            if( rowText.indexOf( inputText ) == -1 )
            {
                //hide rows
                tableRowsClass.eq(i).hide();
                
            }
            else
            {
                $('.search-sf').remove();
                tableRowsClass.eq(i).show();
            }
        });
        //all tr elements are hidden
        if(tableRowsClass.children(':visible').length == 0)
        {
            tableBody.append('<tr class="search-sf"><td class="text-muted" colspan="6">No entries found.</td></tr>');
        }
    });
});
    $(function () {
        $('#datetimepicker6').datetimepicker();
        $('#datetimepicker7').datetimepicker({
            useCurrent: false //Important! See issue #1075
        });
        $("#datetimepicker6").on("dp.change", function (e) {
            $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
        });
        $("#datetimepicker7").on("dp.change", function (e) {
            $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
        });
    });
</script>

@endsection