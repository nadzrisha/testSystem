<?php namespace App\Http\Controllers;
//for connection to DB
use DB;
//for making transaction or process
use Illuminate\Http\Request;
//for creating pagination
use Illuminate\Pagination\LengthAwarePaginator;

class PurchDetController extends Controller {

	public function purch_det_index($purchase_id)
	{
		$company = \Auth::user()->company;
		$result = DB::table('purchase_detail')->where('purchase_id',$purchase_id)->where('company',$company)->get();
		$resultName = DB::table('purchase')->where('purchase_id',$purchase_id)->where('company',$company)->get();
		
		return view('purchase_detail.purch_det_index')
		->with('data',$result)
		->with('purchase_name',$resultName)
		->with('purchase_id',$purchase_id);

	}
	
	public function purch_det_form($purchase_id)
	{
		$company = \Auth::user()->company;
		
		$row = DB::table('purchase')->where('purchase_id',$purchase_id)->where('company',$company)->first();
		
		$itemname = DB::table('setup_cust_item')->where('company',$company)->lists('cust_item_name'); 
	  
		return view('purchase_detail.purch_det_form')->with('row',$row)->with('itemname',$itemname);
	}
	
	public function save_purch_det(Request $request)
	{
		$post = $request->all();
		$v    = \Validator::make($request->all(),
			[
				'pur_det_name'  => 'required',
				'pur_det_price'  => 'required',
				'pur_det_oth_chr'  => 'required',
				'pur_det_disc'  => 'required',
				'pur_det_quantity'  => 'required',
		
			]);
		
		if($v->fails())
		{
			return redirect()->back()->withErrors($v->errors());
		}
		
		else
		{
		$data = array(
						'pur_det_name'  => $post['pur_det_name'],
						'pur_det_desc' => $post['pur_det_desc'],
						'pur_det_price'   => $post['pur_det_price'],						
						'pur_det_oth_chr' => $post['pur_det_oth_chr'],
						'pur_det_disc'   => $post['pur_det_disc'],					
						'pur_det_quantity'  => $post['pur_det_quantity'],
						'pur_det_tot_price' => $post['pur_det_tot_price'],
						
						'purchase_id' => $post['purchase_id'],
						'company' => $post['company'],
						
					 );
		
		$id =  $post['purchase_id'];
		$company = $post['company'];
		
		if($post['pur_det_name'] == 'none')
		{
			\Session::flash('alert-danger','Invalid Item. Please Choose available Item or add item in setup first.');
			return redirect()->back();
			
		}
		
		$checksame = DB::table('purchase_detail')->select('pur_det_name')->where('pur_det_name', $post['pur_det_name'])->where('purchase_id', $post['purchase_id'])->where('company',$company)->first();
		
		if(is_null($checksame))
		{

				$itm_name = $post['pur_det_name'];
				$itm_quan = $post['pur_det_quantity'];
				
				$i = DB::table('purchase_detail')->insert($data);
				if($i > 0)
				{
					$grand_tot_price = DB::table('purchase_detail')->where('purchase_id',$id)->where('company',$company)->sum('pur_det_tot_price');
					DB::update("UPDATE purchase SET purchase_tot_price = $grand_tot_price where purchase_id = $id and company = '$company'");
					
					$checkstock = DB::table('stock')->select('stock_name','stock_quantity')->where('stock_name', $post['pur_det_name'])->where('company',$company)->first();
					
					if(is_null($checkstock))
					{
						DB::insert("INSERT INTO stock (stock_name, stock_quantity, company) VALUES ('$itm_name', '$itm_quan', '$company')"); 
					}
					
					else
					{
						$stockname = $checkstock->stock_name;
						$stockquan = DB::table('purchase_detail')->where('pur_det_name',$stockname)->where('company',$company)->sum('pur_det_quantity');
						
						DB::update("UPDATE stock SET stock_quantity = $stockquan where stock_name = '$stockname' and company = '$company'");
					}
					
					\Session::flash('alert-info','Item Record has been saved');
					return redirect('purch_det_index/'.$id);
				}
		}
		
		else
		{
			\Session::flash('alert-danger','Item Record already exist.');
			return redirect('purch_det_index/'.$id);
		}
		}
			

	}
		
