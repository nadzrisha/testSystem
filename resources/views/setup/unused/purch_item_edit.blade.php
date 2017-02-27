@extends('layout.master')
@section('content')
<html>
<head>
	<title>Edit Purchasing Item Forms</title>
</head>
	<div class="flash-message">
    @foreach (['danger'] as $msg)
		@if($errors->first('purch_item_name'))
			<p class="alert alert-{{ $msg }}">Item Name is Required<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
		@endif
    @endforeach
	</div> <!-- end .flash-message -->
<body>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Purchasing Item Forms
      </h1>
    </section>
<section class="content">
<div class="form-group">
<form action="{{action('SetupController@update_purch_item')}}" method="post">
<input type="hidden" name="_token" value="<?= csrf_token(); ?>" >
<input type="hidden" name="purch_item_id" value="<?= $row->purch_item_id ?>" >
	<div class="box box-default">
		<div class="box-header with-border">
				<div class="box-body">
					<div class="row">
						<div class="col-md-12">
										<div class="row">
											<div class="col-xs-6">
											  <label>Item Name</label>
											  <input type="text" class="form-control" name="purch_item_name" value="<?= $row->purch_item_name ?>" placeholder="Item Name">
											  
											</div>
											<div class="col-xs-6">
											  <label>Item Price/Unit</label>
											  <input type="number" class="form-control" name="purch_item_price" value="<?= $row->purch_item_price ?>" placeholder="Item Price/Unit">
											</div>
										</div>
										
										<br>
										<label>Item Description</label>
											<textarea name="purch_item_desc" class="form-control" rows="8" placeholder="Item Description" style="overflow:auto;resize:none" ><?= $row->purch_item_desc ?></textarea>
										<br>
						</div>
					</div>
					<br>
				</div>
		</div>
	</div>
<input type="hidden" class="form-control" name="company" value="{{ Auth::user()->company }}">
<input type="submit" value="Update Record" class="btn btn-primary">
<a href="<?php echo '../setup_purch_item' ?>" class="btn btn-primary btn-warning">Cancel</a></form>
</form>
</div>
</section>

</body>
</html>
@stop()