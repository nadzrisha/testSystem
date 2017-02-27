@extends('layout.master')
@section('content')

	<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))

      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
	

  <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
	<a href="<?php echo 'customerform' ?>" class="btn btn-app bg-blue">
		<i class="fa fa-user-plus"></i> Add Customer
    </a>
    <div class="col-xs-12">
	<div class="row">
	  
        

          <div class="box">
		  
            <div class="box-header">
			  <br>
              <h3 class="box-title">Customer table</h3>
            </div>

			<!-- /.box-header -->
            <div class="box-body table-responsive">
			
              <table id="customerTable" class="table table-hover">
			  
				<thead>
					<th>Name</th>
					<th>Phone Number</th>
					<th>Status</th>
					<th>Tracking No</th>
					<th>Courier</th>
					<th>Total Paid</th>
					<th>Balance</th>
					<th>Options</th>
				</thead>
				<tbody>
					<?php
						foreach($data as $row){
					?>
						<tr>
							<td><?php echo $row->cust_name ?></td>
							<td><?php echo $row->cust_phone ?></td>
							<td><?php echo $row->cust_status ?></td>
							<td><?php echo $row->cust_track_no ?></td>
							<td><?php echo $row->cust_courier ?></td>
							<td><?php echo $row->tot_paid ?></td>
							<td><?php echo $row->balance ?></td>
							<td>
								<a href="<?php echo 'EditCustomer/'.$row->cust_id ?>" class="btn btn-primary btn-success btn-sm">Edit</a> |
								<a href="<?php echo 'DeleteCustomer/'.$row->cust_id ?>" class="btn btn-primary btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')">Delete</a> |
								<a href="<?php echo 'item_index/'.$row->cust_id ?>" class="btn btn-primary btn-info btn-sm">Add Items</a>
							</td>
						</tr>
					<?php } ?>
				</tbody>				                    
              </table>
			  
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
	
    <!-- /.content -->
<!-- page script -->
@stop()