@extends('layout.master')
@section('content')
<!DOCTYPE html>
<html>
<head>

</head>
<body onload="window.print();">
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-globe"></i> <?php echo $company ?> Report From <?php echo $start_date  ?> To <?php echo $end_date  ?>
          <small class="pull-right">Date Generated: <?php echo $current_date ?></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>

    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 table-responsive">
	  <center><p class="lead">Customer Details</p></center>

	<?php if(!empty($c1)) { ?>
	  <!--<h4>January</h4>-->
        <table class="table table-striped">
          <thead>
          <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Tracking Number</th>
            <th>Courier</th>
			<th>Status</th>
			<th>Order Date</th>
			<th>Delivery Date</th>
			<th>Total Paid</th>
			<th>Balance</th>
          </tr>
          </thead>
          <tbody>
				<?php
				foreach($c1 as $row){
				?>
					<tr>
						<td><?php echo $row->cust_name ?></td>
						<td><?php echo $row->cust_phone ?></td>
						<td><?php echo $row->cust_track_no ?></td>
						<td><?php echo $row->cust_courier ?></td>
						<td><?php echo $row->cust_status ?></td>
						<td><?php echo $row->cust_order_date ?></td>
						<td><?php echo $row->cust_deliver_date ?></td>
						<td><?php echo $row->tot_paid ?></td>
						<td><?php echo $row->balance ?></td>	
					</tr>
				<?php } ?>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td><b>Total</b></td>
						<td><?php echo $c1p ?></td>
						<td><?php echo $c1b ?></td>
					</tr>
		  </tbody>	
        </table>
	<?php } ?>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

	<center>---------END OF CUSTOMER DETAILS REPORT----------</center><br>
	
    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 table-responsive">
	  <center><p class="lead">Purchasing Details</p></center>

	<?php if(!empty($p1)) { ?>
	  <h4>January</h4>
        <table class="table table-striped">
          <thead>
          <tr>
            <th>Name</th>
            <th>Decription</th>
            <th>Date</th>
            <th>Total Price</th>
          </tr>
          </thead>
          <tbody>
				<?php
				foreach($p1 as $row){
				?>
					<tr>
						<td><?php echo $row->purchase_name ?></td>
						<td><?php echo $row->purchase_desc ?></td>
						<td><?php echo $row->purchase_date ?></td>
						<td><?php echo $row->purchase_tot_price ?></td>	
					</tr>
				<?php } ?>
					<tr>
						<td></td>
						<td></td>
						<td><b>Total</b></td>
						<td><?php echo $p1p ?></td>
					</tr>
		  </tbody>	
        </table>
	<?php } ?>
	
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
	
	<center>---------END OF PURCHASING DETAILS REPORT----------</center><br><br>
	
	
	<center><p class="lead">Report Summary</p></center>

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-xs-4">

        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
			Customer Details		
        </p>
		<div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%">Total Customers:</th>
              <td><?php echo $total_cust ?></td>
            </tr>
            <tr>
              <th>Total Paid:</th>
              <td><?php echo $c1p ?></td>
            </tr>
            <tr>
              <th>Total Balance:</th>
              <td><?php echo $c1b ?></td>
            </tr>
          </table>
        </div>
      </div>
      <!-- /.col -->
      <div class="col-xs-4">

        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
			Purchasing Details		
        </p>
		<div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%">Total Transactions:</th>
              <td><?php echo $total_purch_trans ?></td>
            </tr>
            <tr>
              <th>Total Price:</th>
              <td><?php echo $p1p ?></td>
            </tr>
            <tr>
              <th>Total Item Purchased:</th>
              <td><?php echo $total_item_purch ?></td>
            </tr>
          </table>
        </div>
      </div>
      <!-- /.col -->
	  <div class="col-xs-4">

        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
			Business Details
        </p>
		<div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%">Total Sale:</th>
              <td><?php echo $total_sale ?></td>
            </tr>
            <tr>
              <th>Total Cost:</th>
              <td><?php echo $total_cost ?></td>
            </tr>
            <tr>
              <th>Total Profit:</th>
              <td><?php echo $total_profit ?></td>
            </tr>
          </table>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>

@endsection
