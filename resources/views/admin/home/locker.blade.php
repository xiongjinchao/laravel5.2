<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Lockscreen</title>
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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
    <!-- Callout info -->
    <div class="callout-box" style="visibility:hidden">
        <div class="callout callout-warning">
            <p><b>提醒 </b><span>密码错误</span></p>
        </div>
    </div>

    <div class="lockscreen-logo">
        <a href="{{ action('Admin\HomeController@index') }}"><b>APP</b>LICATION</a>
    </div>
    <!-- User name -->
    <div class="lockscreen-name" style="font-weight:600; text-align:center; ">{{ Auth::guard('admin')->user()->name }}</div>

    <!-- START LOCK SCREEN ITEM -->
    <div class="lockscreen-item">
        <!-- lockscreen image -->
        <div class="lockscreen-image">
            <img src="{{ asset('adminlte/img/user1-128x128.jpg') }}" alt="User Image">
        </div>
        <!-- /.lockscreen-image -->

        <!-- lockscreen credentials (contains the form) -->
        <div class="lockscreen-credentials">
            {!! csrf_field() !!}
            <div class="input-group">
                <input type="hidden" name="email" value="{{ old('email') }}">
                <input type="password" class="form-control" name="password" placeholder="password" id="locker-password">
                <div class="input-group-btn">
                    <button class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
                </div>
            </div>
        </div><!-- /.lockscreen credentials -->

    </div><!-- /.lockscreen-item -->
    <div class="help-block text-center">
        Enter your password to retrieve your session
    </div>
    <div class="text-center">
        <a href="{{ url('register') }}">Or sign in as a different user</a>
    </div>
    <div class="lockscreen-footer text-center">
        Copyright &copy; 2014-2015 <b><a href="http://almsaeedstudio.com" class="text-black">Almsaeed Studio</a></b><br>
        All rights reserved
    </div>
</div><!-- /.center -->

<!-- jQuery 2.1.4 -->
<script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<!-- Bootstrap 3.3.5 -->
<script src="{{ asset('/bootstrap/js/bootstrap.min.js') }}"></script>
<script>
    $('.btn').on('click',function(e){
        e.preventDefault();
        var password = $("#locker-password").val();
        var _token = $("input[name='_token']").val();
        if(password == '')
        {
            $(".callout-box span").text('请输入密码');
            $(".callout-box").css('visibility','visible');
            return false;
        }

        $.post("{{url('admin/unlock')}}", {password:password,_token:_token},function(json){
            if(json.status){
                $(".locker").empty().hide();
            }else{
                $(".callout-box span").text(json.message);
                $(".callout-box").css('visibility','visible');
                return false;
            }
        },'json');
    });

    $("#locker-password").on('focus',function(){
        $(".callout-box").css('visibility','hidden');
    });

    //屏蔽F5刷新,Alt+方向键前进后退
    $(document).on('keydown',function(e){
        e = window.event || e;
        var keycode = e.keyCode || e.which;
        if( keycode == 116 || (e.altKey && ( e.keyCode == 37 || e.keyCode == 39 ))){
            if(window.event){       // ie
                try{e.keyCode = 0;}catch(e){}
                e.returnValue = false;
            }else{                  // ff
                e.preventDefault();
            }
        }
    });

    //禁止右键弹出菜单
    $(document).on('contextmenu',function(){
        return false;
    })

</script>
</body>
</html>
