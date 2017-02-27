<?php namespace App\Http\Controllers;
use Auth;
use Hash;
use Request;
use Validator;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		//return view('home');
		return view('dashboard.dashboard_index');
	}
	
	public function dashboard_index()
	{
		return view('dashboard.dashboard_index');
	}

	public function change_pass_form()
	{
		return view('dashboard.change_pass_form');
	}
	
	public function savenewpass()
	{
		$user = Auth::user();

		$validation = Validator::make(Request::all(), [

		// Here's how our new validation rule is used.
		'password' => 'hash:' . $user->password,
		'new_password' => 'required|different:password|confirmed'
		//'confirm_new_password' => 'required|different:password|confirmed'
		]);

		  
		
		  if ($validation->fails()) {
			return redirect()->back()->withErrors($validation->errors());
		  }

		  //if('new_password' != 'confirm_new_password')
		  //{
		  //	return redirect()->back()
		//		->with('error-message', 'New password and confirm new password does not match');
		 // }
		  
		  $user->password = Hash::make(Request::input('new_password'));
		  $user->save();

		 
		  \Session::flash('alert-info','Password has been updated successfully');
		  return redirect()->back();
		
	}
}
