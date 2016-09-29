<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Log in</title>
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
<body class="hold-transition login-page">
<div class="login-box">
    @if ($errors->has('email'))
        <div class="callout-box">
            <div class="callout callout-warning">
                <p><b>提醒 </b><span>{{ $errors->first('email') }}</span></p>
            </div>
        </div>
    @elseif(session('status'))
        <div class="callout-box">
            <div class="callout callout-info">
                <p><b>提醒 </b><span>{{ session('status') }}</span></p>
            </div>
        </div>
    @else
        <div class="callout-box" style="visibility:hidden">

        </div>
    @endif

    <div class="login-logo">
        <a href="{{ action('Account\HomeController@index') }}"><b>APP</b>LICATION</a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Send a Email to find your password!</p>
        <form role="form" method="POST" action="{{ URL::to('admin/password/email') }}">
            {!! csrf_field() !!}
            <div class="form-group has-feedback @if($errors->has('email')) has-error @endif">
                <input type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Send Password Reset Link</button>
                </div><!-- /.col -->
            </div>
        </form>

        {{--<a href="{{ url('admin/password/reset') }}">I forgot my password</a><br>--}}
        {{--<a href="{{ url('admin/register') }}" class="text-center">Register a new membership</a>--}}

    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->

<!-- jQuery 2.1.4 -->
<script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<!-- Bootstrap 3.3.5 -->
<script src="{{ asset('/bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>
