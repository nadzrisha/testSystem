@extends('layout.master')
@section('content')

<?php $routeName =  \Illuminate\Support\Facades\Route::getFacadeRoot()->current()->getName() ?>

	<p style="color:red"><?php echo Session::get('message'); ?></p>
	

  <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
	<a href="<?php echo 'customerform' ?>" class="btn btn-app bg-blue">
		<i class="fa fa-user-plus"></i> Add Customer
    </a>
    
	<div class="row">
	  
        <div class="col-xs-12">

          <div class="box">
		  
            <div class="box-header">
			  <br>
              <h3 class="box-title">Customer table</h3>
            </div>

			<!-- /.box-header -->
            <div class="box-body">
			
              <table id="customerTable" class="table table-bordered table-striped">
				<thead>
					<th>Name</th>
					<th>Phone Number</th>
					<th>Status</th>
					<th>Tracking No</th>
					<th>Courier</th>
					<th>Item Category</th>
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
							<td><?php echo $row->cust_item_cat ?></td>
							<td>
								<a href="<?php echo 'EditCustomer/'.$row->cust_id ?>">Edit</a> |
								<a href="<?php echo 'DeleteCustomer/'.$row->cust_id ?>">Delete</a>
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