@extends('layout.master')
@section('content')

	<div class="flash-message">
	  @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))

      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
    @foreach (['danger'] as $msg)
		@if($errors->first('start_date'))
			<p class="alert alert-{{ $msg }}">End Date is Required<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
		@endif
		@if($errors->first('end_date'))
			<p class="alert alert-{{ $msg }}">Start Date is Required<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
		@endif
		@if($errors->first('report_year'))
			<p class="alert alert-{{ $msg }}">Year is Required<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
		@endif
    @endforeach
	</div> <!-- end .flash-message -->
<body class="hold-transition login-page">

  <div class="login-logo">
    <b>Generate</b>Report
  </div>
  <!-- /.login-logo -->
  <section class="content">
<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-4">
  <div class="login-box-body">

    <p class="login-box-msg">Generate your Report By date Range</p>

    <form role="form" method="POST" action="{{action('ReportController@report_range')}}">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="hidden" class="form-control" name="company" value="{{ Auth::user()->company }}">
		<div class="row">
                <div class="col-md-6">
					<label>Start Date</label>
						<div class="input-group date">
							<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
							</div>
							<input type="text" class="form-control pull-right" name="start_date" id="datepicker">
						</div>
				</div>
				<div class="col-md-6">
				    <label>End Date</label>
						<div class="input-group date">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
						<input type="text" class="form-control pull-right" name="end_date" id="datepicker1">
						</div>
				</div>

			  <div class="form-group">

                <div class="col-md-4">
				<br>
				
				  <button type="submit" class="btn btn-primary btn-block btn-flat">Generate</button>
				</div>

              </div>
      </div>
    </form>
  </div>
  </div>
  
  <div class="col-md-4">
  <div class="login-box-body">

    <p class="login-box-msg">Generate your Report By Year</p>

    <form role="form" method="POST" action="{{action('ReportController@report_year')}}">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="hidden" class="form-control" name="company" value="{{ Auth::user()->company }}">
	<div class="row">
      <div class="col-md-12">
	  <label>Enter Year:</label>
        <input type="number" class="form-control" name="report_year" placeholder="Enter Year">
      </div>  
	<div class="form-group">
        <div class="col-md-4">
		<br>
		
          <button type="submit" class="btn btn-primary btn-block btn-flat">Generate</button>
        </div>
		</div>
        <!-- /.col -->
      </div>
    </form>
  </div>
  </div>
  
</div>

<br><br><br>



  
</section>
  <!-- /.login-box-body -->

<!-- /.login-box -->

</body>
@endsection
