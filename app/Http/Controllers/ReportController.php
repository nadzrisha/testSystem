<?php namespace App\Http\Controllers;
//for connection to DB
use DB;
//for making transaction or process
use Illuminate\Http\Request;
//for creating pagination
use Illuminate\Pagination\LengthAwarePaginator;
use Carbon\Carbon;
class ReportController extends Controller {

	public function report_index()
	{
		return view('report.report_index');
	}
	
	public function report_range(Request $request)
	{	
		$post = $request->all();
		$v    = \Validator::make($request->all(),
			[
				'start_date'  => 'required',
				'end_date'  => 'required',
		
			]);
		
		if($v->fails())
		{
			return redirect()->back()->withErrors($v->errors());
		}
		
		else
		{
	//Fetching data for report
		
		$start_date = $post['start_date'];
		$end_date = $post['end_date'];
		$company = $post['company'];
		$current_date = Carbon::now()->format('d-m-Y');
		
		// get customer info
		//$result = DB::table('customer')->where('company',$company)->get();

		$c1 = DB::table('customer')->where('customer.company',$company)->where('customer.cust_order_date', '>=', $start_date)->where('customer.cust_order_date', '<=', $end_date)->orderBy('customer.cust_order_date')->get();

		$c1p = DB::table('customer')->where('customer.company',$company)->where('customer.cust_order_date', '>=', $start_date)->where('customer.cust_order_date', '<=', $end_date)->sum('customer.tot_paid');
		
		$c1b = DB::table('customer')->where('customer.company',$company)->where('customer.cust_order_date', '>=', $start_date)->where('customer.cust_order_date', '<=', $end_date)->sum('customer.balance');
	
		// get purchase info
		$p1 = DB::table('purchase')->where('purchase.company',$company)->where('purchase.purchase_date', '>=', $start_date)->where('purchase.purchase_date', '<=', $end_date)->orderBy('purchase.purchase_date')->get();

		$p1p = DB::table('purchase')->where('purchase.company',$company)->where('purchase.purchase_date', '>=', $start_date)->where('purchase.purchase_date', '<=', $end_date)->sum('purchase.purchase_tot_price');

		$total_cust = DB::table('customer')->where('customer.cust_order_date', '>=', $start_date)->where('customer.cust_order_date', '<=', $end_date)->where('company',$company)->count();
		$total_purch_trans = DB::table('purchase')->where('company',$company)->where('purchase.purchase_date', '>=', $start_date)->where('purchase.purchase_date', '<=', $end_date)->count();
		$total_item_purch  = DB::table('purchase')->join('purchase_detail', 'purchase.purchase_id', '=', 'purchase_detail.purchase_id')->where('purchase_detail.company',$company)->where('purchase.purchase_date', '>=', $start_date)->where('purchase.purchase_date', '<=', $end_date)->sum('purchase_detail.pur_det_quantity');
		
		$total_sale  = DB::table('item')->join('customer', 'item.cust_id', '=', 'customer.cust_id')->where('customer.company',$company)->where('customer.cust_order_date', '>=', $start_date)->where('customer.cust_order_date', '<=', $end_date)->sum('item.item_tot_price');
		$total_cost  = DB::table('item')->join('customer', 'item.cust_id', '=', 'customer.cust_id')->where('customer.company',$company)->where('customer.cust_order_date', '>=', $start_date)->where('customer.cust_order_date', '<=', $end_date)->sum('item.item_tot_cost');
		$total_profit  = DB::table('item')->join('customer', 'item.cust_id', '=', 'customer.cust_id')->where('customer.company',$company)->where('customer.cust_order_date', '>=', $start_date)->where('customer.cust_order_date', '<=', $end_date)->sum('item.item_profit');
		
		return view('report.report_range')
		->with('start_date',$start_date)->with('end_date',$end_date)
		->with('company',$company)
		->with('current_date',$current_date)
		->with('c1',$c1)->with('c1p',$c1p)->with('c1b',$c1b)
		->with('p1',$p1)->with('p1p',$p1p)
		->with('total_cust',$total_cust)->with('total_purch_trans',$total_purch_trans)->with('total_item_purch',$total_item_purch)
		->with('total_sale',$total_sale)->with('total_cost',$total_cost)->with('total_profit',$total_profit);

		}
	}
	
