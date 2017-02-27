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
	<a href="<?php echo 'purch_item_form' ?>" class="btn btn-app bg-blue">
		<i class="fa fa-plus-circle"></i> Add Purchasing Item
    </a>
    
	<div class="row">
	  
        <div class="col-xs-12">

          <div class="box">
		  
            <div class="box-header">
			  <br>
              <h3 class="box-title">Purchasing Item table</h3>
            </div>

			<!-- /.box-header -->
            <div class="box-body">
			
              <table id="customerTable" class="table table-bordered table-striped">
				<thead>
					<th>Item Name</th>
					<th>Price</th>
					<th>Description</th>
					<th>Options</th>
				</thead>
				<tbody>
					<?php
						foreach($data as $row){
					?>
						<tr>
							<td><?php echo $row->purch_item_name ?></td>
							<td><?php echo $row->purch_item_price ?></td>
							<td><?php echo $row->purch_item_desc ?></td>
							<td>
								<a href="<?php echo 'EditSetupPurchasingItem/'.$row->purch_item_id ?>" class="btn btn-primary btn-success btn-sm">Edit</a> |
								<a href="<?php echo 'DeleteSetupPurchasingItem/'.$row->purch_item_id ?>" class="btn btn-primary btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')">Delete</a>
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