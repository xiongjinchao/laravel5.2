<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Registration Page</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{ asset('/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/adminlte/css/AdminLTE.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('/plugins/iCheck/square/blue.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition register-page">
<div class="register-box">
    @if ($errors->has('email'))
        <div class="callout-box">
            <div class="callout callout-warning">
                <p><b>提醒 </b><span>{{ $errors->first('email') }}</span></p>
            </div>
        </div>
    @elseif($errors->has('password'))
        <div class="callout-box">
            <div class="callout callout-warning">
                <p><b>提醒 </b><span>{{ $errors->first('password') }}</span></p>
            </div>
        </div>
    @elseif($errors->has('password_confirmation'))
        <div class="callout-box">
            <div class="callout callout-warning">
                <p><b>提醒 </b><span>{{ $errors->first('password_confirmation') }}</span></p>
            </div>
        </div>
    @else
        <div class="callout-box" style="visibility:hidden">

        </div>
    @endif

    <div class="register-logo">
        <a href="{{ URL::to('admin') }}"><b>APP</b>LICATION</a>
    </div>

    <div class="register-box-body">
        <p class="login-box-msg">Rest your password</p>
        <form role="form" method="POST" action="{{ URL::to('admin/password/reset') }}">
            {!! csrf_field() !!}

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group has-feedback @if($errors->has('email')) has-error @endif">
                <input type="email" class="form-control" name="email" value="{{ $email or old('email') }}" placeholder="Email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback @if($errors->has('password')) has-error @endif">
                <input type="password" class="form-control" name="password" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback @if($errors->has('password_confirmation')) has-error @endif">
                <input type="password" class="form-control" name="password_confirmation" placeholder="Retype password">
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Reset Password</button>
                </div><!-- /.col -->
            </div>
        </form>

        <a href="{{ URL::to('admin/login') }}" class="text-center">I already have a membership</a>
    </div><!-- /.form-box -->
</div><!-- /.register-box -->

<!-- jQuery 2.1.4 -->
<script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<!-- Bootstrap 3.3.5 -->
<script src="{{ asset('/bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>