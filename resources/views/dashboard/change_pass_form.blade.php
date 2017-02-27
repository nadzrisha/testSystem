@extends('layout.master')
@section('content')

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <b>Sales</b>System
  </div>
  <!-- /.login-logo -->
  <div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))

      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
	</div>
  <div class="login-box-body">
  @if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
    <p class="login-box-msg">Change Account Password</p>

    <form role="form" method="POST" action="{{action('HomeController@savenewpass')}}">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Current Password">
        <span class="glyphicon ion-android-lock form-control-feedback"></span>
      </div>
	  
	 <div class="form-group has-feedback">
        <input type="password" class="form-control" name="new_password" placeholder="New Password">
        <span class="glyphicon ion-android-lock form-control-feedback"></span>
      </div>
	  
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="new_password_confirmation" placeholder="Confirm New Password">
        <span class="glyphicon ion-android-unlock form-control-feedback"></span>
      </div>
	  
      <div class="row">
      <?php if(\Auth::user()->company == 'demo') { ?>
        <!-- /.col -->
        <div class="col-lg-4">
          <a href='#' class="btn btn-primary btn-block btn-flat">Update</a>
        </div><br><br>
		button disabled for demo
		<!-- /.col -->
	  <?php } else { ?>
        <div class="col-lg-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Update</button>
        </div>
	  <?php }  ?>
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

</body>

@endsection
