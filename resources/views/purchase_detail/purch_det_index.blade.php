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
	<a href="<?php echo '../purch_det_form/'.$purchase_id ?>" class="btn btn-app bg-blue">
		<i class="fa fa-money"></i> Add Purchased Item
    </a>
    
	<div class="row">	  
        <div class="col-xs-12">
          <div class="box">	  
            <div class="box-header">
			  <br>
              <h3 class="box-title">
				<b><?php foreach($purchase_name as $name){?> <?php echo $name->purchase_name ?></td><?php } ?></b> Purchased Item List</h3>
            </div>

			<!-- /.box-header -->
            <div class="box-body table-responsive">
			
              <table id="customerTable" class="table table-hover">
				<thead>
					<th>Item Purchased Name</th>
					<th>Description</th>
					<th>Quantity</th>
					<th>Price</th>
					<th>Total Price</th>
					<th>Options</th>
				</thead>
				<tbody>
					<?php
						foreach($data as $row){
					?>
						<tr>
							<td><?php echo $row->pur_det_name ?></td>
							<td><?php echo $row->pur_det_desc ?></td>
							<td><?php echo $row->pur_det_quantity ?></td>
							<td><?php echo $row->pur_det_price ?></td>
							<td><?php echo $row->pur_det_tot_price ?></td>
							<td>
								<a href="<?php echo '../EditPurchItem/'.$row->pur_det_id ?>" class="btn btn-primary btn-success btn-sm">Edit</a> |
								<a href="<?php echo '../DeletePurchItem/'.$row->pur_det_id ?>" class="btn btn-primary btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')">Delete</a>
							</td>
						</tr>
					<?php } ?>
				</tbody>				                    
              </table>		  
            </div>
          </div>
        </div>
      </div>

<a href="<?php echo '../inventory_purchase' ?>" class="btn btn-primary btn-warning">Cancel</a>
      <!-- /.row -->
    </section>
	
    <!-- /.content -->
<!-- page script -->
<script>
/**
 * Elements
 
var grand_tot_price    = document.getElementsByName('grand_tot_price')[0];
var tot_paid = document.getElementsByName('tot_paid')[0];
var balance     = document.getElementsByName('balance')[0];

/**
 * Calculations
 *
function updateInput() {
	balance.value = parseFloat(tot_paid.value) - parseFloat(grand_tot_price.value);
}

/**
 * Event Listeners
 *
grand_tot_price.addEventListener('change', updateInput);
tot_paid.addEventListener('change', updateInput);
balance.addEventListener('change', updateInput);
*/
</script>
@stop()