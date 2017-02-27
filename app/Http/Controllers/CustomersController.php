<?php namespace App\Http\Controllers;
//for connection to DB
use DB;
//for making transaction or process
use Illuminate\Http\Request;
//for creating pagination
use Illuminate\Pagination\LengthAwarePaginator;

class CustomersController extends Controller {

	public function customer_index()
	{
		$company = \Auth::user()->company;
		$result = DB::table('customer')->where('company',$company)->get();
		return view('customer.customer_index')->with('data',$result);
	}
	
	public function customerform()
	{
		$company = \Auth::user()->company;
		
		$couriername = DB::table('setup_courier')->where('company',$company)->lists('courier_name');
		$statename = DB::table('setup_state')->where('company',$company)->lists('state_name');
	    $detlocname = DB::table('setup_det_loc')->where('company',$company)->lists('det_loc_name');
		$custstatname = DB::table('setup_cust_stat')->where('company',$company)->lists('cust_stat_name');

		return view('customer.customer_form')->with('couriername',$couriername)->with('statename',$statename)->with('detlocname',$detlocname)->with('custstatname',$custstatname);
	}
		
	public function savecust(Request $request)
	{
		$post = $request->all();
		$v    = \Validator::make($request->all(),
			[
				'cust_name'  => 'required',
		
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
							'cust_track_no'   => $post['cust_track_no'],
							'cust_courier'  => $post['cust_courier'],
							
							'cust_del_add'   => $post['cust_del_add'],
							
							'cust_state'  => $post['cust_state'],
							'cust_det_loc' => $post['cust_det_loc'],

							'cust_status'   => $post['cust_status'],
							'cust_order_date'  => $post['cust_order_date'],
							'cust_deliver_date' => $post['cust_deliver_date'],
							'company' => $post['company'],
							
						 );
		$i = DB::table('customer')->insert($data);
		if($i > 0)
		{
			\Session::flash('alert-info','Customer Record has been saved');
			return redirect('customer_index');
		}
		}
	}
	
	
	public function deletecust($cust_id)
	{
		$company = \Auth::user()->company;
		$checkcustitem = DB::table('item')->select('item_id')->where('cust_id', $cust_id)->where('company',$company)->first();
		
		if(is_null($checkcustitem))
		{
			$i = DB::table('customer')->where('cust_id',$cust_id)->where('company',$company)->delete();
			if($i > 0)
			{
				\Session::flash('alert-danger','Customer Record has been deleted');
				return redirect('customer_index');
			}
		}
		else
		{
			\Session::flash('alert-danger','Customer Record delete failed. Customer record contains item data. Please delete customer item data first.');
			return redirect('customer_index');
		}
	}
	
	public function editcust($cust_id)
	{
		$company = \Auth::user()->company;
		$row = DB::table('customer')->where('cust_id',$cust_id)->where('company',$company)->first();
		
		$couriername = DB::table('setup_courier')->where('company',$company)->lists('courier_name');
		$statename = DB::table('setup_state')->where('company',$company)->lists('state_name');
	    $detlocname = DB::table('setup_det_loc')->where('company',$company)->lists('det_loc_name');
		$custstatname = DB::table('setup_cust_stat')->where('company',$company)->lists('cust_stat_name');

		return view('customer.customer_edit')
		->with('row',$row)
		->with('couriername',$couriername)
		->with('statename',$statename)
		->with('detlocname',$detlocname)
		->with('custstatname',$custstatname);

	}
	
	public function updatecust(Request $request)
	{
		$company = \Auth::user()->company;
		$post = $request->all();
		$v    = \Validator::make($request->all(),
			[
				'cust_name'  => 'required',
				
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
							'cust_track_no'   => $post['cust_track_no'],
							'cust_courier'  => $post['cust_courier'],
							
							'cust_del_add'   => $post['cust_del_add'],
							
							'cust_state'  => $post['cust_state'],
							'cust_det_loc' => $post['cust_det_loc'],

							'cust_status'   => $post['cust_status'],
							'cust_order_date'  => $post['cust_order_date'],
							'cust_deliver_date' => $post['cust_deliver_date'],
							'company' => $post['company'],
						 );
		$i = DB::table('customer')->where('cust_id',$post['cust_id'])->where('company',$company)->update($data);
		if($i > 0)
		{
			\Session::flash('alert-success','Customer Record has been updated');
			return redirect('customer_index');
		}
		else
		{
			\Session::flash('alert-warning','Customer Record unchanged');
			return redirect('customer_index');
		}
		}
	}
	
	


}
