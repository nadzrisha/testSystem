@extends('layout.master')
@section('content')
	<p style="color:red"><?php echo Session::get('message'); ?></p>
	<a href="<?php echo 'productform' ?>">Add New Product</a>
	<table class="table table-bordered table-hover">
		<thead>
			<th>ProductID</th>
			<th>ProductName</th>
			<th>Price</th>
			<th>Quantity</th>
			<th>Action</th>
		</thead>
		<tbody>
			<?php
				foreach($data as $row){
			?>
				<tr>
					<td><?php echo $row->id ?></td>
					<td><?php echo $row->product_name ?></td>
					<td><?php echo $row->product_price ?></td>
					<td><?php echo $row->product_qty ?></td>
					<td>
						<a href="<?php echo 'EditProduct/'.$row->id ?>">Edit</a> |
						<a href="<?php echo 'DeleteProduct/'.$row->id ?>">Delete</a>
					</td>
				</tr>
			<?php } ?>
			<!-- display next prev button -->
			<?php echo $data->render(); ?>
		</tbody>
	</table>
@stop()