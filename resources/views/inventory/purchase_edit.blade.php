@extends('layout.master')
@section('content')
<html>
<head>
	<title>Add Customer</title>
</head>

	<div class="flash-message">
    @foreach (['danger'] as $msg)
		@if($errors->first('purchase_name'))
			<p class="alert alert-{{ $msg }}">Purchase Name is Required<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
		@endif
    @endforeach
	</div> <!-- end .flash-message -->


<body>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Purchase Forms
      </h1>
    </section>
<section class="content">
<div class="form-group">
<form action="{{action('InventoryController@updatePurchase')}}" method="post">
<input type="hidden" name="_token" value="<?= csrf_token(); ?>" >
<input type="hidden" name="purchase_id" value="<?= $row->purchase_id ?>" >
	<div class="box box-default">
		<div class="box-header with-border">
				<div class="box-body">
					<div class="row">
						<div class="col-lg-12">
										<div class="row">
											<div class="col-lg-6">
											  <label><font color=red>*</font> Purchase Name</label>
											  <input type="text" class="form-control" name="purchase_name" value="<?= $row->purchase_name ?>" placeholder="Purchase Name">
											</div>
											<div class="col-lg-6">
											<label>Purchasing Date (yyyy-mm-dd)</label>
											  <div class="input-group date">
													<div class="input-group-addon">
														<i class="fa fa-calendar"></i>
													</div>
												<input type="text" class="form-control pull-right" name="purchase_date" value="<?= $row->purchase_date ?>" id="datepicker1">
											  </div>
											</div>
										</div>
										
										<br>
										<label>Purchase Description</label>
											<textarea name="purchase_desc" class="form-control" rows="8" placeholder="Purchase Description" style="overflow:auto;resize:none" ><?= $row->purchase_desc ?></textarea>
										<br>
						</div>
					</div>
					<br><br><font color=red>*</font> Indicate Mandatory field
				</div>
		</div>
	</div>
<input type="hidden" class="form-control" name="company" value="{{ Auth::user()->company }}">
<input type="submit" value="Save Record" class="btn btn-primary">
<a href="<?php echo '../inventory_purchase' ?>" class="btn btn-primary btn-warning">Cancel</a>
</form>
</div>
</section>

</body>
</html>
@stop()