	public function report_year(Request $request)
	{
		$post = $request->all();
		$v    = \Validator::make($request->all(),
			[
				'report_year'  => 'required|numeric',
		
			]);
		
		if($v->fails())
		{
			return redirect()->back()->withErrors($v->errors());
		}
		
		else
		{
	//Fetching data for report
		
		$report_year = $post['report_year'];
		$company = $post['company'];
		$current_date = Carbon::now()->format('d-m-Y');
		
		// get customer info
		//$result = DB::table('customer')->where('company',$company)->get();

		$c1 = DB::table('customer')->where('customer.company',$company)->whereMonth('customer.cust_order_date', '=', '1')->whereYear('customer.cust_order_date', '=', $report_year)->get();
		$c2 = DB::table('customer')->where('customer.company',$company)->whereMonth('customer.cust_order_date', '=', '2')->whereYear('customer.cust_order_date', '=', $report_year)->get();
		$c3 = DB::table('customer')->where('customer.company',$company)->whereMonth('customer.cust_order_date', '=', '3')->whereYear('customer.cust_order_date', '=', $report_year)->get();
		$c4 = DB::table('customer')->where('customer.company',$company)->whereMonth('customer.cust_order_date', '=', '4')->whereYear('customer.cust_order_date', '=', $report_year)->get();
		$c5 = DB::table('customer')->where('customer.company',$company)->whereMonth('customer.cust_order_date', '=', '5')->whereYear('customer.cust_order_date', '=', $report_year)->get();
		$c6 = DB::table('customer')->where('customer.company',$company)->whereMonth('customer.cust_order_date', '=', '6')->whereYear('customer.cust_order_date', '=', $report_year)->get();
		$c7 = DB::table('customer')->where('customer.company',$company)->whereMonth('customer.cust_order_date', '=', '7')->whereYear('customer.cust_order_date', '=', $report_year)->get();
		$c8 = DB::table('customer')->where('customer.company',$company)->whereMonth('customer.cust_order_date', '=', '8')->whereYear('customer.cust_order_date', '=', $report_year)->get();
		$c9 = DB::table('customer')->where('customer.company',$company)->whereMonth('customer.cust_order_date', '=', '9')->whereYear('customer.cust_order_date', '=', $report_year)->get();
		$c10 = DB::table('customer')->where('customer.company',$company)->whereMonth('customer.cust_order_date', '=', '10')->whereYear('customer.cust_order_date', '=', $report_year)->get();
		$c11 = DB::table('customer')->where('customer.company',$company)->whereMonth('customer.cust_order_date', '=', '11')->whereYear('customer.cust_order_date', '=', $report_year)->get();
		$c12 = DB::table('customer')->where('customer.company',$company)->whereMonth('customer.cust_order_date', '=', '12')->whereYear('customer.cust_order_date', '=', $report_year)->get();
		
		$c1p = DB::table('customer')->where('customer.company',$company)->whereMonth('customer.cust_order_date', '=', '1')->whereYear('customer.cust_order_date', '=', $report_year)->sum('customer.tot_paid');
		$c2p = DB::table('customer')->where('customer.company',$company)->whereMonth('customer.cust_order_date', '=', '2')->whereYear('customer.cust_order_date', '=', $report_year)->sum('customer.tot_paid');
		$c3p = DB::table('customer')->where('customer.company',$company)->whereMonth('customer.cust_order_date', '=', '3')->whereYear('customer.cust_order_date', '=', $report_year)->sum('customer.tot_paid');
		$c4p = DB::table('customer')->where('customer.company',$company)->whereMonth('customer.cust_order_date', '=', '4')->whereYear('customer.cust_order_date', '=', $report_year)->sum('customer.tot_paid');
		$c5p = DB::table('customer')->where('customer.company',$company)->whereMonth('customer.cust_order_date', '=', '5')->whereYear('customer.cust_order_date', '=', $report_year)->sum('customer.tot_paid');
		$c6p = DB::table('customer')->where('customer.company',$company)->whereMonth('customer.cust_order_date', '=', '6')->whereYear('customer.cust_order_date', '=', $report_year)->sum('customer.tot_paid');
		$c7p = DB::table('customer')->where('customer.company',$company)->whereMonth('customer.cust_order_date', '=', '7')->whereYear('customer.cust_order_date', '=', $report_year)->sum('customer.tot_paid');
		$c8p = DB::table('customer')->where('customer.company',$company)->whereMonth('customer.cust_order_date', '=', '8')->whereYear('customer.cust_order_date', '=', $report_year)->sum('customer.tot_paid');
		$c9p = DB::table('customer')->where('customer.company',$company)->whereMonth('customer.cust_order_date', '=', '9')->whereYear('customer.cust_order_date', '=', $report_year)->sum('customer.tot_paid');
		$c10p = DB::table('customer')->where('customer.company',$company)->whereMonth('customer.cust_order_date', '=', '10')->whereYear('customer.cust_order_date', '=', $report_year)->sum('customer.tot_paid');
		$c11p = DB::table('customer')->where('customer.company',$company)->whereMonth('customer.cust_order_date', '=', '11')->whereYear('customer.cust_order_date', '=', $report_year)->sum('customer.tot_paid');
		$c12p = DB::table('customer')->where('customer.company',$company)->whereMonth('customer.cust_order_date', '=', '12')->whereYear('customer.cust_order_date', '=', $report_year)->sum('customer.tot_paid');
		$ctp = DB::table('customer')->where('customer.company',$company)->whereYear('customer.cust_order_date', '=', $report_year)->sum('customer.tot_paid');
		
		$c1b = DB::table('customer')->where('customer.company',$company)->whereMonth('customer.cust_order_date', '=', '1')->whereYear('customer.cust_order_date', '=', $report_year)->sum('customer.balance');
		$c2b = DB::table('customer')->where('customer.company',$company)->whereMonth('customer.cust_order_date', '=', '2')->whereYear('customer.cust_order_date', '=', $report_year)->sum('customer.balance');
		$c3b = DB::table('customer')->where('customer.company',$company)->whereMonth('customer.cust_order_date', '=', '3')->whereYear('customer.cust_order_date', '=', $report_year)->sum('customer.balance');
		$c4b = DB::table('customer')->where('customer.company',$company)->whereMonth('customer.cust_order_date', '=', '4')->whereYear('customer.cust_order_date', '=', $report_year)->sum('customer.balance');
		$c5b = DB::table('customer')->where('customer.company',$company)->whereMonth('customer.cust_order_date', '=', '5')->whereYear('customer.cust_order_date', '=', $report_year)->sum('customer.balance');
		$c6b = DB::table('customer')->where('customer.company',$company)->whereMonth('customer.cust_order_date', '=', '6')->whereYear('customer.cust_order_date', '=', $report_year)->sum('customer.balance');
		$c7b = DB::table('customer')->where('customer.company',$company)->whereMonth('customer.cust_order_date', '=', '7')->whereYear('customer.cust_order_date', '=', $report_year)->sum('customer.balance');
		$c8b = DB::table('customer')->where('customer.company',$company)->whereMonth('customer.cust_order_date', '=', '8')->whereYear('customer.cust_order_date', '=', $report_year)->sum('customer.balance');
		$c9b = DB::table('customer')->where('customer.company',$company)->whereMonth('customer.cust_order_date', '=', '9')->whereYear('customer.cust_order_date', '=', $report_year)->sum('customer.balance');
		$c10b = DB::table('customer')->where('customer.company',$company)->whereMonth('customer.cust_order_date', '=', '10')->whereYear('customer.cust_order_date', '=', $report_year)->sum('customer.balance');
		$c11b = DB::table('customer')->where('customer.company',$company)->whereMonth('customer.cust_order_date', '=', '11')->whereYear('customer.cust_order_date', '=', $report_year)->sum('customer.balance');
		$c12b = DB::table('customer')->where('customer.company',$company)->whereMonth('customer.cust_order_date', '=', '12')->whereYear('customer.cust_order_date', '=', $report_year)->sum('customer.balance');
		$ctb = DB::table('customer')->where('customer.company',$company)->whereYear('customer.cust_order_date', '=', $report_year)->sum('customer.balance');
		
		// get purchase info
		$p1 = DB::table('purchase')->where('purchase.company',$company)->whereMonth('purchase.purchase_date', '=', '1')->whereYear('purchase.purchase_date', '=', $report_year)->get();
		$p2 = DB::table('purchase')->where('purchase.company',$company)->whereMonth('purchase.purchase_date', '=', '2')->whereYear('purchase.purchase_date', '=', $report_year)->get();
		$p3 = DB::table('purchase')->where('purchase.company',$company)->whereMonth('purchase.purchase_date', '=', '3')->whereYear('purchase.purchase_date', '=', $report_year)->get();
		$p4 = DB::table('purchase')->where('purchase.company',$company)->whereMonth('purchase.purchase_date', '=', '4')->whereYear('purchase.purchase_date', '=', $report_year)->get();
		$p5 = DB::table('purchase')->where('purchase.company',$company)->whereMonth('purchase.purchase_date', '=', '5')->whereYear('purchase.purchase_date', '=', $report_year)->get();
		$p6 = DB::table('purchase')->where('purchase.company',$company)->whereMonth('purchase.purchase_date', '=', '6')->whereYear('purchase.purchase_date', '=', $report_year)->get();
		$p7 = DB::table('purchase')->where('purchase.company',$company)->whereMonth('purchase.purchase_date', '=', '7')->whereYear('purchase.purchase_date', '=', $report_year)->get();
		$p8 = DB::table('purchase')->where('purchase.company',$company)->whereMonth('purchase.purchase_date', '=', '8')->whereYear('purchase.purchase_date', '=', $report_year)->get();
		$p9 = DB::table('purchase')->where('purchase.company',$company)->whereMonth('purchase.purchase_date', '=', '9')->whereYear('purchase.purchase_date', '=', $report_year)->get();
		$p10 = DB::table('purchase')->where('purchase.company',$company)->whereMonth('purchase.purchase_date', '=', '10')->whereYear('purchase.purchase_date', '=', $report_year)->get();
		$p11 = DB::table('purchase')->where('purchase.company',$company)->whereMonth('purchase.purchase_date', '=', '11')->whereYear('purchase.purchase_date', '=', $report_year)->get();
		$p12 = DB::table('purchase')->where('purchase.company',$company)->whereMonth('purchase.purchase_date', '=', '12')->whereYear('purchase.purchase_date', '=', $report_year)->get();
		
		$p1p = DB::table('purchase')->where('purchase.company',$company)->whereMonth('purchase.purchase_date', '=', '1')->whereYear('purchase.purchase_date', '=', $report_year)->sum('purchase.purchase_tot_price');
		$p2p = DB::table('purchase')->where('purchase.company',$company)->whereMonth('purchase.purchase_date', '=', '2')->whereYear('purchase.purchase_date', '=', $report_year)->sum('purchase.purchase_tot_price');
		$p3p = DB::table('purchase')->where('purchase.company',$company)->whereMonth('purchase.purchase_date', '=', '3')->whereYear('purchase.purchase_date', '=', $report_year)->sum('purchase.purchase_tot_price');
		$p4p = DB::table('purchase')->where('purchase.company',$company)->whereMonth('purchase.purchase_date', '=', '4')->whereYear('purchase.purchase_date', '=', $report_year)->sum('purchase.purchase_tot_price');
		$p5p = DB::table('purchase')->where('purchase.company',$company)->whereMonth('purchase.purchase_date', '=', '5')->whereYear('purchase.purchase_date', '=', $report_year)->sum('purchase.purchase_tot_price');
		$p6p = DB::table('purchase')->where('purchase.company',$company)->whereMonth('purchase.purchase_date', '=', '6')->whereYear('purchase.purchase_date', '=', $report_year)->sum('purchase.purchase_tot_price');
		$p7p = DB::table('purchase')->where('purchase.company',$company)->whereMonth('purchase.purchase_date', '=', '7')->whereYear('purchase.purchase_date', '=', $report_year)->sum('purchase.purchase_tot_price');
		$p8p = DB::table('purchase')->where('purchase.company',$company)->whereMonth('purchase.purchase_date', '=', '8')->whereYear('purchase.purchase_date', '=', $report_year)->sum('purchase.purchase_tot_price');
		$p9p = DB::table('purchase')->where('purchase.company',$company)->whereMonth('purchase.purchase_date', '=', '9')->whereYear('purchase.purchase_date', '=', $report_year)->sum('purchase.purchase_tot_price');
		$p10p = DB::table('purchase')->where('purchase.company',$company)->whereMonth('purchase.purchase_date', '=', '10')->whereYear('purchase.purchase_date', '=', $report_year)->sum('purchase.purchase_tot_price');
		$p11p = DB::table('purchase')->where('purchase.company',$company)->whereMonth('purchase.purchase_date', '=', '11')->whereYear('purchase.purchase_date', '=', $report_year)->sum('purchase.purchase_tot_price');
		$p12p = DB::table('purchase')->where('purchase.company',$company)->whereMonth('purchase.purchase_date', '=', '12')->whereYear('purchase.purchase_date', '=', $report_year)->sum('purchase.purchase_tot_price');
		$ptp = DB::table('purchase')->where('purchase.company',$company)->whereYear('purchase.purchase_date', '=', $report_year)->sum('purchase.purchase_tot_price');
		
		$total_cust = DB::table('customer')->whereYear('customer.cust_order_date', '=', $report_year)->where('company',$company)->count();
		$total_purch_trans = DB::table('purchase')->where('company',$company)->whereYear('purchase.purchase_date', '=', $report_year)->count();
		$total_item_purch  = DB::table('purchase')->join('purchase_detail', 'purchase.purchase_id', '=', 'purchase_detail.purchase_id')->where('purchase_detail.company',$company)->whereYear('purchase.purchase_date', '=', $report_year)->sum('purchase_detail.pur_det_quantity');
		
		$total_sale  = DB::table('item')->join('customer', 'item.cust_id', '=', 'customer.cust_id')->where('customer.company',$company)->whereYear('customer.cust_order_date', '=', $report_year)->sum('item.item_tot_price');
		$total_cost  = DB::table('item')->join('customer', 'item.cust_id', '=', 'customer.cust_id')->where('customer.company',$company)->whereYear('customer.cust_order_date', '=', $report_year)->sum('item.item_tot_cost');
		$total_profit  = DB::table('item')->join('customer', 'item.cust_id', '=', 'customer.cust_id')->where('customer.company',$company)->whereYear('customer.cust_order_date', '=', $report_year)->sum('item.item_profit');
		
		return view('report.report_year')
		->with('report_year',$report_year)
		->with('company',$company)
		->with('current_date',$current_date)
		->with('c1',$c1)->with('c2',$c2)->with('c3',$c3)->with('c4',$c4)->with('c5',$c5)->with('c6',$c6)->with('c7',$c7)->with('c8',$c8)->with('c9',$c9)->with('c10',$c10)->with('c11',$c11)->with('c12',$c12)
		->with('c1p',$c1p)->with('c2p',$c2p)->with('c3p',$c3p)->with('c4p',$c4p)->with('c5p',$c5p)->with('c6p',$c6p)->with('c7p',$c7p)->with('c8p',$c8p)->with('c9p',$c9p)->with('c10p',$c10p)->with('c11p',$c11p)->with('c12p',$c12p)
		->with('c1b',$c1b)->with('c2b',$c2b)->with('c3b',$c3b)->with('c4b',$c4b)->with('c5b',$c5b)->with('c6b',$c6b)->with('c7b',$c7b)->with('c8b',$c8b)->with('c9b',$c9b)->with('c10b',$c10b)->with('c11b',$c11b)->with('c12b',$c12b)
		->with('p1',$p1)->with('p2',$p2)->with('p3',$p3)->with('p4',$p4)->with('p5',$p5)->with('p6',$p6)->with('p7',$p7)->with('p8',$p8)->with('p9',$p9)->with('p10',$p10)->with('p11',$p11)->with('p12',$c12)
		->with('p1p',$p1p)->with('p2p',$p2p)->with('p3p',$p3p)->with('p4p',$p4p)->with('p5p',$p5p)->with('p6p',$p6p)->with('p7p',$p7p)->with('p8p',$p8p)->with('p9p',$p9p)->with('p10p',$p10p)->with('p11p',$p11p)->with('p12p',$p12p)
		->with('ctp',$ctp)->with('ctb',$ctb)->with('total_cust',$total_cust)->with('total_purch_trans',$total_purch_trans)->with('ptp',$ptp)->with('total_item_purch',$total_item_purch)
		->with('total_sale',$total_sale)->with('total_cost',$total_cost)->with('total_profit',$total_profit);

		}
	}

}
