@extends('layouts.adminlte.main')

@section('css')
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
        <p><a href="{{ action('Admin\UserController@create') }}" class="btn btn-sm btn-warning"><i class="fa fa-plus-circle"></i> 创建用户</a></p>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><i class="fa fa-th-list"></i> 用户管理</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-6"></div>
                            <div class="col-sm-6"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered table-hover dataTable" id="example2" role="grid" aria-describedby="example2_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="">ID</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">用户姓名</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">邮箱</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">创建时间</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">更新时间</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($models as $model)
                                    <tr role="row">
                                        <td>{{$model->id}}</td>
                                        <td>{{$model->name}}</td>
                                        <td>{{$model->email}}</td>
                                        <td>{{$model->created_at}}</td>
                                        <td>{{$model->updated_at}}</td>
                                        <td>
                                            <a href="{{ action('Admin\UserController@edit',['id'=>$model->id]) }}" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> 编辑</a>
                                            <a href="{{ action('Admin\UserController@show',['id'=>$model->id]) }}" class="btn btn-xs btn-info"><i class="fa fa-eye"></i> 查看</a>
                                            <form action="{{ action('Admin\UserController@destroy',['id'=>$model->id]) }}" method="POST" style="display: inline-block">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button class="btn btn-xs btn-warning"><i class="fa fa-trash"></i> 删除</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">
                                    当前显示{{($models->currentPage()-1)*$models->perPage()+1}} - @if($models->currentPage()*$models->perPage()>$models->total()){{$models->total()}}@else{{$models->currentPage()*$models->perPage()}}@endif条，共{{$models->total()}}条
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="pull-right">
                                {!! $models->render() !!}
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div>
@endsection

@section('script')
@endsection