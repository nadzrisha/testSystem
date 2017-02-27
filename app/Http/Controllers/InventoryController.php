<?php namespace App\Http\Controllers;
//for connection to DB
use DB;
//for making transaction or process
use Illuminate\Http\Request;
//for creating pagination
use Illuminate\Pagination\LengthAwarePaginator;

class InventoryController extends Controller {

//
//////
	public function inventory_stock()
	{
		$company = \Auth::user()->company;
		$result = DB::table('stock')->where('company',$company)->get();
		return view('inventory.inventory_stock')->with('data',$result);
	}
	
	//
//////

	public function inventory_purchase()
	{
		$company = \Auth::user()->company;
		$result = DB::table('purchase')->where('company',$company)->get();
		return view('inventory.inventory_purchase')->with('data',$result);
	}
	
		public function purchaseform()
	{
		return view('inventory.purchase_form');
	}
		
	public function savepurchase(Request $request)
	{
		$post = $request->all();
		$v    = \Validator::make($request->all(),
			[
				'purchase_name'  => 'required',
		
			]);
		
		if($v->fails())
		{
			return redirect()->back()->withErrors($v->errors());
		}
		
		else
		{
			$data = array(
							'purchase_name'  => $post['purchase_name'],
							'purchase_date' => $post['purchase_date'],
							'purchase_desc'   => $post['purchase_desc'],
							'purchase_tot_price'   => 0,
							'company' => $post['company'],
							
						 );
		$i = DB::table('purchase')->insert($data);
		if($i > 0)
		{
			\Session::flash('alert-info','Purchase Record has been saved');
			return redirect('inventory_purchase');
		}
		}
	}
	
	public function DeletePurchase($purchase_id)
	{
		$company = \Auth::user()->company;
		$checkdata = DB::table('purchase_detail')->select('pur_det_id')->where('purchase_id', $purchase_id)->where('company', $company)->first();
					
		if(is_null($checkdata))
		{
				$i = DB::table('purchase')->where('purchase_id',$purchase_id)->delete();
				if($i > 0)
				{
					\Session::flash('alert-danger','Purchase Record has been deleted');
					return redirect('inventory_purchase');
				}
		}
					
		else
		{
			\Session::flash('alert-danger','Delete Failed. Purchase record contains data. Please delete detailed purchase item first.');
			return redirect('inventory_purchase');
		}
	}
	
	public function EditPurchase($purchase_id)
	{
		$row = DB::table('purchase')->where('purchase_id',$purchase_id)->first();
		return view('inventory.purchase_edit')->with('row',$row);
	}
	
	public function updatePurchase(Request $request)
	{
		$post = $request->all();
		$v    = \Validator::make($request->all(),
			[
				'purchase_name'  => 'required',
				
			]);
		
		if($v->fails())
		{
			return redirect()->back()->withErrors($v->errors());
		}
		
		else
		{
			$data = array(
							'purchase_name'  => $post['purchase_name'],
							'purchase_date' => $post['purchase_date'],
							'purchase_desc'   => $post['purchase_desc'],
							'company' => $post['company'],
							
						 );
						 
		$i = DB::table('purchase')->where('purchase_id',$post['purchase_id'])->update($data);
		if($i > 0)
		{
			\Session::flash('alert-success','Purchase Record has been updated');
			return redirect('inventory_purchase');
		}
		else
		{
			\Session::flash('alert-warning','Purchase Record unchanged');
			return redirect('inventory_purchase');
		}
		}
	}

}
