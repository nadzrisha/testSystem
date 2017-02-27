<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sales System</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('assets/dist/css/skins/_all-skins.min.css')}}">

  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('assets/plugins/datatables/dataTables.bootstrap.css')}}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('assets/plugins/select2/select2.min.css')}}">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{asset('assets/plugins/datepicker/datepicker3.css')}}">
  
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
@if(\Auth::check())
	
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../../index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b>S</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Sales</b>System</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <!-- Notifications: style can be found in dropdown.less -->
          <!-- Tasks: style can be found in dropdown.less -->
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs">{{ Auth::user()->name }} </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="/auth/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>

		<li class="{{ Request::segment(1) === 'dashboard_index' ? 'active' : null }}" >
			<a href="{{url('dashboard_index')}}">
			<i class="fa fa-dashboard"></i> <span>Dashboard</span>
				<span class="pull-right-container">
            </span>
			</a>
        </li>    
		
		<li class="{{ Request::segment(1) === 'customer_index' ? 'active' : null }}">
			<a href="{{url('customer_index')}}">
			<i class="fa fa-users"></i> <span>Customers</span>
				<span class="pull-right-container">
            </span>
			</a>
        </li>
		
		<li class="{{ Request::segment(1) === 'inventory_index' ? 'active' : null }}">
			<a href="{{url('inventory_index')}}">
			<i class="fa fa-archive"></i> <span>Inventory</span>
				<span class="pull-right-container">
            </span>
			</a>
        </li>  
		
		<li class="{{ Request::segment(1) === 'loyalcustomer_index' ? 'active' : null }}">
			<a href="{{url('loyalcustomer_index')}}">
			<i class="fa fa-heart-o"></i> <span>Loyal Customer</span>
				<span class="pull-right-container">
            </span>
			</a>
        </li>  
		
		<li class="{{ Request::segment(1) === 'report_index' ? 'active' : null }}">
			<a href="{{url('report_index')}}">
			<i class="fa fa-file-pdf-o"></i> <span>Report</span>
				<span class="pull-right-container">
            </span>
			</a>
        </li>
		
        <li class="header">SETUP</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Item</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Item</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Item</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->


	
    <!-- Main content -->
    <section class="content">

	@yield('content')

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">


    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">

        <!-- /.control-sidebar-menu -->
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="{{asset('assets/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{asset('assets/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('assets/plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/dist/js/app.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('assets/dist/js/demo.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('assets/plugins/select2/select2.full.min.js')}}"></script>
<!-- bootstrap datepicker -->
<script src="{{asset('assets/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<!-- page script -->
<script>
  $(function () {
    $("#customerTable").DataTable();
	
	//Initialize Select2 Elements
    $(".select2").select2();
	
	//Date picker for date ordered
    $('#datepicker').datepicker({
      format: 'yyyy-mm-dd'
    });
	
	//Date picker for date delivered
    $('#datepicker1').datepicker({
      format: 'yyyy-mm-dd'
    });
	

	
$(document).ready(function(){
    var next = 1;
    $(".add-more").click(function(e){
        e.preventDefault();
        var addto = "#field" + next;
        var addRemove = "#field" + (next);
        next = next + 1;
        var newIn = '<input autocomplete="off" class="input form-control" id="field' + next + '" name="field' + next + '" type="text"><br>';
		var newIn1 = '<div class="col-md-12">';
		var newIn2 = '<div class="row">';
		var newIn3 = '<div class="col-xs-2">';
		var newIn4 = '<label>Item Category</label>';
		var newIn5 = '<input type="text" class="form-control" name="item_cat" placeholder="Item Category">';
		var newIn6 = '</div>';
		var newIn7 = '<div class="col-xs-2">';
		var newIn8 = '<label>Item Details 1</label>';
		var newIn9 = '<input type="text" class="form-control" name="item_det1" placeholder="Item Details 1">';
		var newIn10 = '</div>';
		var newIn11 = '<div class="col-xs-2">';
		var newIn12 = '<label>Item Details 2</label>';
		var newIn13 = '<input type="text" class="form-control" name="item_det2" placeholder="Item Details 2">';
		var newIn14 = '</div>';
		var newIn15 = '<div class="col-xs-2">';
		var newIn16 = '<label>Item Details 3</label>';
		var newIn17 = '<input type="text" class="form-control" name="item_det3" placeholder="Item Details 3">';
		var newIn18 = '</div>';
		var newIn19 = '<div class="col-xs-2">';
		var newIn20 = '<label>Item Details 4</label>';
		var newIn21 = '<input type="text" class="form-control" name="item_det4" placeholder="Item Details 4">';
		var newIn22 = '</div>';
		var newIn23 = '<div class="col-xs-2">';
		var newIn24 = '<label>Item Details 5</label>';
		var newIn25 = '<input type="text" class="form-control" name="item_det5" placeholder="Item Details 5">';
		var newIn26 = '</div>';
		var newIn27 = '</div>';
		var newIn28 = '</div>';
		var newIn29 = '<div class="col-md-6">';
		var newIn30 = '<br>';
		var newIn31 = '<label>Item Description</label>';
		var newIn32 = '<textarea name="item_desc" class="form-control" rows="8" placeholder="Item Description" style="overflow:auto;resize:none" ></textarea>';
		var newIn33 = '</div>';
		var newIn34 = '<div class="col-md-6">';
		var newIn35 = '<br>';
		var newIn36 = '<div class="row">';
		var newIn37 = '<div class="col-xs-4">';
		var newIn38 = '<label>Price</label>';
		var newIn39 = '<input type="number" class="form-control" name="item_price" placeholder="Price">';
		var newIn40 = '</div>';
		var newIn41 = '<div class="col-xs-4">';
		var newIn42 = '<label>Quantity</label>';
		var newIn43 = '<input type="number" class="form-control" name="item_qty" placeholder="Quantity">';
		var newIn44 = '</div>';
		var newIn45 = '</div>';
		var newIn46 = '<br>';
		var newIn47 = '<div class="row">';
		var newIn48 = '<div class="col-xs-4">';
		var newIn49 = '<label>Other Charges</label>';
		var newIn50 = '<input type="number" class="form-control" name="item_other_chrge" placeholder="Other Charges">';
		var newIn51 = '</div>';
		var newIn52 = '<div class="col-xs-4">';
		var newIn53 = '<label>Discount</label>';
		var newIn54 = '<input type="number" class="form-control" name="item_disc" placeholder="Discount">';
		var newIn55 = '</div>';
		var newIn56 = '<div class="col-xs-4">';
		var newIn57 = '<label>Total Price</label>';
		var newIn58 = '<input type="number" class="form-control" name="item_tot_price" placeholder="Total Price">';
		var newIn59 = '</div>';
		var newIn60 = '</div>';
		var newIn61 = '<br>';
		var newIn62 = '<div class="row">';
		var newIn63 = '<div class="col-xs-4">';
		var newIn64 = '<label>Total Cost</label>';
		var newIn65 = '<input type="number" class="form-control" name="item_tot_cost" placeholder="Total Cost">';
		var newIn66 = '</div>';
		var newIn67 = '<div class="col-xs-4">';
		var newIn68 = '<label>Profit</label>';
		var newIn69 = '<input type="number" class="form-control" name="item_profit" placeholder="Profit">';
		var newIn70 = '</div>';
		var newIn71 = '</div>';
		var newIn72 = '</div>';
	

		
        var newInput = $(newIn+newIn1+newIn2+newIn3+newIn4+newIn5+newIn6+newIn7+newIn8+newIn9+newIn10
						+newIn11+newIn12+newIn13+newIn14+newIn15+newIn16+newIn17+newIn18+newIn19+newIn20
						+newIn21+newIn22+newIn23+newIn24+newIn25+newIn26+newIn27+newIn28+newIn29+newIn30
						+newIn31+newIn32+newIn33+newIn34+newIn35+newIn36+newIn37+newIn38+newIn39+newIn40
						+newIn41+newIn42+newIn43+newIn44+newIn45+newIn46+newIn47+newIn48+newIn49+newIn50
						+newIn51+newIn52+newIn53+newIn54+newIn55+newIn56+newIn57+newIn58+newIn59+newIn60
						+newIn61+newIn62+newIn63+newIn64+newIn65+newIn66+newIn67+newIn68+newIn69+newIn70
						+newIn71+newIn72);
						
        var removeBtn = '<button id="remove' + (next - 1) + '" class="btn btn-danger remove-me" >-</button></div><div id="field">';
        var removeButton = $(removeBtn);
        $(addto).after(newInput);
        $(addRemove).after(removeButton);
        $("#field" + next).attr('data-source',$(addto).attr('data-source'));
        $("#count").val(next);  
        
            $('.remove-me').click(function(e){
                e.preventDefault();
                var fieldNum = this.id.substr(this.id.lastIndexOf("e")+1);
                var fieldID = "#field" + fieldNum;
                $(this).remove();
                $(fieldID).remove();
            });
    });
    

    
});


	
	
	
	
	

	
  });
</script>

@else
	<center>
				<div class="panel-body">
					You have logout from the system. Please <a href="/auth/login">Re-Login.</a>
				</div>
	</center>
@endif
</body>
</html>
