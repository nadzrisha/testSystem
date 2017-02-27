<?php namespace App\Http\Controllers;
//for connection to DB
use DB;
//for making transaction or process
use Illuminate\Http\Request;
//for creating pagination
use Illuminate\Pagination\LengthAwarePaginator;

class ItemController extends Controller {

	public function item_index($cust_id)
	{
		$company = \Auth::user()->company;
		$result = DB::table('item')->where('cust_id',$cust_id)->where('company',$company)->get();
		$resultName = DB::table('customer')->where('cust_id',$cust_id)->where('company',$company)->get();
		$grand_tot_price = DB::table('item')->where('cust_id',$cust_id)->where('company',$company)->sum('item_tot_price');
		$item_tot_cost = DB::table('item')->where('cust_id',$cust_id)->where('company',$company)->sum('item_tot_cost');
		$item_profit = DB::table('item')->where('cust_id',$cust_id)->where('company',$company)->sum('item_profit');
		
		$tot_paid = DB::table('customer')->where('cust_id',$cust_id)->where('company',$company)->sum('tot_paid');
		$balance = DB::table('customer')->where('cust_id',$cust_id)->where('company',$company)->sum('balance');
		
		return view('item.item_index')
		->with('data',$result)
		->with('cust_name',$resultName)
		->with('cust_id',$cust_id)
		->with('grand_tot_price',$grand_tot_price)
		->with('item_tot_cost',$item_tot_cost)
		->with('item_profit',$item_profit)
		->with('tot_paid',$tot_paid)
		->with('balance',$balance);
	}
	
	public function itemform($cust_id)
	{
		$company = \Auth::user()->company;
		$row = DB::table('customer')->where('company',$company)->where('cust_id',$cust_id)->first();
		
		$itemname = DB::table('stock')->where('company',$company)->lists('stock_name');
		
		return view('item.item_form')
		->with('row',$row)
		->with('stock_name',$itemname);
	}
	
	public function saveitem(Request $request)
	{
		$post = $request->all();
		$v    = \Validator::make($request->all(),
			[
				'item_name'  => 'required',
				'item_price'  => 'required',
				'item_qty'  => 'required',
				'item_other_chrge'  => 'required',
				'item_disc'  => 'required',
				'item_tot_cost'  => 'required',
		
			]);
		
		if($v->fails())
		{
			return redirect()->back()->withErrors($v->errors());
		}
		
		else
		{	
		$data = array(
						'item_name'  => $post['item_name'],
						'item_desc' => $post['item_desc'],

						'item_price'   => $post['item_price'],
						'item_qty'  => $post['item_qty'],
						
						'item_other_chrge' => $post['item_other_chrge'],
						'item_disc' => $post['item_disc'],
						'item_tot_price' => $post['item_tot_price'],
						
						'item_tot_cost' => $post['item_tot_cost'],
						'item_profit' => $post['item_profit'],
						'cust_id' => $post['cust_id'],
						'company' => $post['company'],
						
					 );
		
		$id =  $post['cust_id'];
		$company = $post['company'];
		
		$checksame = DB::table('item')->select('item_name')->where('item_name', $post['item_name'])->where('company',$company)->first();
		
		if(is_null($checksame))
		{
				
				if($post['item_name'] == 'none')
				{
					\Session::flash('alert-danger','Invalid Item. Please Choose available Item or purchase any item first.');
					//return redirect('item_index/'.$id);
					return redirect()->back();
					
				}
				
				$checkstock = DB::table('stock')->select('stock_quantity')->where('stock_name', $post['item_name'])->where('company',$company)->first();
				$stockquan = $checkstock->stock_quantity;

				$deductstock = $stockquan - $post['item_qty'];
				
				if($deductstock < 0)
				{
					\Session::flash('alert-danger','Not enough stock. Please purchase more stock.');
					return redirect('item_index/'.$id);
					
				}
				else
				{
					$i = DB::table('item')->insert($data);
					if($i > 0)
					{
					$grand_tot_price = DB::table('item')->where('cust_id',$id)->where('company',$company)->sum('item_tot_price');
					$item_tot_paid = DB::table('customer')->where('cust_id',$id)->where('company',$company)->sum('tot_paid');
				
					$balance = $item_tot_paid - $grand_tot_price;
					DB::update("UPDATE customer SET balance = $balance where cust_id = '$id' and company = '$company'");
					
					DB::update("UPDATE stock SET stock_quantity = $deductstock where stock_name = '$post[item_name]' and company = '$company'");
					
					\Session::flash('alert-info','Item Record has been saved');
					return redirect('item_index/'.$id);
					}
				}
		}
		else
		{
			\Session::flash('alert-danger','Item Record already exist.');
			return redirect('item_index/'.$id);
		}
		
		}
		
		
	}
		
