<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index');

//Route for dashboard and change password
Route::get('dashboard_index', 'HomeController@dashboard_index');
Route::get('change_pass_form', 'HomeController@change_pass_form');
Route::post('savenewpass', 'HomeController@savenewpass');

//==================== Route for Customer ===============================

		// index
Route::get('customer_index', 'CustomersController@customer_index');

		// Create new Customer
Route::get('customerform','CustomersController@customerform');
Route::post('savecust','CustomersController@savecust');

		// Delete Customer
Route::get('DeleteCustomer/{cust_id}','CustomersController@deletecust');

		// Update Customer
Route::get('EditCustomer/{cust_id}','CustomersController@editcust');
Route::post('updatecust','CustomersController@updatecust');


//==================== Route for Item ===============================

		// Item Index
Route::get('item_index/{cust_id}','ItemController@item_index');

		// Create new Item
Route::get('itemform/{cust_id}','ItemController@itemform');
Route::post('saveitem','ItemController@saveitem');

		// Delete Item
Route::get('DeleteItem/{item_id}','ItemController@deleteitem');

		// Update Item
Route::get('EditItem/{item_id}','ItemController@edititem');
Route::post('updateitem','ItemController@updateitem');

		// Save Paid
Route::post('savepaid','ItemController@savepaid');








//==================== Route for Inventory ===============================

	//XXXXXXXXXXX Route for Stock XXXXXXXXXXXXXXX
	
		// Stock Index
Route::get('inventory_stock', 'InventoryController@inventory_stock');

		// View Stock
Route::get('stockform','InventoryController@stockform');



	//XXXXXXXXXXX Route for Purchase XXXXXXXXXXXXXXX
	
		// Purchase Index
Route::get('inventory_purchase', 'InventoryController@inventory_purchase');

		// Create new Purchase
Route::get('purchaseform','InventoryController@purchaseform');
Route::post('savepurchase','InventoryController@savepurchase');

		// Delete Purchase
Route::get('DeletePurchase/{purchase_id}','InventoryController@DeletePurchase');

		// Update Purchase
Route::get('EditPurchase/{purchase_id}','InventoryController@EditPurchase');
Route::post('updatePurchase','InventoryController@updatePurchase');








//==================== Route for Purchase Detail ===============================

		// Purchase Detail Index
Route::get('purch_det_index/{purchase_id}','PurchDetController@purch_det_index');

		// Create new Purchase Detail 
Route::get('purch_det_form/{purchase_id}','PurchDetController@purch_det_form');
Route::post('save_purch_det','PurchDetController@save_purch_det');

		// Delete Purchase Detail 
Route::get('DeletePurchItem/{pur_det_id}','PurchDetController@DeletePurchItem');

		// Update Purchase Detail 
Route::get('EditPurchItem/{pur_det_id}','PurchDetController@EditPurchItem');
Route::post('updatePurchItem','PurchDetController@updatePurchItem');







//==================== Route for Loyal Customer ===============================

		//Loyal Customer Index
//Route::get('loyalcustomer_index', 'LoyalCustomerController@loyalcustomer_index');







//======================== Route for Report ===================================

		//Report Index
Route::get('report_index', 'ReportController@report_index');
Route::post('report_range','ReportController@report_range');
Route::post('report_year','ReportController@report_year');










//======================== Route for Setup ===================================

	//XXXXXXXXXXX Route for Customer Item XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
	
		// Customer Item Index
Route::get('setup_cust_item', 'SetupController@setup_cust_item');

		// Create new Customer Item
Route::get('cust_item_form','SetupController@cust_item_form');
Route::post('save_cust_item','SetupController@save_cust_item');

		// Delete Customer Item
Route::get('DeleteCustomerItem/{cust_item_id}','SetupController@DeleteCustomerItem');

		// Update Customer Item
