@extends('layouts.homemaster')
@section('profilecontent')

<div role="tabpanel" class="tab-pane active" id="tabs-2-tab-1">
			
	@include('home.singlepost')	

</div>									
@endsection
@section('scripts')
@if(Session::has('PostShared'))
        <script type="text/javascript">
            swal(
              'Done!',
              '{{ session('PostShared') }}',
              'success'
            )
        </script>
    </script>
@endif
<script type="text/javascript">

	     function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
               
                reader.onload = function (e) {
                    $('#image-display')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(150);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
					
</script>
@endsection

