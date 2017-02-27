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
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{asset('assets/plugins/morris/morris.css')}}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{asset('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('assets/dist/css/skins/_all-skins.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('assets/plugins/datatables/dataTables.bootstrap.css')}}">
  <!-- daterange picker -->
  <link rel="stylesheet" href="{{asset('assets/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{asset('assets/plugins/datepicker/datepicker3.css')}}">
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
    <a href="dashboard_index" class="logo">
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
			<i class="fa fa-power-off"></i>
              <span class="hidden-xs">{{ Auth::user()->name }} </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="change_pass_form" class="btn btn-default btn-flat">Change Password</a>
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

		<!--------------DASHBOARD------------------------------->
		<li class="{{ (Request::segment(1) === 'dashboard_index' ||
					   Request::segment(1) === 'home')
				   ? 'active' : null }}" >
			<a href="{{url('dashboard_index')}}">
			<i class="fa fa-dashboard"></i> <span>Dashboard</span>
				<span class="pull-right-container">
            </span>
			</a>
        </li>    
		
		<!--------------CUSTOMER------------------------------->
		<li class="{{ (Request::segment(1) === 'customer_index' || 
					   Request::segment(1) === 'customerform'   ||
					   Request::segment(1) === 'EditCustomer'   ||
					   Request::segment(1) === 'item_index'     ||
					   Request::segment(1) === 'itemform'       ||
					   Request::segment(1) === 'EditItem')
				   ? 'active' : null }}">
				<a href="{{url('customer_index')}}">
				<i class="fa fa-users"></i> <span>Customer</span>
					<span class="pull-right-container">
				</span>
				</a>
        </li>
		
		<!--------------INVENTORY------------------------------->
		<li class="treeview {{ (Request::segment(1) === 'inventory_stock'    ||
								Request::segment(1) === 'inventory_purchase' ||
								Request::segment(1) === 'purchaseform'       ||
								Request::segment(1) === 'EditPurchase'       ||
								Request::segment(1) === 'purch_det_index'    ||
								Request::segment(1) === 'purch_det_form'     ||
								Request::segment(1) === 'EditPurchItem')
					   ? 'active' : null }}">
          <a href="#">
            <i class="fa fa-archive"></i> <span>Inventory</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
				<!--STOCK-->
		    <li class="{{ (Request::segment(1) === 'inventory_stock')
					   ? 'active' : null }}" >
			<a href="{{url('inventory_stock')}}">
			<i class="fa fa-circle-o"></i> <span>Stock</span>
				<span class="pull-right-container">
            </span>
			</a>
            </li>
			
				<!--PURCHASE-->
		    <li class="{{ (Request::segment(1) === 'inventory_purchase' ||
						   Request::segment(1) === 'purchaseform'       ||
						   Request::segment(1) === 'EditPurchase'       ||
						   Request::segment(1) === 'purch_det_index'    ||
						   Request::segment(1) === 'purch_det_form'     ||
						   Request::segment(1) === 'EditPurchItem')
					   ? 'active' : null }}" >
			<a href="{{url('inventory_purchase')}}">
			<i class="fa fa-circle-o"></i> <span>Purchase</span>
				<span class="pull-right-container">
            </span>
			</a>
            </li>
			
          </ul>
        </li>
		
		
		<!--------------LOYAL CUSTOMER-------------------------------
		<li class="{{ Request::segment(1) === 'loyalcustomer_index' ? 'active' : null }}">
			<a href="{{url('loyalcustomer_index')}}">
			<i class="fa fa-heart-o"></i> <span>Loyal Customer</span>
				<span class="pull-right-container">
            </span>
			</a>
        </li>  
		-->
		
		<!--------------REPORT------------------------------->
		<li class="{{ Request::segment(1) === 'report_index' ? 'active' : null }}">
			<a href="{{url('report_index')}}">
			<i class="fa fa-file-pdf-o"></i> <span>Report</span>
				<span class="pull-right-container">
            </span>
			</a>
        </li>
		
		<!--------------SETUP------------------------------->
        <li class="header">SETUP</li>
		
		<li class="{{ Request::segment(1) === 'setup_cust_item' ? 'active' : null }}">
			<a href="{{url('setup_cust_item')}}">
			<i class="fa fa-circle-o text-red"></i> <span>Item</span>
				<span class="pull-right-container">
            </span>
			</a>
        </li>
		<!--
		<li class="{{ Request::segment(1) === 'setup_purch_item' ? 'active' : null }}">
			<a href="{{url('setup_purch_item')}}">
			<i class="fa fa-circle-o text-purple"></i> <span>Purchasing Item</span>
				<span class="pull-right-container">
            </span>
			</a>
        </li>
		-->
		<li class="{{ Request::segment(1) === 'setup_cust_stat' ? 'active' : null }}">
			<a href="{{url('setup_cust_stat')}}">
			<i class="fa fa-circle-o text-green"></i> <span>Customer Status</span>
				<span class="pull-right-container">
            </span>
			</a>
        </li>
		
		<li class="{{ Request::segment(1) === 'setup_state' ? 'active' : null }}">
			<a href="{{url('setup_state')}}">
			<i class="fa fa-circle-o text-yellow"></i> <span>State</span>
				<span class="pull-right-container">
            </span>
			</a>
        </li>
		
		<li class="{{ Request::segment(1) === 'setup_det_loc' ? 'active' : null }}">
			<a href="{{url('setup_det_loc')}}">
			<i class="fa fa-circle-o text-aqua"></i> <span>Detail Location</span>
				<span class="pull-right-container">
            </span>
			</a>
        </li>
				
		<li class="{{ Request::segment(1) === 'setup_courier' ? 'active' : null }}">
			<a href="{{url('setup_courier')}}">
			<i class="fa fa-circle-o text-orange"></i> <span>Courier</span>
				<span class="pull-right-container">
            </span>
			</a>
        </li>
		
		<?php if((\Auth::user()->company) == 'admin'){ ?>
		<li class="{{ Request::segment(1) === 'register_user' ? 'active' : null }}">
			<a href="{{url('register_user')}}">
			<i class="fa fa-circle-o text-purple"></i> <span>Register User</span>
				<span class="pull-right-container">
            </span>
			</a>
        </li>
		<?php } ?>
		
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
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{asset('assets/plugins/morris/morris.min.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('assets/plugins/knob/jquery.knob.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{asset('assets/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('assets/plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/dist/js/app.min.js')}}"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="{{asset('assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- bootstrap datepicker -->
<script src="{{asset('assets/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('assets/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{asset('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- SlimScroll 1.3.0 -->
<script src="{{asset('assets/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- ChartJS 1.0.1 -->
<script src="{{asset('assets/plugins/chartjs/Chart.min.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('assets/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) --
<script src="{{asset('assets/dist/js/pages/dashboard2.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('assets/plugins/select2/select2.full.min.js')}}"></script>
<!-- bootstrap datepicker -->
<script src="{{asset('assets/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<!-- page script -->
<script>
var startDate;
var endDate;

  $(function () {
    $("#customerTable").DataTable();
	
	//Date range as a button
    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
		  startDate = start;
          endDate = end;
        }
	
    );
	
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
	
	//Date picker for date purchased
    $('#datepicker3').datepicker({
      format: 'yyyy-mm-dd'
    });
	
  });
  
   $(function () {

  'use strict';

  /* ChartJS
   * -------
   * Here we will create a few charts using ChartJS
   */

  //-----------------------
  //- MONTHLY SALES CHART -
  //-----------------------

  // Get context with jQuery - using jQuery's .get() method.
  var salesChartCanvas = $("#salesChart").get(0).getContext("2d");
  // This will get the first returned node in the jQuery collection.
  var salesChart = new Chart(salesChartCanvas);

  var salesChartData = {
    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    datasets: [
      {
        label: "Sales",
        fillColor: "rgb(210, 214, 222)",
        strokeColor: "rgb(210, 214, 222)",
        pointColor: "rgb(210, 214, 222)",
        pointStrokeColor: "#c1c7d1",
        pointHighlightFill: "#fff",
        pointHighlightStroke: "rgb(220,220,220)",
        data: [<?php echo $sales1  ?>,
			   <?php echo $sales2  ?>,
			   <?php echo $sales3  ?>,
			   <?php echo $sales4  ?>,
			   <?php echo $sales5  ?>,
			   <?php echo $sales6  ?>,
			   <?php echo $sales7  ?>,
			   <?php echo $sales8  ?>,
			   <?php echo $sales9  ?>,
			   <?php echo $sales10 ?>,
			   <?php echo $sales11 ?>,
			   <?php echo $sales12 ?>]
      },
      {
        label: "Cost",
        fillColor: "rgba(60,141,188,0.9)",
        strokeColor: "rgba(60,141,188,0.8)",
        pointColor: "#3b8bba",
        pointStrokeColor: "rgba(60,141,188,1)",
        pointHighlightFill: "#fff",
        pointHighlightStroke: "rgba(60,141,188,1)",
        data: [<?php echo $cost1  ?>,
			   <?php echo $cost2  ?>,
			   <?php echo $cost3  ?>,
			   <?php echo $cost4  ?>,
			   <?php echo $cost5  ?>,
			   <?php echo $cost6  ?>,
			   <?php echo $cost7  ?>,
			   <?php echo $cost8  ?>,
			   <?php echo $cost9  ?>,
			   <?php echo $cost10 ?>,
			   <?php echo $cost11 ?>,
			   <?php echo $cost12 ?>]
      }
    ]
  };

  var salesChartOptions = {
    //Boolean - If we should show the scale at all
    showScale: true,
    //Boolean - Whether grid lines are shown across the chart
    scaleShowGridLines: false,
    //String - Colour of the grid lines
    scaleGridLineColor: "rgba(0,0,0,.05)",
    //Number - Width of the grid lines
    scaleGridLineWidth: 1,
    //Boolean - Whether to show horizontal lines (except X axis)
    scaleShowHorizontalLines: true,
    //Boolean - Whether to show vertical lines (except Y axis)
    scaleShowVerticalLines: true,
    //Boolean - Whether the line is curved between points
    bezierCurve: true,
    //Number - Tension of the bezier curve between points
    bezierCurveTension: 0.3,
    //Boolean - Whether to show a dot for each point
    pointDot: false,
    //Number - Radius of each point dot in pixels
    pointDotRadius: 4,
    //Number - Pixel width of point dot stroke
    pointDotStrokeWidth: 1,
    //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
    pointHitDetectionRadius: 20,
    //Boolean - Whether to show a stroke for datasets
    datasetStroke: true,
    //Number - Pixel width of dataset stroke
    datasetStrokeWidth: 2,
    //Boolean - Whether to fill the dataset with a color
    datasetFill: true,
    //String - A legend template
    legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%=datasets[i].label%></li><%}%></ul>",
    //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
    maintainAspectRatio: true,
    //Boolean - whether to make the chart responsive to window resizing
    responsive: true
  };

  //Create the line chart
  salesChart.Line(salesChartData, salesChartOptions);

  //---------------------------
  //- END MONTHLY SALES CHART -
  //---------------------------
  });
  
  
  $(function () {

  "use strict";

  /* Morris.js Charts */
  // Sales chart
  var area = new Morris.Area({
    element: 'revenue-chart',
    resize: true,
    data: [
      {y: '<?php echo $curryear ?> Q1', Cost: <?php echo $purchQ1 ?>},
      {y: '<?php echo $curryear ?> Q2', Cost: <?php echo $purchQ2 ?>},
      {y: '<?php echo $curryear ?> Q3', Cost: <?php echo $purchQ3 ?>},
      {y: '<?php echo $curryear ?> Q4', Cost: <?php echo $purchQ4 ?>}
    ],
    xkey: 'y',
    ykeys: ['Cost'],
    labels: ['Cost'],
    lineColors: ['#a0d0e0', '#3c8dbc'],
    hideHover: 'auto'
  });
  /*
  var line = new Morris.Line({
    element: 'line-chart',
    resize: true,
    data: [
      {y: '2011 Q1', item1: 2666},
      {y: '2011 Q2', item1: 2778},
      {y: '2011 Q3', item1: 4912},
      {y: '2011 Q4', item1: 3767},
      {y: '2012 Q1', item1: 6810},
      {y: '2012 Q2', item1: 5670},
      {y: '2012 Q3', item1: 4820},
      {y: '2012 Q4', item1: 15073},
      {y: '2013 Q1', item1: 10687},
      {y: '2013 Q2', item1: 8432}
    ],
    xkey: 'y',
    ykeys: ['item1'],
    labels: ['Item 1'],
    lineColors: ['#efefef'],
    lineWidth: 2,
    hideHover: 'auto',
    gridTextColor: "#fff",
    gridStrokeWidth: 0.4,
    pointSize: 4,
    pointStrokeColors: ["#efefef"],
    gridLineColor: "#efefef",
    gridTextFamily: "Open Sans",
    gridTextSize: 10
  });
*/
  //Donut Chart
  var donut = new Morris.Donut({
    element: 'sales-chart',
    resize: true,
    colors: ["#3c8dbc", "#f56954", "#00a65a"],
    data: [
      {label: "Download Sales", value: 12},
      {label: "In-Store Sales", value: 30},
      {label: "Mail-Order Sales", value: 20}
    ],
    hideHover: 'auto'
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
