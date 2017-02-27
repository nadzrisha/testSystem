@extends('layout.master')
@section('content')

	<section class="content-header">
      <h1>
        Dashboard
      </h1>
    </section>

	<!-- Main content -->
    <section class="content">
	<!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Customer</span>
              <span class="info-box-number"><?php echo $total_cust  ?><small> people</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-usd"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Sales</span>
              <span class="info-box-number"><?php echo $total_sale ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-minus"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Cost</span>
              <span class="info-box-number"><?php echo $total_cost ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-star"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Profit</span>
              <span class="info-box-number"><?php echo $total_profit ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

	  
	  
	  
	  
	  
	  
	  
	  
	  
	  

      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Monthly Recap Report / Hundreds - (Sales vs Costs)</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
				
                <div class="btn-group">
                  <!--<button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-wrench"></i></button>-->
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </div>
                <!--<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>-->
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <p class="text-center">
                    <strong>Sales Figure: January <?php echo $curryear  ?> - December <?php echo $curryear  ?></strong>
                  </p>

                  <div class="chart">
                    <!-- Sales Chart Canvas -->
                    <canvas id="salesChart" style="height: 180px;"></canvas>
                  </div>
                  <!-- /.chart-responsive -->
                </div>
                <!-- /.col -->
				<!--
                <div class="col-md-4">
                  <p class="text-center">
                    <strong>Customer Status</strong>
                  </p>

                  <div class="progress-group">
                    <span class="progress-text">Delivered</span>
                    <span class="progress-number"><b>160</b>/100%</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-aqua" style="width: 80%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group --
                  <div class="progress-group">
                    <span class="progress-text">Pending</span>
                    <span class="progress-number"><b>310</b>/100%</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-red" style="width: 80%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group --
                  <div class="progress-group">
                    <span class="progress-text">Processing</span>
                    <span class="progress-number"><b>480</b>/100%</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-green" style="width: 80%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group --
                  <div class="progress-group">
                    <span class="progress-text">Others</span>
                    <span class="progress-number"><b>250</b>/100%</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-yellow" style="width: 80%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group --
                </div>
				-->
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-green">
					<!--<i class="fa fa-caret-up"></i> 17%-->
					</span>
                    <h5 class="description-header">$<?php echo $highest_sale  ?></h5>
                    <span class="description-text">HIGHEST SALES<br>FOR SINGLE ITEM</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-yellow">
					<!--<i class="fa fa-caret-left"></i> 0%-->
					</span>
                    <h5 class="description-header">$<?php echo $highest_cost  ?></h5>
                    <span class="description-text">HIGHEST COST<br>FOR SINGLE ITEM</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-green">
					<!--<i class="fa fa-caret-up"></i> 20%-->
					</span>
                    <h5 class="description-header">$<?php echo $highest_profit  ?></h5>
                    <span class="description-text">HIGHEST PROFIT<br>FOR SINGLE ITEM</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block">
                    <span class="description-percentage text-red">
					<!--<i class="fa fa-caret-down"></i> 18%-->
					</span>
                    <h5 class="description-header"><?php echo $monthleft  ?></h5>
                    <span class="description-text">MONTHS LEFT<br>BEFORE END YEAR</span>
                  </div>
                  <!-- /.description-block -->
                </div>
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->


	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $purchtotPrice  ?><sup style="font-size: 20px"><i class="fa fa-usd"></i></sup></h3>

              <p>Total Purchased Price</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
			<a  class="small-box-footer">Inventory <i class="fa fa-arrow-circle-right"></i> Purchase</a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $purchtotQuan  ?></h3>

              <p>Total Purchased Quantity</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
			<a  class="small-box-footer">Inventory <i class="fa fa-arrow-circle-right"></i> Purchase</a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $purchmaxPrice  ?><sup style="font-size: 20px"><i class="fa fa-usd"></i></sup></h3>

              <p>Highest Purchased Price</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-pricetag"></i>
            </div>
            <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
			<a  class="small-box-footer">Inventory <i class="fa fa-arrow-circle-right"></i> Purchase</a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $purchmaxQuan  ?></h3>

              <p>Highest Purchased Quantity</p>
            </div>
            <div class="icon">
              <i class="ion ion-arrow-graph-up-right"></i>
            </div>
            <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
			<a  class="small-box-footer">Inventory <i class="fa fa-arrow-circle-right"></i> Purchase</a>
          </div>
        </div>
        <!-- ./col -->
      </div>
	  
	  
	  
	  
	  
	   <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right">
              <li class="pull-left header"><i class="fa fa-inbox"></i> Quarterly Purchase History (Stock Purchasing)</li>
            </ul>
            <div class="tab-content no-padding">
              <!-- Morris chart - Sales -->
              <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
              <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
            </div>
          </div>
          <!-- /.nav-tabs-custom -->
		</section>
		</div>
	  
	  
	  
	  <div class="row">
	  <div class="col-md-8">
	     <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Latest Orders</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Customer Name</th>
                    <th>Phone Number</th>
                    <th>Tracking Number</th>
                    <th>Courier</th>
					<th>Status</th>
                    <th>Order Date</th>
                  </tr>
                  </thead>
                  <tbody>
					<?php
						foreach($latestOrder as $row){
					?>
						<tr>
							<td><?php echo $row->cust_name ?></td>
							<td><?php echo $row->cust_phone ?></td>
							<td><?php echo $row->cust_track_no ?></td>
							<td><?php echo $row->cust_courier ?></td>
							<td><?php echo $row->cust_status ?></td>
							<td><?php echo $row->cust_order_date ?></td>
						</tr>
					<?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="customer_index" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
		  </div>
		  
		  
		  
		 
		<div class="col-md-4">
          <!-- Info Boxes Style 2 -->
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="ion ion-ios-location-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Most Famous Customer State</span>
              <span class="info-box-number"><?php echo $nfamstate  ?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 100%""></div>
              </div>
                  <span class="progress-description">
                    <?php echo number_format((float)$qfamstate, 2, '.', '')  ?>%
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="ion ion-android-locate"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Most Famous Customer Detailed Location</span>
              <span class="info-box-number"><?php echo $nfamdetloc  ?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
                  <span class="progress-description">
                    <?php echo number_format((float)$qfamdetloc, 2, '.', '')  ?>%
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="ion ion-android-favorite-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Most Popular Item</span>
              <span class="info-box-number"><?php echo $nmfamitem  ?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
                  <span class="progress-description">
                    <?php echo $qmfamitem  ?> unit sold
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="ion ion-happy-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Least Popular Item</span>
              <span class="info-box-number"><?php echo $nlfamitem  ?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
                  <span class="progress-description">
                    <?php echo $qlfamitem  ?> unit sold
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
		</div>
	 </div>
	  
	  
	  
	  
	  
	  
</section>
@stop()