	public function DeletePurchItem($pur_det_id)
	{
		$company = \Auth::user()->company;
		$id = DB::table('purchase_detail')->select('purchase_id', 'pur_det_name', 'pur_det_quantity')->where('pur_det_id', $pur_det_id)->where('company',$company)->first();
		$id_pur = $id->purchase_id;
		
		$itm_name = $id->pur_det_name;
		$det_quan = $id->pur_det_quantity;
			
		$checkstock = DB::table('stock')->select('stock_name','stock_quantity')->where('stock_name', $itm_name)->where('company',$company)->first();
		$stock_quan = $checkstock->stock_quantity;
		
		$new_quan = $stock_quan - $det_quan;
			
		if($new_quan < 0)
		{
			\Session::flash('alert-danger','Quantity in stock not enough');
			return redirect('purch_det_index/'.$id_pur);
		}
			
		else
		{
		
		$i = DB::table('purchase_detail')->where('pur_det_id',$pur_det_id)->where('company',$company)->delete();
		
		$grand_tot_price = DB::table('purchase_detail')->where('purchase_id',$id_pur)->where('company',$company)->sum('pur_det_tot_price');
		DB::update("UPDATE purchase SET purchase_tot_price = $grand_tot_price where purchase_id = $id_pur and company = '$company'");
		
		$stockquan = DB::table('purchase_detail')->where('pur_det_name',$itm_name)->where('company',$company)->sum('pur_det_quantity');
		DB::update("UPDATE stock SET stock_quantity = $stockquan where stock_name = '$itm_name' and company = '$company'");
		
		if($i > 0)
		{			
			\Session::flash('alert-danger','Purchased Item Record has been deleted');
			return redirect('purch_det_index/'.$id_pur);
			
		}
		}
	}
	
	public function EditPurchItem($pur_det_id)
	{
		$company = \Auth::user()->company;
		$row = DB::table('purchase_detail')->where('pur_det_id',$pur_det_id)->where('company',$company)->first();
		
		$itemname = DB::table('setup_cust_item')->where('company',$company)->lists('cust_item_name'); 
	  
		return view('purchase_detail.purch_det_edit')->with('row',$row)->with('itemname',$itemname);
	}
	
	public function updatePurchItem(Request $request)
	{
		
		$post = $request->all();
		$v    = \Validator::make($request->all(),
			[
				'pur_det_name'  => 'required',
				'pur_det_price'  => 'required',
				'pur_det_oth_chr'  => 'required',
				'pur_det_disc'  => 'required',
				'pur_det_quantity'  => 'required',
			]);
		
		if($v->fails())
		{
			return redirect()->back()->withErrors($v->errors());
		}
		
		else
		{
			$data = array(
							'pur_det_name'  => $post['pur_det_name'],
							'pur_det_desc' => $post['pur_det_desc'],
							'pur_det_price'   => $post['pur_det_price'],						
							'pur_det_oth_chr' => $post['pur_det_oth_chr'],
							'pur_det_disc'   => $post['pur_det_disc'],					
							'pur_det_quantity'  => $post['pur_det_quantity'],
							'pur_det_tot_price' => $post['pur_det_tot_price'],
							
							'purchase_id' => $post['purchase_id'],
							'company' => $post['company'],
						 );
						 
		$id =  $post['purchase_id'];
		$company = $post['company'];
		
		if($post['pur_det_name'] == 'none')
		{
			\Session::flash('alert-danger','Invalid Item. Please Choose available Item or add item in setup first.');
			return redirect()->back();
			
		}
		
		$itm_name = $post['pur_det_name'];
		$det_quan = $post['pur_det_quantity'];
			
		$checkstock = DB::table('item')->select('item_name','item_qty')->where('item_name', $itm_name)->where('company',$company)->first();
		$stock_quan = $checkstock->item_qty;
		
		$new_quan = $det_quan - $stock_quan;
		
		if($new_quan < 0)
		{
			\Session::flash('alert-danger','Quantity in stock not enough');
			return redirect('purch_det_index/'.$id_pur);
		}
			
		else
		{
		
		$i = DB::table('purchase_detail')->where('pur_det_id',$post['pur_det_id'])->where('company',$company)->update($data);
		if($i > 0)
		{
			$grand_tot_price = DB::table('purchase_detail')->where('purchase_id',$id)->where('company',$company)->sum('pur_det_tot_price');
			DB::update("UPDATE purchase SET purchase_tot_price = $grand_tot_price where purchase_id = $id and company = '$company'");
			
			DB::update("UPDATE stock SET stock_quantity = $new_quan where stock_name = '$itm_name' and company = '$company'");
			
			\Session::flash('alert-success','Purchase Item Record has been Updated');
			return redirect('purch_det_index/'.$id);	
		}
		else
		{
			\Session::flash('alert-warning','Purchase Item Record Unchanged');
			return redirect('purch_det_index/'.$id);
		}
		}
		}
	}

}
