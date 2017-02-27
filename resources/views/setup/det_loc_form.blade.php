@extends('layout.master')
@section('content')
<html>
<head>
	<title>Add Detail Location</title>
</head>

	<div class="flash-message">
    @foreach (['danger'] as $msg)
		@if($errors->first('det_loc_name'))
			<p class="alert alert-{{ $msg }}">State Name is Required<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
		@endif
    @endforeach
	</div> <!-- end .flash-message -->


<body>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Detail Location Forms
      </h1>
    </section>
<section class="content">
<div class="form-group">
<form action="{{action('SetupController@save_det_loc')}}" method="post">
<input type="hidden" name="_token" value="<?= csrf_token(); ?>" >
	<div class="box box-default">
		<div class="box-header with-border">
				<div class="box-body">
					<div class="row">
						<div class="col-md-12">
										<div class="row">
											<div class="col-lg-6">
											  <label><font color=red>*</font> Detail Location Name</label>
											  <input type="text" class="form-control" name="det_loc_name" placeholder="Detail Location Name">											  
											</div>
										</div>
						</div>
					</div>
					<br><font color=red>*</font> Indicate Mandatory field
				</div>
		</div>
	</div>
<input type="hidden" class="form-control" name="company" value="{{ Auth::user()->company }}">
<input type="submit" value="Save Record" class="btn btn-primary">
<a href="<?php echo 'setup_det_loc' ?>" class="btn btn-primary btn-warning">Cancel</a>
</form>
</div>
</section>

</body>
</html>
@stop()