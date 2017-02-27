@extends('layout.master')
@section('content')
<html>

<head>
	<title>Add Customer</title>
</head>
	<div class="flash-message">
	  @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))

      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
	  @endforeach
    @foreach (['danger'] as $msg)
		@if($errors->first('pur_det_name'))
			<p class="alert alert-{{ $msg }}">Purchased Item Name is Required<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
		@endif
		@if($errors->first('pur_det_price'))
			<p class="alert alert-{{ $msg }}">Purchased Price is Required<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
		@endif
		@if($errors->first('pur_det_oth_chr'))
			<p class="alert alert-{{ $msg }}">Purchased Other Charge is Required<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
		@endif
		@if($errors->first('pur_det_disc'))
			<p class="alert alert-{{ $msg }}">Purchased Discount is Required<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
		@endif
		@if($errors->first('pur_det_quantity'))
			<p class="alert alert-{{ $msg }}">Purchased Quantity is Required<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
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
<form action="{{action('PurchDetController@updatePurchItem')}}" method="post">
<input type="hidden" name="_token" value="<?= csrf_token(); ?>" >
<input type="hidden" name="pur_det_id" value="<?= $row->pur_det_id ?>" >
<input type="hidden" name="purchase_id" value="<?= $row->purchase_id ?>" >
	<div class="box box-default">
		<div class="box-header with-border">
				<div class="box-body">
					<div class="row">	
						<div class="col-lg-12">
							<div class="row">		
													<div class="col-lg-12">
													  <label><font color=red>*</font> Purchased Item Name</label>
													  <select name="pur_det_name" class="form-control select2" style="width: 100%;">
													  <option value="none">Choose Item</option>
														@foreach ($itemname as $sn) 
														  {

															<option <?php if ($row->pur_det_name == $sn) { echo 'selected="selected"';}?>>{{ $sn }}</option>
														  }
														@endforeach
													  </select>
													</div>
													
													
													<div class="col-lg-6">
																	<br>
																	<label>Purchased Item Description</label>
																		<textarea name="pur_det_desc" class="form-control" rows="8" placeholder="Purchased Item Description" style="overflow:auto;resize:none" ><?= $row->pur_det_desc ?></textarea>
													</div>
													
													<div class="col-lg-3">
																	<br>
																	<div class="row">
																		<div class="col-xs-12">
																		  <label><font color=red>*</font> Purchased Item Price</label>
																			<input type="number" class="form-control" value="<?= $row->pur_det_price ?>" name="pur_det_price" placeholder="Purchased Item Price">
																		</div>
																	</div>
													</div>				
													<div class="col-lg-3">
																	<br>
																	<div class="row">
																		<div class="col-xs-12">
																		  <label><font color=red>*</font> Purchased Item Quantity</label>
																			<input type="number" class="form-control" value="<?= $row->pur_det_quantity ?>" name="pur_det_quantity" placeholder="Purchased Item Quantity">
																		</div>
																	</div>
													</div>
													<div class="col-lg-3">
																	<br>
																	<div class="row">
																		<div class="col-xs-12">
																		  <label><font color=red>*</font> Other Charge</label>
																			<input type="number" class="form-control" value="<?= $row->pur_det_oth_chr ?>" name="pur_det_oth_chr" placeholder="Other Charge">
																		</div>
																	</div>
													</div>
													<div class="col-lg-3">
																	<br>
																	<div class="row">
																		<div class="col-xs-12">
																		  <label><font color=red>*</font> Discount</label>
																			<input type="number" class="form-control" value="<?= $row->pur_det_disc ?>" name="pur_det_disc" placeholder="Discount">
																		</div>
																	</div>
													</div>
													<div class="col-lg-6">
																	<br>
																	<div class="row">
																		<div class="col-xs-12">
																		  <label>Purchased Item Total Price</label>
																			<input type="text" class="form-control" value="<?= $row->pur_det_tot_price ?>" name="pur_det_tot_price" placeholder="Purchased Item Total Price" readonly>
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
<a href="<?php echo '../purch_det_index/'.$row->purchase_id ?>" class="btn btn-primary btn-warning">Cancel</a>
</form>
</div>
</section>

</body>
<script>
/**
 * Elements
 */
var pur_det_price = document.getElementsByName('pur_det_price')[0];
var pur_det_quantity = document.getElementsByName('pur_det_quantity')[0];
var pur_det_oth_chr = document.getElementsByName('pur_det_oth_chr')[0];
var pur_det_disc = document.getElementsByName('pur_det_disc')[0];
var pur_det_tot_price     = document.getElementsByName('pur_det_tot_price')[0];

/**
 * Calculations
 */
function updateInput() {
	pur_det_tot_price.value = parseFloat(pur_det_price.value) * parseFloat(pur_det_quantity.value) + parseFloat(pur_det_oth_chr.value) - parseFloat(pur_det_disc.value);
}

/**
 * Event Listeners
 */
pur_det_price.addEventListener('change', updateInput);
pur_det_quantity.addEventListener('change', updateInput);
pur_det_oth_chr.addEventListener('change', updateInput);
pur_det_disc.addEventListener('change', updateInput);
</script>
</html>
@stop()