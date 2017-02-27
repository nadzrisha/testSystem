@extends('layout.master')
@section('content')
<html>
<head>
	<title>Add Customer</title>
</head>

	<div class="flash-message">
    @foreach (['danger'] as $msg)
		@if($errors->first('cust_name'))
			<p class="alert alert-{{ $msg }}">Name is Required<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
		@endif
    @endforeach
	</div> <!-- end .flash-message -->


<body>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Customer Forms
      </h1>
    </section>
<section class="content">
<div class="form-group">
<form action="{{action('CustomersController@savecust')}}" method="post">
<input type="hidden" name="_token" value="<?= csrf_token(); ?>" >
	<div class="box box-default">
		<div class="box-header with-border">
				<div class="box-body">
					<div class="row">
						<div class="col-lg-12">
										<div class="row">
											<div class="col-lg-3">
											  <label><font color=red>*</font> Name</label>
											  <input type="text" class="form-control" name="cust_name" placeholder="Customer Name">
											  
											</div>
											<div class="col-lg-3">
											  <label>Phone</label>
											  <input type="text" class="form-control" name="cust_phone" placeholder="Customer Phone">
											</div>
											<div class="col-lg-3">
											  <label>Tracking Number</label>
											  <input type="text" class="form-control" name="cust_track_no" placeholder="Tracking Number">				 
											</div>
											<div class="col-lg-3">
											  <label>Courier</label>
											  <select name="cust_courier" class="form-control select2" style="width: 100%;">
													<option value="none">None</option>
													@foreach ($couriername as $cn) 
													  {
														<option value="{{ $cn }}">{{ $cn }}</option>
													  }
													@endforeach
											  </select>
											</div>
										</div>
										
										<br>
										<label>Delivery address</label>
											<textarea name="cust_del_add" class="form-control" rows="8" placeholder="Customer Address" style="overflow:auto;resize:none" ></textarea>
										<br>
										
										<div class="row">
											<div class="col-lg-6">
											  <label>State</label>
											  <select name="cust_state" class="form-control select2" style="width: 100%;">
													<option value="none">None</option>
													@foreach ($statename as $sn) 
													  {
														<option value="{{ $sn }}">{{ $sn }}</option>
													  }
													@endforeach
											  </select>
											</div>
											<div class="col-lg-6">
											  <label>Detail Location</label>
											  <select name="cust_det_loc" class="form-control select2" style="width: 100%;">
													<option value="none">None</option>
													@foreach ($detlocname as $dln) 
													  {
														<option value="{{ $dln }}">{{ $dln }}</option>
													  }
													@endforeach
											  </select>
											</div>
										</div>
							
										<br>
									<div class="row">
											<div class="col-lg-4">
											  <label>Status</label>
											  <select name="cust_status" class="form-control select2" style="width: 100%;">
													<option value="none">None</option>
													@foreach ($custstatname as $csn) 
													  {
														<option value="{{ $csn }}">{{ $csn }}</option>
													  }
													@endforeach
											  </select>
											</div>
											<div class="col-lg-4">
											  <label>Date Ordered (yyyy-mm-dd)</label>
												<div class="input-group date">
													<div class="input-group-addon">
														<i class="fa fa-calendar"></i>
													</div>
												<input type="text" class="form-control pull-right" name="cust_order_date" id="datepicker">
												</div>
											</div>
											<div class="col-lg-4">
											  <label>Date Delivered (yyyy-mm-dd)</label>
												<div class="input-group date">
													<div class="input-group-addon">
														<i class="fa fa-calendar"></i>
													</div>
												<input type="text" class="form-control pull-right" name="cust_deliver_date" id="datepicker1">
												</div>
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
<a href="<?php echo 'customer_index' ?>" class="btn btn-primary btn-warning">Cancel</a>
</form>
</div>
</section>

</body>
<script>
/**
 * Elements
 */
var item_price    = document.getElementsByName('item_price')[0];
var item_qty = document.getElementsByName('item_qty')[0];
var other_charge     = document.getElementsByName('other_charge')[0];
var discount    = document.getElementsByName('discount')[0];
var tot_price   = document.getElementsByName('tot_price')[0];
var tot_paid   = document.getElementsByName('tot_paid')[0];
var balance   = document.getElementsByName('balance')[0];
/**
 * Calculations
 */
function updateInput() {
  tot_price.value = parseFloat(item_price.value) * parseFloat(item_qty.value) + parseFloat(other_charge.value) - parseFloat(discount.value);
  balance.value = parseFloat(tot_paid.value) - parseFloat(tot_price.value);
}

/**
 * Event Listeners
 */
item_price.addEventListener('change', updateInput);
item_qty.addEventListener('change', updateInput);
other_charge.addEventListener('change', updateInput);
discount.addEventListener('change', updateInput);
tot_paid.addEventListener('change', updateInput);
</script>
</html>
@stop()