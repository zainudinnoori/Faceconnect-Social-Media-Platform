<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container-fluid">
	<div class="row">
	<div class="col-md-6"  id="playhere">
		<video width="780"  height="440" controls style="border:2px solid red">
	</div>
	<div class="col-md-3 col-md-offset-2">
	<div class="col-md-12">
		<div class="panel">
			<div class="panel-body">
							<video width="300" class="imagvedio" height="200" src="/vedios/1.mp4" style="border:2px solid red">
			</video>
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="panel">
			<div class="panel-body">
				<video width="300" class="imagvedio" height="200" src="/vedios/2.mp4" style="border:2px solid red">
			</video>
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="panel">
			<div class="panel-body">
							<video width="300" class="imagvedio" height="200" src="/vedios/3.mp4" style="border:2px solid red">
			</video>
			</div>
			How we can add a template here 
		</div>
	</div>
		<div class="col-md-2">
		<div class="panel">
			<div class="panel-body">
							<video width="300" class="imagvedio" height="200" src="/vedios/4.mp4" style="border:2px solid red">
			</video>
			</div>
		</div>
	</div>
		<div class="col-md-12">
		<div class="panel">
			<div class="panel-body">
							<video width="300" class="imagvedio" height="200" src="/vedios/5.mp4" style="border:2px solid red">
			</video>
			</div>
		</div>
	</div>
		<div class="col-md-12">
		<div class="panel">
			<div class="panel-body">
							<video width="300" class="imagvedio" height="200" src="/vedios/6.mp4" style="border:2px solid red">
			</video>
			</div>
		</div>
	</div>
</div>
</div>
</div>
</div>
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
<script>
	$('.imagvedio').click(function(){
		var play = $(this).attr('src');
		$('#playhere').empty();
		$('#playhere').html('<video width="780" controls="" height="440" style="border:2px solid red" src='+play+' autoplay="autoplay"></video>');
	});
</script>
</body>
</html>