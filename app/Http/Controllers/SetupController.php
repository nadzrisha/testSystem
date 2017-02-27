<?php namespace App\Http\Controllers;
//for connection to DB
use DB;
//for making transaction or process
use Illuminate\Http\Request;
//for creating pagination
use Illuminate\Pagination\LengthAwarePaginator;
use Hash;
class SetupController extends Controller {

//============================================================================================================
//===================== CUSTOMER ITEM ==========================================

	public function setup_cust_item()
	{
		$company = \Auth::user()->company;
		$result = DB::table('setup_cust_item')->where('company',$company)->get();
		return view('setup.setup_cust_item')->with('data',$result);
	}
	
	public function cust_item_form()
	{
		return view('setup.cust_item_form');
	}
		
	public function save_cust_item(Request $request)
	{
		$company = \Auth::user()->company;
		$post = $request->all();
		$v    = \Validator::make($request->all(),
			[
				'cust_item_name'  => 'required',
		
			]);
		
		if($v->fails())
		{
			return redirect()->back()->withErrors($v->errors());
		}
		
		else
		{
			$data = array(
							'cust_item_name'  => $post['cust_item_name'],
							//'cust_item_price' => $post['cust_item_price'],
							'cust_item_desc'   => $post['cust_item_desc'],

							'company' => $post['company'],
							
						 );
						 
		$i = DB::table('setup_cust_item')->insert($data);
		if($i > 0)
		{
			\Session::flash('alert-info','Customer Item Record has been saved');
			return redirect('setup_cust_item');
		}
		}
	}
	
	public function DeleteCustomerItem($cust_item_id)
	{
		$company = \Auth::user()->company;
		$i = DB::table('setup_cust_item')->where('cust_item_id',$cust_item_id)->where('company',$company)->delete();
		if($i > 0)
		{
			\Session::flash('alert-danger','Customer Item Setup Record has been deleted');
			return redirect('setup_cust_item');
		}
	}
	
	public function EditCustomerItem($cust_item_id)
	{
		$company = \Auth::user()->company;
		$row = DB::table('setup_cust_item')->where('cust_item_id',$cust_item_id)->where('company',$company)->first();
		return view('setup.cust_item_edit')->with('row',$row);
	}
	
	public function update_cust_item(Request $request)
	{
		$company = \Auth::user()->company;
		$post = $request->all();
		$v    = \Validator::make($request->all(),
			[
				'cust_item_name'  => 'required',
				
			]);
		
		if($v->fails())
		{
			return redirect()->back()->withErrors($v->errors());
		}
		
		else
		{
			$data = array(
							'cust_item_name'  => $post['cust_item_name'],
							//'cust_item_price' => $post['cust_item_price'],
							'cust_item_desc'   => $post['cust_item_desc'],

							'company' => $post['company'],
						 );
						 
		$i = DB::table('setup_cust_item')->where('cust_item_id',$post['cust_item_id'])->where('company',$post['company'])->update($data);
		if($i > 0)
		{
			\Session::flash('alert-success','Customer Item Setup Record has been updated');
			return redirect('setup_cust_item');
		}
		else
		{
			\Session::flash('alert-warning','Customer Item Setup Record unchanged');
			return redirect('setup_cust_item');
		}
		}
	}
	

	


	//============================================================================================================
	//=========================== STATE ==========================================

	public function setup_state()
	{
		$company = \Auth::user()->company;
		$result = DB::table('setup_state')->where('company',$company)->get();
		return view('setup.setup_state')->with('data',$result);
	}
	
	public function state_form()
	{
		return view('setup.state_form');
	}
		
	public function save_state(Request $request)
	{
		$company = \Auth::user()->company;
		$post = $request->all();
		$v    = \Validator::make($request->all(),
			[
				'state_name'  => 'required',
		
			]);
		
		if($v->fails())
		{
			return redirect()->back()->withErrors($v->errors());
		}
		
		else
		{
			$data = array(
							'state_name'  => $post['state_name'],

							'company' => $post['company'],
							
						 );
						 
		$i = DB::table('setup_state')->insert($data);
		if($i > 0)
		{
			\Session::flash('alert-info','State Record has been saved');
			return redirect('setup_state');
		}
		}
	}
	
	public function DeleteState($state_id)
	{
		$company = \Auth::user()->company;
		$i = DB::table('setup_state')->where('state_id',$state_id)->where('company',$company)->delete();
		if($i > 0)
		{
			\Session::flash('alert-danger','State Setup Record has been deleted');
			return redirect('setup_state');
		}
	}
	