	public function deleteitem($item_id)
	{
		$company = \Auth::user()->company;
		$id = DB::table('item')->select('cust_id','item_name','item_qty')->where('item_id', $item_id)->where('company',$company)->first();
		$id_cust = $id->cust_id;
		$itemname = $id->item_name;
		$currquan = $id->item_qty;
		
		$checkstock = DB::table('stock')->select('stock_quantity')->where('stock_name', $itemname)->where('company',$company)->first();
		$stockquan = $checkstock->stock_quantity;
	
		$newstock = $stockquan + $currquan;
		
		DB::update("UPDATE stock SET stock_quantity = '$newstock' where stock_name = '$itemname' and company = '$company'");
		
		$i = DB::table('item')->where('item_id',$item_id)->where('company',$company)->delete();
		
		$grand_tot_price = DB::table('item')->where('cust_id',$id_cust)->where('company',$company)->sum('item_tot_price');
		$item_tot_paid = DB::table('customer')->where('cust_id',$id_cust)->where('company',$company)->sum('tot_paid');
		
		$balance = $item_tot_paid - $grand_tot_price;
		DB::update("UPDATE customer SET balance = $balance where cust_id = $id_cust and company = '$company'");
		
		if($i > 0)
		{
			\Session::flash('alert-danger','Item Record has been deleted');
			return redirect('item_index/'.$id_cust);
			
		}
	}
	
	public function edititem($item_id)
	{
		$company = \Auth::user()->company;
		$row = DB::table('item')->where('item_id',$item_id)->where('company',$company)->first();
		
		$itemname = DB::table('stock')->where('company',$company)->lists('stock_name');

		return view('item.item_edit')
		->with('row',$row)
		->with('stock_name',$itemname);
	}
	
	public function updateitem(Request $request)
	{
		$post = $request->all();
		$v    = \Validator::make($request->all(),
			[
				'item_name'  => 'required',
				'item_price'  => 'required',
				'item_qty'  => 'required',
				'item_other_chrge'  => 'required',
				'item_disc'  => 'required',
				'item_tot_cost'  => 'required',
			]);
		
		if($v->fails())
		{
			return redirect()->back()->withErrors($v->errors());
		}
		
		else
		{
			$data = array(
							'item_name'  => $post['item_name'],
							'item_desc' => $post['item_desc'],

							'item_price'   => $post['item_price'],
							'item_qty'  => $post['item_qty'],
							
							'item_other_chrge' => $post['item_other_chrge'],
							'item_disc' => $post['item_disc'],
							'item_tot_price' => $post['item_tot_price'],
							
							'item_tot_cost' => $post['item_tot_cost'],
							'item_profit' => $post['item_profit'],
							'cust_id' => $post['cust_id'],
							'company' => $post['company'],
						 );
						 
		$id =  $post['cust_id'];
		$company = $post['company'];
		
		if($post['item_name'] == 'none')
		{
			\Session::flash('alert-danger','Invalid Item. Please Choose available Item or purchase any item first.');
			//return redirect('item_index/'.$id);
			return redirect()->back();
			
		}
		
		$checkstock = DB::table('stock')->select('stock_quantity')->where('stock_name', $post['item_name'])->where('company',$company)->first();
		$stockquan = $checkstock->stock_quantity;

		$checkcurrstock = DB::table('item')->select('item_qty')->where('item_name', $post['item_name'])->where('cust_id', $id)->where('company',$company)->first();
		$currquan = $checkcurrstock->item_qty;
		
		$newstock = $stockquan - ($post['item_qty'] - $currquan);
		
		if($newstock < 0)
		{
			\Session::flash('alert-danger','Not enough stock. Please purchase more stock.');
			return redirect('item_index/'.$id);
			
		}
		else
		{
			$i = DB::table('item')->where('item_id',$post['item_id'])->where('company',$company)->update($data);
			if($i > 0)
			{
				$grand_tot_price = DB::table('item')->where('cust_id',$id)->where('company',$company)->sum('item_tot_price');
				$item_tot_paid = DB::table('customer')->where('cust_id',$id)->where('company',$company)->sum('tot_paid');
			
				$balance = $item_tot_paid - $grand_tot_price;
				DB::update("UPDATE customer SET balance = $balance where cust_id = $id and company = '$company'");
				
				DB::update("UPDATE stock SET stock_quantity = $newstock where stock_name = '$post[item_name]' and company = '$company'");
				
				\Session::flash('alert-success','Item Record has been Updated');
				return redirect('item_index/'.$id);	
			}
			else
			{
				\Session::flash('alert-warning','Item Record Unchanged');
				return redirect('item_index/'.$id);
			}
		}
		}
	}
	
	public function savepaid(Request $request)
	{
		$post = $request->all();
		
		$id =  $post['cust_id'];
		$tot_paid = $post['tot_paid'];
		$balance = $post['balance'];
		
		$i = DB::update("UPDATE customer SET tot_paid = $tot_paid, balance = $balance where cust_id = $id and company = '$company'");

		if($i > 0)
		{
			\Session::flash('alert-success','Item Record has been Updated');
			return redirect('item_index/'.$id);
		}
		else
		{
			\Session::flash('alert-warning','Item Record Unchanged');
			return redirect('item_index/'.$id);
		}
		
	}
	


}
