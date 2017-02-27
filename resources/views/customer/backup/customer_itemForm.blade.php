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
        Add Items Forms
      </h1>
    </section>
<section class="content">
<div class="form-group">
<form action="{{action('CustomerController@saveitem')}}" method="post">
<input type="hidden" name="_token" value="<?= csrf_token(); ?>" >
<input type="hidden" name="cust_id" value="<?= $row->cust_id ?>" >
	<div class="box box-default">
		<div class="box-header with-border">
				<div class="box-body">
					<div class="row">
						<div class="col-md-12">
										<div class="row">
											<div class="col-xs-2">
											  <label>Item Category</label>
											  <input type="text" class="form-control" name="item_cat" placeholder="Item Category">
											</div>
											<div class="col-xs-2">
											  <label>Item Details 1</label>
											  <input type="text" class="form-control" name="item_det1" placeholder="Item Details 1">
											</div>
											<div class="col-xs-2">
											  <label>Item Details 2</label>
											  <input type="text" class="form-control" name="item_det2" placeholder="Item Details 2">
											</div>
											<div class="col-xs-2">
											  <label>Item Details 3</label>
											  <input type="text" class="form-control" name="item_det3" placeholder="Item Details 3">
											</div>
											<div class="col-xs-2">
											  <label>Item Details 4</label>
											  <input type="text" class="form-control" name="item_det4" placeholder="Item Details 4">
											</div>
											<div class="col-xs-2">
											  <label>Item Details 5</label>
											  <input type="text" class="form-control" name="item_det5" placeholder="Item Details 5">
											</div>
										</div>
						</div>
						<div class="col-md-6">
										<br>
										<label>Item Description</label>
											<textarea name="item_desc" class="form-control" rows="8" placeholder="Item Description" style="overflow:auto;resize:none" ></textarea>
						</div>
						<div class="col-md-6">
										<br>
										<div class="row">
											<div class="col-xs-4">
											  <label>Price</label>
												<input type="number" class="form-control" name="item_price" placeholder="Price">
											</div>
											<div class="col-xs-4">
											  <label>Quantity</label>
												<input type="number" class="form-control" name="item_qty" placeholder="Quantity">
											</div>
										</div>
										<br>
										<div class="row">
											<div class="col-xs-4">
											  <label>Other Charges</label>
												<input type="number" class="form-control" name="item_other_chrge" placeholder="Other Charges">
											</div>
											<div class="col-xs-4">
											  <label>Discount</label>
												<input type="number" class="form-control" name="item_disc" placeholder="Discount">
											</div>
											<div class="col-xs-4">
											  <label>Total Price</label>
												<input type="number" class="form-control" name="item_tot_price" placeholder="Total Price">
											</div>
										</div>
										<br>
										<div class="row">
											<div class="col-xs-4">
											  <label>Total Cost</label>
												<input type="number" class="form-control" name="item_tot_cost" placeholder="Total Cost">
											</div>
											<div class="col-xs-4">
											  <label>Profit</label>
												<input type="number" class="form-control" name="item_profit" placeholder="Profit">
											</div>
										</div>
						</div>
						
						<div class="col-md-6">
							<div class="row">
								<input type="hidden" name="count" value="1" />
								<div class="control-group" id="fields">
									<label class="control-label" for="field1">Nice Multiple Form Fields</label>
										<div class="controls" id="profs"> 
											<form class="input-append">
												<div id="field">
													<input autocomplete="off" class="input" id="field1" name="prof1" type="text" placeholder="Type something" data-items="8"/>
													<button id="b1" class="btn add-more" type="button">+</button>
												</div>
											</form>
										<br>
										<small>Press + to add another form field :)</small>
										</div>
								</div>
							</div>
						</div>
					
					</div>
					<br>

					
					
					
					
					
					
					
				</div>
		</div>
	</div>
<input type="hidden" class="form-control" name="company" value="{{ Auth::user()->company }}">
<input type="submit" value="Save Item" class="btn btn-primary">					
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
onload="updateInput()";
</script>
</html>
@stop()