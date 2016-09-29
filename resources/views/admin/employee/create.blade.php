@extends('layouts.adminlte.main')

@section('css')
@endsection

@section('content')
    <div class="box box-default">
        <form role="form" action="{{ action('Admin\EmployeeController@store') }}" method="POST">
            {{ csrf_field() }}
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-plus-square"></i> 创建系统用户</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="form-group @if($errors->has('name')) has-warning @endif">
                    <label>用户姓名</label>
                    <input id="employee-name" name="name" type="text" placeholder="Enter ..." class="form-control" value="{{ Input::old('name') }}">
                </div>
                <div class="form-group @if($errors->has('email')) has-warning @endif">
                    <label>邮箱</label>
                    <input id="employee-email" name="email" type="text" placeholder="Enter ..." class="form-control" value="{{ Input::old('email') }}">
                </div>
                <div class="form-group @if($errors->has('password')) has-warning @endif">
                    <label>密码</label>
                    <input id="employee-password" name="password" type="password" placeholder="Enter ..." class="form-control" value="">
                </div>
            </div><!-- /.box-body -->
            <div class="box-footer with-border">
                <button class="btn btn-inline btn-sm btn-warning"><i class="fa fa-paper-plane"></i> 保存用户</button>
            </div>
        </form>
    </div>

@endsection

@section('script')
@endsection
