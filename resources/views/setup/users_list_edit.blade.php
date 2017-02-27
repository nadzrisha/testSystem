@extends('layout.master')
@section('content')
<html>
<head>
	<title>Add Courier</title>
</head>
	<div class="flash-message">
    @foreach (['danger'] as $msg)
		@if($errors->first('name'))
			<p class="alert alert-{{ $msg }}">Name is Required<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
		@endif
		@if($errors->first('username'))
			<p class="alert alert-{{ $msg }}">Username is Required<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
		@endif
		@if($errors->first('company'))
			<p class="alert alert-{{ $msg }}">Company is Required<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
		@endif
		@if($errors->first('password'))
			<p class="alert alert-{{ $msg }}">Password is Required<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
		@endif
    @endforeach
	</div> <!-- end .flash-message -->
<body>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        EditUsers Forms
      </h1>
    </section>
<section class="content">
<div class="form-group">
<form action="{{action('SetupController@update_users')}}" method="post">
<input type="hidden" name="_token" value="<?= csrf_token(); ?>" >
<input type="hidden" name="id" value="<?= $row->id ?>" >
	<div class="box box-default">
		<div class="box-header with-border">
				<div class="box-body">
					<div class="row">
						<div class="col-md-12">
										<div class="row">
											<div class="col-xs-12">
											  <label>Name</label>
											  <input type="text" class="form-control" name="name" value="<?= $row->name ?>" placeholder="Name">											  
											</div>
											<div class="col-xs-12"><br>
											  <label>Username</label>
											  <input type="text" class="form-control" name="username" value="<?= $row->username ?>" placeholder="Username">											  
											</div>
											<div class="col-xs-12"><br>
											  <label>Company</label>
											  <input type="text" class="form-control" name="company" value="<?= $row->company ?>" placeholder="Company">											  
											</div>
											<div class="col-xs-12"><br>
											  <label>Password</label>
											  <input type="text" class="form-control" name="password" value="<?= $row->password ?>" placeholder="Password">											  
											</div>
										</div>
						</div>
					</div>
					<br>
				</div>
		</div>
	</div>
<input type="submit" value="Update Record" class="btn btn-primary">
<a href="<?php echo '../register_user' ?>" class="btn btn-primary btn-warning">Cancel</a></form>
</form>
</div>
</section>

</body>
</html>
@stop()