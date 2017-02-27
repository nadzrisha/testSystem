@extends('layout.master')
@section('content')

	<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))

      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
  </div> <!-- end .flash-message -->

  <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
	<a href="<?php echo '../itemform/'.$cust_id ?>" class="btn btn-app bg-blue">
		<i class="fa fa-shopping-cart"></i> Add Item
    </a>
    
	<div class="row">	  
        <div class="col-lg-12">
          <div class="box">	  
            <div class="box-header">
			  <br>
              <h3 class="box-title">
				<b><?php foreach($cust_name as $name){?> <?php echo $name->cust_name ?></td><?php } ?></b> Item List</h3>
            </div>

			<!-- /.box-header -->
            <div class="box-body table-responsive">
			
              <table id="customerTable" class="table table-hover">
				<thead>
					<th>Item Name</th>
					<th>Description</th>
					<th>Total Price</th>
					<th>Cost</th>
					<th>Profit</th>
					<th>Options</th>
				</thead>
				<tbody>
					<?php
						foreach($data as $row){
					?>
						<tr>
							<td><?php echo $row->item_name ?></td>
							<td><?php echo $row->item_desc ?></td>
							<td><?php echo $row->item_tot_price ?></td>
							<td><?php echo $row->item_tot_cost ?></td>
							<td><?php echo $row->item_profit ?></td>
							<td>
								<a href="<?php echo '../EditItem/'.$row->item_id ?>" class="btn btn-primary btn-success btn-sm">Edit</a> |
								<a href="<?php echo '../DeleteItem/'.$row->item_id ?>" class="btn btn-primary btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')">Delete</a>
							</td>
						</tr>
					<?php } ?>
				</tbody>				                    
              </table>		  
            </div>
          </div>
        </div>
      </div>
<form action="{{action('ItemController@savepaid')}}" method="post">
<input type="hidden" name="_token" value="<?= csrf_token(); ?>" >
	  <div class="row">
        <div class="col-lg-12">
          <div class="box">		  
            <div class="box-header">
			  <br>
              <h3 class="box-title">Order Summary</h3>
            </div>

			<!-- /.box-header -->
            <div class="box-body">
			
              <div class="col-lg-12">
				<div class="row">
					<div class="col-lg-4">
					<label>Grand Total Price</label>
						<input type="text" class="form-control" name="grand_tot_price" value="<?= $grand_tot_price ?>" placeholder="Grand Total Price" readonly>
					</div>
					<div class="col-lg-4">
					<label>Grand Total Cost</label>
						<input type="text" class="form-control" name="item_tot_cost" value="<?= $item_tot_cost ?>" placeholder="Grand Total Cost" readonly>
					</div>
					<div class="col-lg-4">
					<label>Grand Total Profit</label>
						<input type="text" class="form-control" name="item_profit" value="<?= $item_profit ?>" placeholder="Grand Total Profit" readonly>
					</div>
				</div>
			  </div>
			  
			  <div class="col-lg-12">
			  <br>
				<div class="row">
					<div class="col-lg-4">

					</div>
					<div class="col-lg-4">
					<label>Total Paid</label>
						<input type="number" class="form-control" name="tot_paid" value="<?= $tot_paid ?>" placeholder="Total Paid">
					</div>
					<div class="col-lg-4">
					<label>Balance</label>
						<input type="text" class="form-control" name="balance" value="<?= $balance ?>" placeholder="Balance" readonly>
					</div>
				</div>
			  </div>
			  <input type="hidden" name="cust_id" value="<?= $cust_id ?>" ><br>
			  <input type="submit" value="Save Payment" class="btn btn-primary">
            </div>
          </div>
        </div>
      </div>
</form>
<a href="<?php echo '../customer_index' ?>" class="btn btn-primary btn-warning">Cancel</a>
      <!-- /.row -->
    </section>
	
    <!-- /.content -->
<!-- page script -->
<script>
/**
 * Elements
 */
var grand_tot_price    = document.getElementsByName('grand_tot_price')[0];
var tot_paid = document.getElementsByName('tot_paid')[0];
var balance     = document.getElementsByName('balance')[0];

/**
 * Calculations
 */
function updateInput() {
	balance.value = parseFloat(tot_paid.value) - parseFloat(grand_tot_price.value);
}

/**
 * Event Listeners
 */
grand_tot_price.addEventListener('change', updateInput);
tot_paid.addEventListener('change', updateInput);
balance.addEventListener('change', updateInput);
</script>
@stop()