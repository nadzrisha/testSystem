@extends('layout.master')
@section('content')
<html>

<head>
	<title>Add Item</title>
</head>
	<div class="flash-message">
	  @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))

      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
    @foreach (['danger'] as $msg)
		@if($errors->first('item_name'))
			<p class="alert alert-{{ $msg }}">Item Name is Required<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
		@endif
		@if($errors->first('item_price'))
			<p class="alert alert-{{ $msg }}">Item Price is Required<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
		@endif
		@if($errors->first('item_qty'))
			<p class="alert alert-{{ $msg }}">Item Quantity is Required<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
		@endif
		@if($errors->first('item_other_chrge'))
			<p class="alert alert-{{ $msg }}">Item Other Charge is Required<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
		@endif
		@if($errors->first('item_disc'))
			<p class="alert alert-{{ $msg }}">Item Discount is Required<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
		@endif
		@if($errors->first('item_tot_cost'))
			<p class="alert alert-{{ $msg }}">Item Total Cost is Required<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
		@endif
    @endforeach
	</div> <!-- end .flash-message -->
<body>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Items Forms
      </h1>
    </section>
<section class="content">
<div class="form-group">
<form action="{{action('ItemController@saveitem')}}" method="post">
<input type="hidden" name="_token" value="<?= csrf_token(); ?>" >
<input type="hidden" name="cust_id" value="<?= $row->cust_id ?>" >
	<div class="box box-default">
		<div class="box-header with-border">
				<div class="box-body">
					<div class="row">
						
						<div class="col-lg-12">
							<div class="row">						
													<div class="col-lg-12">
																	<div class="row">
																		<div class="col-lg-12">
																		  <label><font color=red>*</font> Item</label>
																		  <select name="item_name" class="form-control select2" style="width: 100%;">
																				<option value="none">Choose Item</option>
																				@foreach ($stock_name as $sn) 
																				  {
																					<option value="{{ $sn }}">{{ $sn }}</option>
																				  }
																				@endforeach
																		  </select>
																		</div>
																	</div>
													</div>
													<div class="col-lg-6">
																	<br>
																	<label>Item Description</label>
																		<textarea name="item_desc" class="form-control" rows="8" placeholder="Item Description" style="overflow:auto;resize:none" >{{ old('item_desc') }}</textarea>
													</div>
													<div class="col-lg-6">
																	<br>
																	<div class="row">
																		<div class="col-lg-4">
																		  <label><font color=red>*</font> Price</label>
																			<input type="number" class="form-control" value="0" name="item_price" placeholder="Price">
																		</div>
																		<div class="col-lg-4">
																		  <label><font color=red>*</font> Quantity</label>
																			<input type="number" class="form-control" value="0" name="item_qty" placeholder="Quantity">
																		</div>
																	</div>
																	<br>
																	<div class="row">
																		<div class="col-lg-4">
																		  <label><font color=red>*</font> Other Charges</label>
																			<input type="number" class="form-control" value="0" name="item_other_chrge" placeholder="Other Charges">
																		</div>
																		<div class="col-lg-4">
																		  <label><font color=red>*</font> Discount</label>
																			<input type="number" class="form-control" value="0" name="item_disc" placeholder="Discount">
																		</div>
																		<div class="col-lg-4">
																		  <label>Total Price</label>
																			<input type="text" class="form-control" value="0" name="item_tot_price" placeholder="Total Price" readonly>
																		</div>
																	</div>
																	<br>
																	<div class="row">
																		<div class="col-lg-4">
																		  <label><font color=red>*</font> Total Cost</label>
																			<input type="number" class="form-control" value="0" name="item_tot_cost" placeholder="Total Cost">
																		</div>
																		<div class="col-lg-4">
																		  <label>Profit</label>
																			<input type="text" class="form-control" value="0" name="item_profit" placeholder="Profit" readonly>
																		</div>
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
<input type="submit" value="Save Item" class="btn btn-primary">
<a href="<?php echo '../item_index/'.$row->cust_id ?>" class="btn btn-primary btn-warning">Cancel</a></form>
</div>
</section>

</body>
<script>
/**
 * Elements
 */
var item_price    = document.getElementsByName('item_price')[0];
var item_qty = document.getElementsByName('item_qty')[0];
var item_other_chrge     = document.getElementsByName('item_other_chrge')[0];
var item_disc    = document.getElementsByName('item_disc')[0];
var item_tot_price   = document.getElementsByName('item_tot_price')[0];
var item_tot_cost   = document.getElementsByName('item_tot_cost')[0];
var item_profit   = document.getElementsByName('item_profit')[0];
/**
 * Calculations
 */
function updateInput() {
	item_tot_price.value = (parseFloat(item_price.value) * parseFloat(item_qty.value)) + parseFloat(item_other_chrge.value) - parseFloat(item_disc.value);
	item_profit.value = parseFloat(item_tot_price.value) - parseFloat(item_tot_cost.value);
}

/**
 * Event Listeners
 */
item_price.addEventListener('change', updateInput);
item_qty.addEventListener('change', updateInput);
item_other_chrge.addEventListener('change', updateInput);
item_disc.addEventListener('change', updateInput);
item_tot_cost.addEventListener('change', updateInput);
</script>
</html>
@stop()