<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('adminlte/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ !empty(Auth::guard('admin')->user()->name)?Auth::guard('admin')->user()->name:'Administrator' }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> 在线</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="搜索...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">

            <li @if($action == 'Admin\HomeController@index') class="active" @endif>
                <a href="{{ action('Admin\HomeController@index') }}">
                    <i class="fa fa-coffee"></i> <span>中控面板</span>
                </a>
            </li>
            <li class="header">用户</li>
            <li class="treeview @if(in_array($controller,['Admin\EmployeeController','Admin\UserController'])) active @endif">
                <a href="#">
                    <i class="fa fa-github-alt"></i>
                    <span>用户权限</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li @if($controller == 'Admin\EmployeeController') class="active" @endif>
                        <a href="{{ action('Admin\EmployeeController@index') }}"><i class="fa fa-user-md"></i> <span>系统用户</span></a>
                    </li>
                    <li @if($controller == 'Admin\UserController') class="active" @endif>
                        <a href="{{ action('Admin\UserController@index') }}"><i class="fa fa-user"></i> <span>用户管理</span><small class="label pull-right bg-green">3</small></a>
                    </li>
                    <li><a href="pages/layout/boxed.html"><i class="fa fa-mortar-board"></i> <span>角色管理</span></a></li>
                    <li><a href="pages/layout/fixed.html"><i class="fa fa-balance-scale"></i> <span>权限管理</span></a></li>
                </ul>
            </li>
            <li class="header">内容</li>
            <li class="treeview @if(in_array($controller,['Admin\ArticleController'])) active @endif">
                <a href="#">
                    <i class="fa fa-file-text-o"></i>
                    <span>内容管理</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li @if($controller == 'Admin\ArticleController') class="active" @endif>
                        <a href="{{ action('Admin\ArticleController@index') }}"><i class="fa fa-file-text"></i> <span>文章管理</span></a>
                    </li>
                    <li>
                        <a href="pages/layout/boxed.html"><i class="fa fa-file-image-o"></i> <span>图片管理</span></a>
                    </li>
                    <li>
                        <a href="pages/layout/top-nav.html"><i class="fa fa-comments"></i> <span>评论管理</span><small class="label pull-right bg-yellow">3</small></a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-file-text-o"></i>
                    <span>玖玖机票</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('admin/ticket/search')}}"><i class="fa fa-file-text"></i> <span>机票搜索</span></a></li>
                    <li><a href="{{url('admin/ticket/price-check')}}"><i class="fa fa-file-image-o"></i> <span>价格校验</span></a></li>
                </ul>
            </li>
            <li class="header">其他</li>
            <li>
                <a href="{{ URL::to('admin/logout') }}">
                    <i class="fa fa-power-off"></i> <span>退出登录</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>