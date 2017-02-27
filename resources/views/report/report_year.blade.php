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
          <i class="fa fa-globe"></i> <?php echo $company ?> Report For The Year <?php echo $report_year  ?>
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
	  <h4>January</h4>
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
	
	<?php if(!empty($c2)) { ?>
		<h4>February</h4>
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
				foreach($c2 as $row){
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
						<td><?php echo $c2p ?></td>
						<td><?php echo $c2b ?></td>
					</tr>
		  </tbody>	
        </table>
	<?php } ?>
	
	<?php if(!empty($c3)) { ?>
		<h4>March</h4>
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
				foreach($c3 as $row){
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
						<td><?php echo $c3p ?></td>
						<td><?php echo $c3b ?></td>
					</tr>
		  </tbody>	
        </table>
	<?php } ?>
	
	<?php if(!empty($c4)) { ?>
		<h4>April</h4>
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
				foreach($c4 as $row){
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
						<td><?php echo $c4p ?></td>
						<td><?php echo $c4b ?></td>
					</tr>
		  </tbody>	
        </table>
	<?php } ?>
	
	<?php if(!empty($c5)) { ?>
		<h4>May</h4>
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
				foreach($c5 as $row){
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
						<td><?php echo $c5p ?></td>
						<td><?php echo $c5b ?></td>
					</tr>
		  </tbody>	
        </table>
	<?php } ?>
	
	<?php if(!empty($c6)) { ?>
		<h4>June</h4>
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
				foreach($c6 as $row){
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
						<td><?php echo $c6p ?></td>
						<td><?php echo $c6b ?></td>
					</tr>
		  </tbody>	
        </table>
	<?php } ?>
	
	<?php if(!empty($c7)) { ?>
		<h4>July</h4>
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
				foreach($c7 as $row){
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
						<td><?php echo $c7p ?></td>
						<td><?php echo $c7b ?></td>
					</tr>
		  </tbody>	
        </table>
	<?php } ?>
	
	<?php if(!empty($c8)) { ?>
		<h4>August</h4>
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
				foreach($c8 as $row){
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
						<td><?php echo $c8p ?></td>
						<td><?php echo $c8b ?></td>
					</tr>
		  </tbody>	
        </table>
	<?php } ?>
	
	<?php if(!empty($c9)) { ?>
		<h4>September</h4>
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
				foreach($c9 as $row){
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
						<td><?php echo $c9p ?></td>
						<td><?php echo $c9b ?></td>
					</tr>
		  </tbody>	
        </table>
	<?php } ?>
	
	<?php if(!empty($c10)) { ?>
		<h4>October</h4>
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
				foreach($c10 as $row){
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
						<td><?php echo $c10p ?></td>
						<td><?php echo $c10b ?></td>
					</tr>
		  </tbody>	
        </table>
	<?php } ?>
	
	<?php if(!empty($c11)) { ?>
		<h4>November</h4>
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
				foreach($c11 as $row){
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
						<td><?php echo $c11p ?></td>
						<td><?php echo $c11b ?></td>
					</tr>
		  </tbody>	
        </table>
	<?php } ?>	
		
	<?php if(!empty($c12)) { ?>
		<h4>December</h4>
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
				foreach($c12 as $row){
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
						<td><?php echo $c12p ?></td>
						<td><?php echo $c12b ?></td>
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
	
	<?php if(!empty($p2)) { ?>
		<h4>February</h4>
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
				foreach($p2 as $row){
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
						<td><?php echo $p2p ?></td>
					</tr>
		  </tbody>	
        </table>
	<?php } ?>
	
	<?php if(!empty($p3)) { ?>
		<h4>March</h4>
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
				foreach($p3 as $row){
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
						<td><?php echo $p3p ?></td>
					</tr>
		  </tbody>	
        </table>
	<?php } ?>
	
	<?php if(!empty($p4)) { ?>
		<h4>April</h4>
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
				foreach($p4 as $row){
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
						<td><?php echo $p4p ?></td>
					</tr>
		  </tbody>	
        </table>
	<?php } ?>
	
	<?php if(!empty($p5)) { ?>
		<h4>May</h4>
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
				foreach($p5 as $row){
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
						<td><?php echo $p5p ?></td>
					</tr>
		  </tbody>	
        </table>
	<?php } ?>
	
	<?php if(!empty($p6)) { ?>
		<h4>June</h4>
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
				foreach($p6 as $row){
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
						<td><?php echo $p6p ?></td>
					</tr>
		  </tbody>	
        </table>
	<?php } ?>
	
	<?php if(!empty($p7)) { ?>
		<h4>July</h4>
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
				foreach($p7 as $row){
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
						<td><?php echo $p7p ?></td>
					</tr>
		  </tbody>	
        </table>
	<?php } ?>
	
	<?php if(!empty($p8)) { ?>
		<h4>August</h4>
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
				foreach($p8 as $row){
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
						<td><?php echo $p8p ?></td>
					</tr>
		  </tbody>	
        </table>
	<?php } ?>
	
	<?php if(!empty($p9)) { ?>
		<h4>September</h4>
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
				foreach($p9 as $row){
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
						<td><?php echo $p9p ?></td>
					</tr>
		  </tbody>	
        </table>
	<?php } ?>
	
	<?php if(!empty($p10)) { ?>
		<h4>October</h4>
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
				foreach($p10 as $row){
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
						<td><?php echo $p10p ?></td>
					</tr>
		  </tbody>	
        </table>
	<?php } ?>
	
	<?php if(!empty($p11)) { ?>
		<h4>November</h4>
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
				foreach($p11 as $row){
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
						<td><?php echo $p11p ?></td>
					</tr>
		  </tbody>	
        </table>
	<?php } ?>
		
	<?php if(!empty($p12)) { ?>
		<h4>December</h4>
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
				foreach($p12 as $row){
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
						<td><?php echo $p12p ?></td>
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
              <td><?php echo $ctp ?></td>
            </tr>
            <tr>
              <th>Total Balance:</th>
              <td><?php echo $ctb ?></td>
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
              <td><?php echo $ptp ?></td>
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
