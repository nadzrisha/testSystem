@extends('layout.master')
@section('content')
<html>
<head>
	<title>Add Product</title>
</head>
<p style="color:red">{{ $errors->first('product_name') }}</p>
<p style="color:red">{{ $errors->first('product_price') }}</p>
<p style="color:red">{{ $errors->first('product_qty') }}</p>
<body>
	<form action="{{action('ProductController@update')}}" method="post">
		<input type="hidden" name="_token" value="<?= csrf_token(); ?>" >
		<input type="hidden" name="id" value="<?= $row->id ?>" >
		Product Name
		<input type="text" name="product_name" value="<?= $row->product_name ?>" class="form-control">
		Price
		<input type="text" name="product_price" value="<?= $row->product_price ?>" class="form-control">
		Quantity
		<input type="text" name="product_qty" value="<?= $row->product_qty ?>" class="form-control">
		<br>
		<input type="submit" value="Save Record" class="btn btn-primary">
	</form>
</body>
</html>
@stop()