	public function EditState($state_id)
	{
		$company = \Auth::user()->company;
		$row = DB::table('setup_state')->where('state_id',$state_id)->where('company',$company)->first();
		return view('setup.state_edit')->with('row',$row);
	}
	
	public function update_state(Request $request)
	{
		$company = \Auth::user()->company;
		$post = $request->all();
		$v    = \Validator::make($request->all(),
			[
				'state_name'  => 'required',
				
			]);
		
		if($v->fails())
		{
			return redirect()->back()->withErrors($v->errors());
		}
		
		else
		{
			$data = array(
							'state_name'  => $post['state_name'],

							'company' => $post['company'],
						 );
						 
		$i = DB::table('setup_state')->where('state_id',$post['state_id'])->where('company',$post['company'])->update($data);
		if($i > 0)
		{
			\Session::flash('alert-success','State Setup Record has been updated');
			return redirect('setup_state');
		}
		else
		{
			\Session::flash('alert-warning','State Setup Record unchanged');
			return redirect('setup_state');
		}
		}
	}


		//============================================================================================================
		//=========================== DETAIL LOCATION ==========================================

	public function setup_det_loc()
	{
		$company = \Auth::user()->company;
		$result = DB::table('setup_det_loc')->where('company',$company)->get();
		return view('setup.setup_det_loc')->with('data',$result);
	}
	
	public function det_loc_form()
	{
		return view('setup.det_loc_form');
	}
		
	public function save_det_loc(Request $request)
	{
		$company = \Auth::user()->company;
		$post = $request->all();
		$v    = \Validator::make($request->all(),
			[
				'det_loc_name'  => 'required',
		
			]);
		
		if($v->fails())
		{
			return redirect()->back()->withErrors($v->errors());
		}
		
		else
		{
			$data = array(
							'det_loc_name'  => $post['det_loc_name'],

							'company' => $post['company'],
							
						 );
						 
		$i = DB::table('setup_det_loc')->insert($data);
		if($i > 0)
		{
			\Session::flash('alert-info','Detail Location Record has been saved');
			return redirect('setup_det_loc');
		}
		}
	}
	
	public function DeleteDetLoc($det_loc_id)
	{
		$company = \Auth::user()->company;
		$i = DB::table('setup_det_loc')->where('det_loc_id',$det_loc_id)->where('company',$company)->delete();
		if($i > 0)
		{
			\Session::flash('alert-danger','Detail Location Setup Record has been deleted');
			return redirect('setup_det_loc');
		}
	}
	
	public function EditDetLoc($det_loc_id)
	{
		$company = \Auth::user()->company;
		$row = DB::table('setup_det_loc')->where('det_loc_id',$det_loc_id)->where('company',$company)->first();
		return view('setup.det_loc_edit')->with('row',$row);
	}
	
	public function update_det_loc(Request $request)
	{
		$company = \Auth::user()->company;
		$post = $request->all();
		$v    = \Validator::make($request->all(),
			[
				'det_loc_name'  => 'required',
				
			]);
		
		if($v->fails())
		{
			return redirect()->back()->withErrors($v->errors());
		}
		
		else
		{
			$data = array(
							'det_loc_name'  => $post['det_loc_name'],

							'company' => $post['company'],
						 );
						 
		$i = DB::table('setup_det_loc')->where('det_loc_id',$post['det_loc_id'])->where('company',$post['company'])->update($data);
		if($i > 0)
		{
			\Session::flash('alert-success','Detail Location Setup Record has been updated');
			return redirect('setup_det_loc');
		}
		else
		{
			\Session::flash('alert-warning','Detail Location Setup Record unchanged');
			return redirect('setup_det_loc');
		}
		}
	}
	
	
	

		//============================================================================================================
		//=========================== Customer Status ==========================================

	public function setup_cust_stat()
	{
		$company = \Auth::user()->company;
		$result = DB::table('setup_cust_stat')->where('company',$company)->get();
		return view('setup.setup_cust_stat')->with('data',$result);
	}
	
	public function cust_stat_form()
	{
		return view('setup.cust_stat_form');
	}
		
	public function save_cust_stat(Request $request)
	{
		$company = \Auth::user()->company;
		$post = $request->all();
		$v    = \Validator::make($request->all(),
			[
				'cust_stat_name'  => 'required',
		
			]);
		
		if($v->fails())
		{
			return redirect()->back()->withErrors($v->errors());
		}
		
		else
		{
			$data = array(
							'cust_stat_name'  => $post['cust_stat_name'],

							'company' => $post['company'],
							
						 );
						 
		$i = DB::table('setup_cust_stat')->insert($data);
		if($i > 0)
		{
			\Session::flash('alert-info','Customer Status Record has been saved');
			return redirect('setup_cust_stat');
		}
		}
	}
	
