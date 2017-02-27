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
    <a href="<?php echo 'purchaseform' ?>" class="btn btn-app bg-blue">
		<i class="fa fa-plus"></i> Add Purchase
    </a>
	<div class="row">
	  
        <div class="col-xs-12">

          <div class="box">
		  
            <div class="box-header">
			  <br>
              <h3 class="box-title">Purchase table</h3>
            </div>

			<!-- /.box-header -->
            <div class="box-body table-responsive">
			
              <table id="customerTable" class="table table-hover">
				<thead>
					<th>Purchase Name</th>
					<th>Description</th>
					<th>Grand Total Price</th>
					<th>Date Purchased</th>
					<th>Options</th>
				</thead>
				<tbody>
					<?php
						foreach($data as $row){
					?>
						<tr>
							<td><?php echo $row->purchase_name ?></td>
							<td><?php echo $row->purchase_desc ?></td>
							<td><?php echo $row->purchase_tot_price ?></td>
							<td><?php echo $row->purchase_date ?></td>
							<td>
								<a href="<?php echo 'EditPurchase/'.$row->purchase_id ?>" class="btn btn-primary btn-success btn-sm">Edit</a> |
								<a href="<?php echo 'DeletePurchase/'.$row->purchase_id ?>" class="btn btn-primary btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')">Delete</a> |
								<a href="<?php echo 'purch_det_index/'.$row->purchase_id ?>" class="btn btn-primary btn-info btn-sm">Add Items</a>
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