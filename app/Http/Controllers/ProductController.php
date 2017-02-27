<?php namespace App\Http\Controllers;
//for connection to DB
use DB;
//for making transaction or process
use Illuminate\Http\Request;
//for creating pagination
use Illuminate\Pagination\LengthAwarePaginator;

class ProductController extends Controller {

	public function index()
	{
		$result = DB::table('products')->paginate(5);
		return view('product.index')->with('data',$result);
	}

	public function form()
	{
		return view('product.form');
	}
	
	public function delete($id)
	{
		$i = DB::table('products')->where('id',$id)->delete();
		if($i > 0)
		{
			\Session::flash('message','Record has been deleted');
			return redirect('productindex');
		}
	}
	
	public function edit($id)
	{
		$row = DB::table('products')->where('id',$id)->first();
		return view('product.edit')->with('row',$row);
	}
	
	public function update(Request $request)
	{
		$post = $request->all();
		$v    = \Validator::make($request->all(),
			[
				'product_name'  => 'required',
				'product_price' => 'required',
				'product_qty'   => 'required',
			
			]);
		
		if($v->fails())
		{
			return redirect()->back()->withErrors($v->errors());
		}
		
		else
		{
			$data = array(
							'product_name'  => $post['product_name'],
							'product_price' => $post['product_price'],
							'product_qty'   => $post['product_qty'],	
						 );
		$i = DB::table('products')->where('id',$post['id'])->update($data);
		if($i > 0)
		{
			\Session::flash('message','Record has been updated');
			return redirect('productindex');
		}
		}
	}
	
	public function save(Request $request)
	{
		$post = $request->all();
		$v    = \Validator::make($request->all(),
			[
				'product_name'  => 'required',
				'product_price' => 'required',
				'product_qty'   => 'required',
			
			]);
		
		if($v->fails())
		{
			return redirect()->back()->withErrors($v->errors());
		}
		
		else
		{
			$data = array(
							'product_name'  => $post['product_name'],
							'product_price' => $post['product_price'],
							'product_qty'   => $post['product_qty'],	
						 );
		$i = DB::table('products')->insert($data);
		if($i > 0)
		{
			\Session::flash('message','Record has been saved');
			return redirect('productindex');
		}
		}
	}
}