	public function DeleteCustStat($cust_stat_id)
	{
		$company = \Auth::user()->company;
		$i = DB::table('setup_cust_stat')->where('cust_stat_id',$cust_stat_id)->where('company',$company)->delete();
		if($i > 0)
		{
			\Session::flash('alert-danger','Customer Status Setup Record has been deleted');
			return redirect('setup_cust_stat');
		}
	}
	
	public function EditCustStat($cust_stat_id)
	{
		$company = \Auth::user()->company;
		$row = DB::table('setup_cust_stat')->where('cust_stat_id',$cust_stat_id)->where('company',$company)->first();
		return view('setup.cust_stat_edit')->with('row',$row);
	}
	
	public function update_cust_stat(Request $request)
	{
		$company = \Auth::user()->company;
		$post = $request->all();
		$v    = \Validator::make($request->all(),
			[
				'cust_stat_name'  => 'required',
				
			]);
		
		if($v->fails())
		{
			return redirect()->back()->withErrors($v->errors());
		}
		
		else
		{
			$data = array(
							'cust_stat_name'  => $post['cust_stat_name'],

							'company' => $post['company'],
						 );
						 
		$i = DB::table('setup_cust_stat')->where('cust_stat_id',$post['cust_stat_id'])->where('company',$post['company'])->update($data);
		if($i > 0)
		{
			\Session::flash('alert-success','Customer Status Setup Record has been updated');
			return redirect('setup_cust_stat');
		}
		else
		{
			\Session::flash('alert-warning','Customer Status Setup Record unchanged');
			return redirect('setup_cust_stat');
		}
		}
	}
	
	
	

		//============================================================================================================
		//=========================== Courier ==========================================

	public function setup_courier()
	{
		$company = \Auth::user()->company;
		$result = DB::table('setup_courier')->where('company',$company)->get();
		return view('setup.setup_courier')->with('data',$result);
	}
	
	public function courier_form()
	{
		return view('setup.courier_form');
	}
		
	public function save_courier(Request $request)
	{
		$company = \Auth::user()->company;
		$post = $request->all();
		$v    = \Validator::make($request->all(),
			[
				'courier_name'  => 'required',
		
			]);
		
		if($v->fails())
		{
			return redirect()->back()->withErrors($v->errors());
		}
		
		else
		{
			$data = array(
							'courier_name'  => $post['courier_name'],

							'company' => $post['company'],
							
						 );
						 
		$i = DB::table('setup_courier')->insert($data);
		if($i > 0)
		{
			\Session::flash('alert-info','Courier Record has been saved');
			return redirect('setup_courier');
		}
		}
	}
	
	public function DeleteCourier($courier_id)
	{
		$company = \Auth::user()->company;
		$i = DB::table('setup_courier')->where('courier_id',$courier_id)->where('company',$company)->delete();
		if($i > 0)
		{
			\Session::flash('alert-danger','Courier Setup Record has been deleted');
			return redirect('setup_courier');
		}
	}
	
	public function EditCourier($courier_id)
	{
		$company = \Auth::user()->company;
		$row = DB::table('setup_courier')->where('courier_id',$courier_id)->where('company',$company)->first();
		return view('setup.courier_edit')->with('row',$row);
	}
	
	public function update_courier(Request $request)
	{
		$company = \Auth::user()->company;
		$post = $request->all();
		$v    = \Validator::make($request->all(),
			[
				'courier_name'  => 'required',
				
			]);
		
		if($v->fails())
		{
			return redirect()->back()->withErrors($v->errors());
		}
		
		else
		{
			$data = array(
							'courier_name'  => $post['courier_name'],

							'company' => $post['company'],
						 );
						 
		$i = DB::table('setup_courier')->where('courier_id',$post['courier_id'])->where('company',$post['company'])->update($data);
		if($i > 0)
		{
			\Session::flash('alert-success','Courier Setup Record has been updated');
			return redirect('setup_courier');
		}
		else
		{
			\Session::flash('alert-warning','Courier Setup Record unchanged');
			return redirect('setup_courier');
		}
		}
	}
	
	
			//============================================================================================================
			//=========================== Register User ==========================================

	public function register_user()
	{
		//$company = \Auth::user()->company;
		$result = DB::table('users')->get();
		return view('setup.users_list')->with('data',$result);
	}
	
	public function users_list_form()
	{
		return view('setup.users_list_form');
	}
	
