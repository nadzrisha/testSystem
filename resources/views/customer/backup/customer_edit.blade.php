@extends('layout.master')
@section('content')
<html>
<head>
	<title>Add Customer</title>
</head>
<p style="color:red">{{ $errors->first('cust_name') }}</p>
<p style="color:red">{{ $errors->first('item_price') }}</p>
<p style="color:red">{{ $errors->first('item_qty') }}</p>
<p style="color:red">{{ $errors->first('other_charge') }}</p>
<p style="color:red">{{ $errors->first('discount') }}</p>
<p style="color:red">{{ $errors->first('tot_paid') }}</p>
<body>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Customer Forms
      </h1>
    </section>
<section class="content">
<div class="form-group">
<form action="{{action('CustomerController@updatecust')}}" method="post">
<input type="hidden" name="_token" value="<?= csrf_token(); ?>" >
<input type="hidden" name="cust_id" value="<?= $row->cust_id ?>" >
	<div class="box box-default">
		<div class="box-header with-border">
				<div class="box-body">
					<div class="row">
						<div class="col-md-6">
										<div class="row">
											<div class="col-xs-6">
											  <label>Name</label>
											  <input type="text" class="form-control" name="cust_name" value="<?= $row->cust_name ?>" placeholder="Customer Name">
											  
											</div>
											<div class="col-xs-6">
											  <label>Phone</label>
											  <input type="text" class="form-control" name="cust_phone" value="<?= $row->cust_phone ?>" placeholder="Customer Phone">
											</div>
										</div>
										
										<br>
										<label>Delivery address</label>
											<textarea name="cust_del_add" class="form-control" rows="8" placeholder="Customer Address" style="overflow:auto;resize:none" ><?= $row->cust_del_add ?></textarea>
										<br>
										
										<div class="row">
											<div class="col-xs-6">
											  <label>State</label>
											  <select name="cust_state" value="<?= $row->cust_state ?>" class="form-control select2" style="width: 100%;">
												<option selected="selected">Alabama</option>
											    <option>Alaska</option>
											    <option>California</option>
											    <option>Delaware</option>
											    <option>Tennessee</option>
											    <option>Texas</option>
											    <option>Washington</option>
											  </select>
											</div>
											<div class="col-xs-6">
											  <label>Detail_Location</label>
											  <select name="cust_det_loc" value="<?= $row->cust_det_loc ?>" class="form-control select2" style="width: 100%;">
												<option selected="selected">Alabama</option>
											    <option>Alaska</option>
											    <option>California</option>
											    <option>Delaware</option>
											    <option>Tennessee</option>
											    <option>Texas</option>
											    <option>Washington</option>
											  </select>
											</div>
										</div>
						</div>
							
					
						<div class="col-md-6">
										<div class="row">
											<div class="col-xs-6">
											  <label>Tracking_Number</label>
											  <input type="text" class="form-control" name="cust_track_no" value="<?= $row->cust_track_no ?>" placeholder="Tracking Number">				 
											</div>
											<div class="col-xs-6">
											  <label>Courier</label>
											  <input type="text" class="form-control" name="cust_courier" value="<?= $row->cust_courier ?>" placeholder="Courier">
											</div>
										</div>
										
										<br>
										<div class="row">
											<div class="col-xs-12">
											  <label>Item Category</label>
											  <select name="cust_item_cat" value="<?= $row->cust_item_cat ?>" class="form-control select2" style="width: 100%;">
												<option selected="selected">Alabama</option>
											    <option>Alaska</option>
											    <option>California</option>
											    <option>Delaware</option>
											    <option>Tennessee</option>
											    <option>Texas</option>
											    <option>Washington</option>
											  </select>
											</div>
										</div>
										
										<br>
										<label>Item Description</label>
											<textarea name="cust_item_desc" class="form-control" rows="4" placeholder="Item Description" style="overflow:auto;resize:none" ><?= $row->cust_item_desc ?></textarea>
										<br>
										
										<div class="row">
											<div class="col-xs-6">
											  <label>Price</label>
											  <input type="number" class="form-control" name="item_price" value="<?= $row->item_price ?>" placeholder="Price">
											</div>
											<div class="col-xs-6">
											  <label>Quantity</label>
											  <input type="number" class="form-control" name="item_qty" value="<?= $row->item_qty ?>" placeholder="Quantity">
											</div>
										</div>
										
										<br>
										<div class="row">
											<div class="col-xs-4">
											  <label>Other Charges</label>
											  <input type="number" class="form-control" name="other_charge" value="<?= $row->other_charge ?>" placeholder="Other Charges">
											</div>
											<div class="col-xs-4">
											  <label>Discount</label>
											  <input type="number" class="form-control" name="discount" value="<?= $row->discount ?>" placeholder="Discount">
											</div>
											<div class="col-xs-4">
											  <label>Total Price</label>
											  <input type="number" class="form-control" name="tot_price" value="<?= $row->tot_price ?>" placeholder="Total Price" readonly>
											</div>
										</div>
						</div>	
					</div>
					<br>
					<div class="row">
						<div class="col-md-12">
										<div class="row">
											<div class="col-xs-4">
											  <label>Status</label>
											  <select name="cust_status" value="<?= $row->cust_status ?>" class="form-control select2" style="width: 100%;">
												<option selected="selected">Alabama</option>
											    <option>Alaska</option>
											    <option>California</option>
											    <option>Delaware</option>
											    <option>Tennessee</option>
											    <option>Texas</option>
											    <option>Washington</option>
											  </select>
											</div>
											<div class="col-xs-4">
											  <label>Total Paid</label>
											  <input type="number" class="form-control" name="tot_paid" value="<?= $row->tot_paid ?>" placeholder="Total Paid">
											</div>
											<div class="col-xs-4">
											  <label>Balance</label>
											  <input type="text" class="form-control" name="balance" value="<?= $row->balance ?>" placeholder="Balance" readonly>
											</div>
										</div>
						</div>			
					</div>
					
				</div>
		</div>
	</div>
<input type="submit" value="Update Record" class="btn btn-primary">					
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