Route::get('EditCustomerItem/{cust_item_id}','SetupController@EditCustomerItem');
Route::post('update_cust_item','SetupController@update_cust_item');





/*
	//XXXXXXXXXXX Route for Purchasing Item XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
	
		// Purchasing Item Index
Route::get('setup_purch_item', 'SetupController@setup_purch_item');

		// Create new Purchasing Item
Route::get('purch_item_form','SetupController@purch_item_form');
Route::post('save_purch_item','SetupController@save_purch_item');

		// Delete Purchasing Item
Route::get('DeleteSetupPurchasingItem/{purch_item_id}','SetupController@DeleteSetupPurchasingItem');

		// Update Purchasing Item
Route::get('EditSetupPurchasingItem/{purch_item_id}','SetupController@EditSetupPurchasingItem');
Route::post('update_purch_item','SetupController@update_purch_item');

*/









	//XXXXXXXXXXX Route for State XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
	
		// State Index
Route::get('setup_state', 'SetupController@setup_state');

		// Create new State
Route::get('state_form','SetupController@state_form');
Route::post('save_state','SetupController@save_state');

		// Delete State
Route::get('DeleteState/{state_id}','SetupController@DeleteState');

		// Update State
Route::get('EditState/{state_id}','SetupController@EditState');
Route::post('update_state','SetupController@update_state');






	//XXXXXXXXXXX Route for Detail Location XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
	
		// Detail Location Index
Route::get('setup_det_loc', 'SetupController@setup_det_loc');

		// Create new Detail Location
Route::get('det_loc_form','SetupController@det_loc_form');
Route::post('save_det_loc','SetupController@save_det_loc');

		// Delete Detail Location
Route::get('DeleteDetLoc/{det_loc_id}','SetupController@DeleteDetLoc');

		// Update Detail Location
Route::get('EditDetLoc/{det_loc_id}','SetupController@EditDetLoc');
Route::post('update_det_loc','SetupController@update_det_loc');




	//XXXXXXXXXXX Route for Customer Status XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
	
		// Customer Status Index
Route::get('setup_cust_stat', 'SetupController@setup_cust_stat');

		// Create new Customer Status
Route::get('cust_stat_form','SetupController@cust_stat_form');
Route::post('save_cust_stat','SetupController@save_cust_stat');

		// Delete Customer Status
Route::get('DeleteCustStat/{cust_stat_id}','SetupController@DeleteCustStat');

		// Update Customer Status
Route::get('EditCustStat/{cust_stat_id}','SetupController@EditCustStat');
Route::post('update_cust_stat','SetupController@update_cust_stat');




	//XXXXXXXXXXX Route for Courier XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
	
		// Courier Index
Route::get('setup_courier', 'SetupController@setup_courier');

		// Create new Courier
Route::get('courier_form','SetupController@courier_form');
Route::post('save_courier','SetupController@save_courier');

		// Delete Courier
Route::get('DeleteCourier/{courier_id}','SetupController@DeleteCourier');

		// Update Courier
Route::get('EditCourier/{courier_id}','SetupController@EditCourier');
Route::post('update_courier','SetupController@update_courier');










	//XXXXXXXXXXX Route for Register User XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX

		// User Index
Route::get('register_user', 'SetupController@register_user');

		// Create new User
Route::get('users_list_form','SetupController@users_list_form');
Route::post('save_users','SetupController@save_users');

		// Delete User
Route::get('DeleteUsers/{id}','SetupController@DeleteUsers');

		// Update User
Route::get('EditUsers/{id}','SetupController@EditUsers');
Route::post('update_users','SetupController@update_users');









//
//Route for products
/*
Route::get('productindex','ProductController@index');

Route::get('productform','ProductController@form');

Route::post('save','ProductController@save');

Route::post('update','ProductController@update');

Route::get('DeleteProduct/{id}','ProductController@delete');

Route::get('EditProduct/{id}','ProductController@edit');
*/
//
//Route for controller
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
