<?php namespace App\Http\Controllers;
//for connection to DB
use DB;
//for making transaction or process
use Illuminate\Http\Request;
//for creating pagination
use Illuminate\Pagination\LengthAwarePaginator;

class CustomerController extends Controller {

	public function customer_index()
	{
		$result = DB::table('customer')->get();
		return view('customer.customer_index')->with('data',$result);
	}
	
	public function form()
	{
		return view('customer.customer_form');
	}
	
	public function deletecust($cust_id)
	{
		$i = DB::table('customer')->where('cust_id',$cust_id)->delete();
		if($i > 0)
		{
			\Session::flash('message','Record has been deleted');
			return redirect('customer_index');
		}
	}
	
	public function editcust($cust_id)
	{
		$row = DB::table('customer')->where('cust_id',$cust_id)->first();
		return view('customer.customer_edit')->with('row',$row);
	}
	
	public function updatecust(Request $request)
	{
		$post = $request->all();
		$v    = \Validator::make($request->all(),
			[
				'cust_name'  => 'required',
				'item_price' => 'required',
				'item_qty'   => 'required',
				'other_charge' => 'required',
				'discount'   => 'required',
				'tot_paid' => 'required',
				
			]);
		
		if($v->fails())
		{
			return redirect()->back()->withErrors($v->errors());
		}
		
		else
		{
			$data = array(
							'cust_name'  => $post['cust_name'],
							'cust_phone' => $post['cust_phone'],
							'cust_del_add'   => $post['cust_del_add'],
							
							'cust_state'  => $post['cust_state'],
							'cust_det_loc' => $post['cust_det_loc'],
							'cust_track_no'   => $post['cust_track_no'],
							
							'cust_courier'  => $post['cust_courier'],
							'cust_item_cat' => $post['cust_item_cat'],
							'cust_item_desc'   => $post['cust_item_desc'],
							
							'item_price'  => $post['item_price'],
							'item_qty' => $post['item_qty'],
							'other_charge'   => $post['other_charge'],
							
							'discount'  => $post['discount'],
							'tot_price' => $post['tot_price'],
							'cust_status'   => $post['cust_status'],
							
							'tot_paid'  => $post['tot_paid'],
							'balance' => $post['balance'],
						 );
		$i = DB::table('customer')->where('cust_id',$post['cust_id'])->update($data);
		if($i > 0)
		{
			\Session::flash('message','Record has been updated');
			return redirect('customer_index');
		}
		else
		{
			\Session::flash('message','Record unchanged');
			return redirect('customer_index');
		}
		}
	}
	
	
	public function savecust(Request $request)
	{
		$post = $request->all();
		$v    = \Validator::make($request->all(),
			[
				'cust_name'  => 'required',
				'item_price' => 'required',
				'item_qty'   => 'required',
				'other_charge' => 'required',
				'discount'   => 'required',
				'tot_paid' => 'required',
			
			]);
		
		if($v->fails())
		{
			return redirect()->back()->withErrors($v->errors());
		}
		
		else
		{
			$data = array(
							'cust_name'  => $post['cust_name'],
							'cust_phone' => $post['cust_phone'],
							'cust_del_add'   => $post['cust_del_add'],
							
							'cust_state'  => $post['cust_state'],
							'cust_det_loc' => $post['cust_det_loc'],
							'cust_track_no'   => $post['cust_track_no'],
							
							'cust_courier'  => $post['cust_courier'],
							'cust_item_cat' => $post['cust_item_cat'],
							'cust_item_desc'   => $post['cust_item_desc'],
							
							'item_price'  => $post['item_price'],
							'item_qty' => $post['item_qty'],
							'other_charge'   => $post['other_charge'],
							
							'discount'  => $post['discount'],
							'tot_price' => $post['tot_price'],
							'cust_status'   => $post['cust_status'],
							
							'tot_paid'  => $post['tot_paid'],
							'balance' => $post['balance'],
							
						 );
		$i = DB::table('customer')->insert($data);
		if($i > 0)
		{
			\Session::flash('message','Record has been saved');
			return redirect('customer_index');
		}
		}
	}

}
