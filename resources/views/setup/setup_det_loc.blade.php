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
	<a href="<?php echo 'det_loc_form' ?>" class="btn btn-app bg-blue">
		<i class="fa fa-plus-circle"></i> Add Detail Location
    </a>
    
	<div class="row">
	  
        <div class="col-xs-12">

          <div class="box">
		  
            <div class="box-header">
			  <br>
              <h3 class="box-title">Detail Location table</h3>
            </div>

			<!-- /.box-header -->
            <div class="box-body table-responsive">
			
              <table id="customerTable" class="table table-hover">
				<thead>
					<th>Name</th>
					<th>Options</th>
				</thead>
				<tbody>
					<?php
						foreach($data as $row){
					?>
						<tr>
							<td><?php echo $row->det_loc_name ?></td>
							<td>
								<a href="<?php echo 'EditDetLoc/'.$row->det_loc_id ?>" class="btn btn-primary btn-success btn-sm">Edit</a> |
								<a href="<?php echo 'DeleteDetLoc/'.$row->det_loc_id ?>" class="btn btn-primary btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')">Delete</a>
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