	public function save_users(Request $request)
	{
		$post = $request->all();
		$v    = \Validator::make($request->all(),
			[
				'name'  => 'required',
				'username'  => 'required',
				'company'  => 'required',
				'password'  => 'required',
		
			]);
		
		if($v->fails())
		{
			return redirect()->back()->withErrors($v->errors());
		}
		
		else
		{
			$data = array(
							'name'  => $post['name'],
							'username'  => $post['username'],
							'company' => $post['company'],
							'password' => Hash::make($post['password']),
							
						 );
						 
		$i = DB::table('users')->insert($data);
		if($i > 0)
		{
			\Session::flash('alert-info','Users Record has been saved');
			return redirect('register_user');
		}
		}
	}
	
	public function DeleteUsers($id)
	{
		$i = DB::table('users')->where('id',$id)->delete();
		if($i > 0)
		{
			\Session::flash('alert-danger','Users Record has been deleted');
			return redirect('register_user');
		}
	}
	
	public function EditUsers($id)
	{
		$row = DB::table('users')->where('id',$id)->first();
		return view('setup.users_list_edit')->with('row',$row);
	}
	
	public function update_users(Request $request)
	{
		$post = $request->all();
		$v    = \Validator::make($request->all(),
			[
				'name'  => 'required',
				'username'  => 'required',
				'company'  => 'required',
				'password'  => 'required',
				
			]);
		
		if($v->fails())
		{
			return redirect()->back()->withErrors($v->errors());
		}
		
		else
		{
			$data = array(
							'name'  => $post['name'],
							'username'  => $post['username'],
							'company' => $post['company'],
							'password' => Hash::make($post['password']),
						 );
						 
		$i = DB::table('users')->where('id',$post['id'])->update($data);
		if($i > 0)
		{
			\Session::flash('alert-success','Users Record has been updated');
			return redirect('register_user');
		}
		else
		{
			\Session::flash('alert-warning','Users Record unchanged');
			return redirect('register_user');
		}
		}
	}
	
	
	
	
	
	/*	
	//============================================================================================================
//===================== PURCHASING ITEM ==========================================

	public function setup_purch_item()
	{
		$company = \Auth::user()->company;
		$result = DB::table('setup_purch_item')->where('company',$company)->get();
		return view('setup.setup_purch_item')->with('data',$result);
	}
	
	public function purch_item_form()
	{
		return view('setup.purch_item_form');
	}
		
	public function save_purch_item(Request $request)
	{
		$post = $request->all();
		$v    = \Validator::make($request->all(),
			[
				'purch_item_name'  => 'required',
		
			]);
		
		if($v->fails())
		{
			return redirect()->back()->withErrors($v->errors());
		}
		
		else
		{
			$data = array(
							'purch_item_name'  => $post['purch_item_name'],
							'purch_item_price' => $post['purch_item_price'],
							'purch_item_desc'   => $post['purch_item_desc'],

							'company' => $post['company'],
							
						 );
						 
		$i = DB::table('setup_purch_item')->insert($data);
		if($i > 0)
		{
			\Session::flash('alert-info','Purchasing Item Record has been saved');
			return redirect('setup_purch_item');
		}
		}
	}
	
	public function DeleteSetupPurchasingItem($purch_item_id)
	{
		$i = DB::table('setup_purch_item')->where('purch_item_id',$purch_item_id)->delete();
		if($i > 0)
		{
			\Session::flash('alert-danger','Purchasing Item Setup Record has been deleted');
			return redirect('setup_purch_item');
		}
	}
	
	public function EditSetupPurchasingItem($purch_item_id)
	{
		$row = DB::table('setup_purch_item')->where('purch_item_id',$purch_item_id)->first();
		return view('setup.purch_item_edit')->with('row',$row);
	}
	
	public function update_purch_item(Request $request)
	{
		$post = $request->all();
		$v    = \Validator::make($request->all(),
			[
				'purch_item_name'  => 'required',
				
			]);
		
		if($v->fails())
		{
			return redirect()->back()->withErrors($v->errors());
		}
		
		else
		{
			$data = array(
							'purch_item_name'  => $post['purch_item_name'],
							'purch_item_price' => $post['purch_item_price'],
							'purch_item_desc'   => $post['purch_item_desc'],

							'company' => $post['company'],
						 );
						 
		$i = DB::table('setup_purch_item')->where('purch_item_id',$post['purch_item_id'])->where('company',$post['company'])->update($data);
		if($i > 0)
		{
			\Session::flash('alert-success','Purchasing Item Setup Record has been updated');
			return redirect('setup_purch_item');
		}
		else
		{
			\Session::flash('alert-warning','Purchasing Item Setup Record unchanged');
			return redirect('setup_purch_item');
		}
		}
	}
*/
}
