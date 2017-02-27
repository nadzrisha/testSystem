<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//to change password
use Validator;
use App\Http\Validators\HashValidator;

use DB;
use Carbon\Carbon;
//for making transaction or process
use Illuminate\Http\Request;
class AppServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		Validator::resolver(function($translator, $data, $rules, $messages)
		{
			return new HashValidator($translator, $data, $rules, $messages);
		});
		
		view()->composer('layout.master', function($view)
		{
			$company = \Auth::user()->company;
			
			$curryear = Carbon::now()->format('Y');

			$sales1  = DB::table('customer')->join('item', 'customer.cust_id', '=', 'item.cust_id')->select('item_tot_price')->where('customer.company',$company)->whereMonth('customer.cust_order_date', '=', '01')->sum('item.item_tot_price');
			$sales2  = DB::table('customer')->join('item', 'customer.cust_id', '=', 'item.cust_id')->select('item_tot_price')->where('customer.company',$company)->whereMonth('customer.cust_order_date', '=', '02')->sum('item.item_tot_price');
			$sales3  = DB::table('customer')->join('item', 'customer.cust_id', '=', 'item.cust_id')->select('item_tot_price')->where('customer.company',$company)->whereMonth('customer.cust_order_date', '=', '03')->sum('item.item_tot_price');
			$sales4  = DB::table('customer')->join('item', 'customer.cust_id', '=', 'item.cust_id')->select('item_tot_price')->where('customer.company',$company)->whereMonth('customer.cust_order_date', '=', '04')->sum('item.item_tot_price');
			$sales5  = DB::table('customer')->join('item', 'customer.cust_id', '=', 'item.cust_id')->select('item_tot_price')->where('customer.company',$company)->whereMonth('customer.cust_order_date', '=', '05')->sum('item.item_tot_price');
			$sales6  = DB::table('customer')->join('item', 'customer.cust_id', '=', 'item.cust_id')->select('item_tot_price')->where('customer.company',$company)->whereMonth('customer.cust_order_date', '=', '06')->sum('item.item_tot_price');
			$sales7  = DB::table('customer')->join('item', 'customer.cust_id', '=', 'item.cust_id')->select('item_tot_price')->where('customer.company',$company)->whereMonth('customer.cust_order_date', '=', '07')->sum('item.item_tot_price');
			$sales8  = DB::table('customer')->join('item', 'customer.cust_id', '=', 'item.cust_id')->select('item_tot_price')->where('customer.company',$company)->whereMonth('customer.cust_order_date', '=', '08')->sum('item.item_tot_price');
			$sales9  = DB::table('customer')->join('item', 'customer.cust_id', '=', 'item.cust_id')->select('item_tot_price')->where('customer.company',$company)->whereMonth('customer.cust_order_date', '=', '09')->sum('item.item_tot_price');
			$sales10 = DB::table('customer')->join('item', 'customer.cust_id', '=', 'item.cust_id')->select('item_tot_price')->where('customer.company',$company)->whereMonth('customer.cust_order_date', '=', '10')->sum('item.item_tot_price');
			$sales11 = DB::table('customer')->join('item', 'customer.cust_id', '=', 'item.cust_id')->select('item_tot_price')->where('customer.company',$company)->whereMonth('customer.cust_order_date', '=', '11')->sum('item.item_tot_price');
			$sales12 = DB::table('customer')->join('item', 'customer.cust_id', '=', 'item.cust_id')->select('item_tot_price')->where('customer.company',$company)->whereMonth('customer.cust_order_date', '=', '12')->sum('item.item_tot_price');
			
			$cost1  = DB::table('customer')->join('item', 'customer.cust_id', '=', 'item.cust_id')->select('item_tot_cost')->where('customer.company',$company)->whereMonth('customer.cust_order_date', '=', '01')->sum('item.item_tot_cost');
			$cost2  = DB::table('customer')->join('item', 'customer.cust_id', '=', 'item.cust_id')->select('item_tot_cost')->where('customer.company',$company)->whereMonth('customer.cust_order_date', '=', '02')->sum('item.item_tot_cost');
			$cost3  = DB::table('customer')->join('item', 'customer.cust_id', '=', 'item.cust_id')->select('item_tot_cost')->where('customer.company',$company)->whereMonth('customer.cust_order_date', '=', '03')->sum('item.item_tot_cost');
			$cost4  = DB::table('customer')->join('item', 'customer.cust_id', '=', 'item.cust_id')->select('item_tot_cost')->where('customer.company',$company)->whereMonth('customer.cust_order_date', '=', '04')->sum('item.item_tot_cost');
			$cost5  = DB::table('customer')->join('item', 'customer.cust_id', '=', 'item.cust_id')->select('item_tot_cost')->where('customer.company',$company)->whereMonth('customer.cust_order_date', '=', '05')->sum('item.item_tot_cost');
			$cost6  = DB::table('customer')->join('item', 'customer.cust_id', '=', 'item.cust_id')->select('item_tot_cost')->where('customer.company',$company)->whereMonth('customer.cust_order_date', '=', '06')->sum('item.item_tot_cost');
			$cost7  = DB::table('customer')->join('item', 'customer.cust_id', '=', 'item.cust_id')->select('item_tot_cost')->where('customer.company',$company)->whereMonth('customer.cust_order_date', '=', '07')->sum('item.item_tot_cost');
			$cost8  = DB::table('customer')->join('item', 'customer.cust_id', '=', 'item.cust_id')->select('item_tot_cost')->where('customer.company',$company)->whereMonth('customer.cust_order_date', '=', '08')->sum('item.item_tot_cost');
			$cost9  = DB::table('customer')->join('item', 'customer.cust_id', '=', 'item.cust_id')->select('item_tot_cost')->where('customer.company',$company)->whereMonth('customer.cust_order_date', '=', '09')->sum('item.item_tot_cost');
			$cost10 = DB::table('customer')->join('item', 'customer.cust_id', '=', 'item.cust_id')->select('item_tot_cost')->where('customer.company',$company)->whereMonth('customer.cust_order_date', '=', '10')->sum('item.item_tot_cost');
			$cost11 = DB::table('customer')->join('item', 'customer.cust_id', '=', 'item.cust_id')->select('item_tot_cost')->where('customer.company',$company)->whereMonth('customer.cust_order_date', '=', '11')->sum('item.item_tot_cost');
			$cost12 = DB::table('customer')->join('item', 'customer.cust_id', '=', 'item.cust_id')->select('item_tot_cost')->where('customer.company',$company)->whereMonth('customer.cust_order_date', '=', '12')->sum('item.item_tot_cost');
			
			$sales1  = $sales1/100;	$sales2  = $sales2/100;	$sales3  = $sales3/100;	$sales4  = $sales4/100;	$sales5  = $sales5/100;	$sales6  = $sales6/100;	$sales7  = $sales7/100;	$sales8  = $sales8/100;	$sales9  = $sales9/100;	$sales10 = $sales10/100; $sales11 = $sales11/100; $sales12 = $sales12/100;
			
			$cost1  = $cost1/100; $cost2  = $cost2/100;	$cost3  = $cost3/100; $cost4  = $cost4/100;	$cost5  = $cost5/100; $cost6  = $cost6/100;	$cost7  = $cost7/100; $cost8  = $cost8/100;	$cost9  = $cost9/100; $cost10 = $cost10/100; $cost11 = $cost11/100; $cost12 = $cost12/100;
			
			$purch1  = DB::table('purchase')->select('purch_tot_price')->where('purchase.company',$company)->whereMonth('purchase.purchase_date', '=', '1')->sum('purchase.purchase_tot_price');
			$purch2  = DB::table('purchase')->select('purch_tot_price')->where('purchase.company',$company)->whereMonth('purchase.purchase_date', '=', '2')->sum('purchase.purchase_tot_price');
			$purch3  = DB::table('purchase')->select('purch_tot_price')->where('purchase.company',$company)->whereMonth('purchase.purchase_date', '=', '3')->sum('purchase.purchase_tot_price');
			$purch4  = DB::table('purchase')->select('purch_tot_price')->where('purchase.company',$company)->whereMonth('purchase.purchase_date', '=', '4')->sum('purchase.purchase_tot_price');
			$purch5  = DB::table('purchase')->select('purch_tot_price')->where('purchase.company',$company)->whereMonth('purchase.purchase_date', '=', '5')->sum('purchase.purchase_tot_price');
			$purch6  = DB::table('purchase')->select('purch_tot_price')->where('purchase.company',$company)->whereMonth('purchase.purchase_date', '=', '6')->sum('purchase.purchase_tot_price');
			$purch7  = DB::table('purchase')->select('purch_tot_price')->where('purchase.company',$company)->whereMonth('purchase.purchase_date', '=', '7')->sum('purchase.purchase_tot_price');
			$purch8  = DB::table('purchase')->select('purch_tot_price')->where('purchase.company',$company)->whereMonth('purchase.purchase_date', '=', '8')->sum('purchase.purchase_tot_price');
			$purch9  = DB::table('purchase')->select('purch_tot_price')->where('purchase.company',$company)->whereMonth('purchase.purchase_date', '=', '9')->sum('purchase.purchase_tot_price');
			$purch10  = DB::table('purchase')->select('purch_tot_price')->where('purchase.company',$company)->whereMonth('purchase.purchase_date', '=', '10')->sum('purchase.purchase_tot_price');
			$purch11  = DB::table('purchase')->select('purch_tot_price')->where('purchase.company',$company)->whereMonth('purchase.purchase_date', '=', '11')->sum('purchase.purchase_tot_price');
			$purch12  = DB::table('purchase')->select('purch_tot_price')->where('purchase.company',$company)->whereMonth('purchase.purchase_date', '=', '12')->sum('purchase.purchase_tot_price');
		
			$purchQ1 = $purch1 + $purch2 + $purch3;
			$purchQ2 = $purch4 + $purch5 + $purch6;
			$purchQ3 = $purch7 + $purch8 + $purch9;
			$purchQ4 = $purch10 + $purch11 + $purch12;
		
			$view
			->with('curryear',  $curryear)
			->with('sales1',  $sales1)
			->with('sales2',  $sales2)
			->with('sales3',  $sales3)
			->with('sales4',  $sales4)
			->with('sales5',  $sales5)
			->with('sales6',  $sales6)
			->with('sales7',  $sales7)
			->with('sales8',  $sales8)
			->with('sales9',  $sales9)
			->with('sales10', $sales10)
			->with('sales11', $sales11)
			->with('sales12', $sales12)
			->with('cost1',  $cost1)
			->with('cost2',  $cost2)
			->with('cost3',  $cost3)
			->with('cost4',  $cost4)
			->with('cost5',  $cost5)
			->with('cost6',  $cost6)
			->with('cost7',  $cost7)
			->with('cost8',  $cost8)
			->with('cost9',  $cost9)
			->with('cost10', $cost10)
			->with('cost11', $cost11)
			->with('cost12', $cost12)
			->with('purchQ1', $purchQ1)
			->with('purchQ2', $purchQ2)
			->with('purchQ3', $purchQ3)
			->with('purchQ4', $purchQ4);

		});
		
		view()->composer('dashboard.dashboard_index', function($view)
		{
			$company = \Auth::user()->company;
			
			$curryear = Carbon::now()->format('Y');
			$total_cust = DB::table('customer')->where('company',$company)->count();
			
			$total_sale  = DB::table('item')->select('item_tot_price')->where('company',$company)->sum('item.item_tot_price');
			$total_cost  = DB::table('item')->select('item_tot_cost')->where('company',$company)->sum('item.item_tot_cost');
			$total_profit  = DB::table('item')->select('item_profit')->where('company',$company)->sum('item.item_profit');
			
			$highest_sale  = DB::table('item')->select('item_tot_price')->where('company',$company)->max('item.item_tot_price');
			$highest_cost  = DB::table('item')->select('item_tot_cost')->where('company',$company)->max('item.item_tot_cost');
			$highest_profit  = DB::table('item')->select('item_profit')->where('company',$company)->max('item.item_profit');
			
			$monthleft = 12 - Carbon::now()->format('m');
			
			$purchtotPrice = DB::table('purchase')->select('purchase_tot_price')->where('company',$company)->sum('purchase.purchase_tot_price');
			$purchtotQuan = DB::table('purchase_detail')->select('pur_det_quantity')->where('company',$company)->sum('purchase_detail.pur_det_quantity');
			$purchmaxPrice = DB::table('purchase')->select('purchase_tot_price')->where('company',$company)->max('purchase.purchase_tot_price');
			$purchmaxQuan = DB::table('purchase_detail')->select('pur_det_quantity')->where('company',$company)->max('purchase_detail.pur_det_quantity');
			
			//$famstate = DB::table('customer')->selectRaw('cust_state, COUNT(*) as count')->where('company',$company)->groupBy('cust_state')->orderBy('count', 'desc')->take(1)->get();
			$famstate = DB::table('customer')->selectRaw('cust_state, COUNT(*) as count')->where('company',$company)->groupBy('cust_state')->orderBy('count', 'desc')->first();
			
			if($famstate)
			{
				$nfamstate = $famstate->cust_state;
				$qfamstate = $famstate->count;
			}
			
			else
			{
				$nfamstate = 'No Data';
				$qfamstate = 0;
				
			}
			
			if($qfamstate != 0)
			{
			$qfamstate = $qfamstate/$total_cust*100;
			}
			
			//$famdetloc = DB::table('customer')->selectRaw('cust_det_loc, COUNT(*) as count')->where('company',$company)->groupBy('cust_det_loc')->orderBy('count', 'desc')->take(1)->get();
			$famdetloc = DB::table('customer')->selectRaw('cust_det_loc, COUNT(*) as count')->where('company',$company)->groupBy('cust_det_loc')->orderBy('count', 'desc')->first();
			if($famdetloc)
			{
				$nfamdetloc = $famdetloc->cust_det_loc;
				$qfamdetloc = $famdetloc->count;
			}
			
			else
			{
				$nfamdetloc = 'No Data';
				$qfamdetloc = 0;
			}
			
			if($qfamdetloc != 0)
			{
			$qfamdetloc = $qfamdetloc/$total_cust*100;
			}
			
			//$mfamitem = DB::table('item')->selectRaw('item_name, SUM(item_qty) as sum')->where('company',$company)->groupBy('item_name')->orderBy('sum', 'desc')->take(1)->get();
			$mfamitem = DB::table('item')->selectRaw('item_name, SUM(item_qty) as sum')->where('company',$company)->groupBy('item_name')->orderBy('sum', 'desc')->first();
			if($mfamitem)
			{
				$nmfamitem = $mfamitem->item_name;
				$qmfamitem = $mfamitem->sum;
			}
			
			else
			{
				$nmfamitem = 'No Data';
				$qmfamitem = 0;
			}
			
			
			//$lfamitem = DB::table('item')->selectRaw('item_name, SUM(item_qty) as sum')->where('company',$company)->groupBy('item_name')->orderBy('sum', 'asc')->take(1)->get();
			$lfamitem = DB::table('item')->selectRaw('item_name, SUM(item_qty) as sum')->where('company',$company)->groupBy('item_name')->orderBy('sum', 'asc')->first();
			if($lfamitem)
			{
				$nlfamitem = $lfamitem->item_name;
				$qlfamitem = $lfamitem->sum;
			}
			
			else
			{
				$nlfamitem = 'No Data';
				$qlfamitem = 0;
			}
			
			$latestOrder = DB::table('customer')->selectRaw('cust_name, cust_phone, cust_track_no, cust_courier, cust_status, cust_order_date')->where('company',$company)->orderBy('cust_order_date', 'desc')->take(7)->get();
			
			$view
			->with('curryear', $curryear)
			->with('total_cust', $total_cust)
			->with('total_sale', $total_sale)
			->with('total_cost', $total_cost)
			->with('total_profit', $total_profit)
			->with('highest_sale', $highest_sale)
			->with('highest_cost', $highest_cost)
			->with('highest_profit', $highest_profit)
			->with('monthleft', $monthleft)
			->with('purchtotPrice', $purchtotPrice)
			->with('purchtotQuan', $purchtotQuan)
			->with('purchmaxPrice', $purchmaxPrice)
			->with('purchmaxQuan', $purchmaxQuan)
			->with('nfamstate', $nfamstate)
			->with('qfamstate', $qfamstate)
			->with('nfamdetloc', $nfamdetloc)
			->with('qfamdetloc', $qfamdetloc)
			->with('nmfamitem', $nmfamitem)
			->with('qmfamitem', $qmfamitem)
			->with('nlfamitem', $nlfamitem)
			->with('qlfamitem', $qlfamitem)
			->with('latestOrder', $latestOrder);

		});
	}

	/**
	 * Register any application services.
	 *
	 * This service provider is a great spot to register your various container
	 * bindings with the application. As you can see, we are registering our
	 * "Registrar" implementation here. You can add your own bindings too!
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind(
			'Illuminate\Contracts\Auth\Registrar',
			'App\Services\Registrar'
		);
	}

}
