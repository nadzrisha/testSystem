@extends('layout.master')
@section('content')
<html>
<head>
	<title>Add Customer  Item</title>
</head>

	<div class="flash-message">
    @foreach (['danger'] as $msg)
		@if($errors->first('cust_item_name'))
			<p class="alert alert-{{ $msg }}">Item Name is Required<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
		@endif
    @endforeach
	</div> <!-- end .flash-message -->


<body>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Item Forms
      </h1>
    </section>
<section class="content">
<div class="form-group">
<form action="{{action('SetupController@save_cust_item')}}" method="post">
<input type="hidden" name="_token" value="<?= csrf_token(); ?>" >
	<div class="box box-default">
		<div class="box-header with-border">
				<div class="box-body">
					<div class="row">
						<div class="col-lg-12">
										<div class="row">
											<div class="col-lg-6">
											  <label><font color=red>*</font> Item Name</label>
											  <input type="text" class="form-control" name="cust_item_name" placeholder="Item Name">
											  
											</div>
										</div>
										
										<br>
										<label>Item Description</label>
											<textarea name="cust_item_desc" class="form-control" rows="8" placeholder="Item Description" style="overflow:auto;resize:none" ></textarea>
										<br>
						</div>
					</div>
					<br><font color=red>*</font> Indicate Mandatory field
				</div>
		</div>
	</div>
<input type="hidden" class="form-control" name="company" value="{{ Auth::user()->company }}">
<input type="submit" value="Save Record" class="btn btn-primary">
<a href="<?php echo 'setup_cust_item' ?>" class="btn btn-primary btn-warning">Cancel</a>
</form>
</div>
</section>

</body>
</html>
@stop()