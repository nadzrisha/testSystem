@extends('appblank')
@section('content')

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <b>Sales</b>System
  </div>
  <!-- /.login-logo -->
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
    <p class="login-box-msg">Sign in to start your session</p>

    <form role="form" method="POST" action="/auth/login">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
	  
	 <div class="form-group has-feedback">
        <input type="text" class="form-control" name="company" placeholder="Company">
        <span class="glyphicon glyphicon-briefcase form-control-feedback"></span>
      </div>
	  
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
	  
      <div class="row">

        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <!--<br><a href="#">Forgot Your Password?</a><br>-->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

</body>

@endsection
