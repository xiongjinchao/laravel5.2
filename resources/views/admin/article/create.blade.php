@extends('layouts.adminlte.main')

@section('css')
    <link rel="stylesheet" href="{{ asset('/plugins/iCheck/all.css') }}">
@endsection

@section('content')
    <div class="box box-default">
        <form role="form" action="{{ action('Admin\ArticleController@store') }}" method="POST">
            {{ csrf_field() }}
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-plus-square"></i> 创建文章</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                    <div class="form-group @if($errors->has('title')) has-warning @endif">
                        <label>文章标题</label>
                        <input id="article-title" name="title" type="text" placeholder="Enter ..." class="form-control" value="{{ Input::old('title') }}">
                    </div>
                    <div class="form-group @if($errors->has('content')) has-warning @endif">
                        <label>文章内容</label>
                        <textarea id="article-content" name="content" placeholder="Enter ..." rows="3" class="form-control">{{ Input::old('content') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>审核状态</label>
                        <div>
                            <label>
                                <input type="radio" name="audit" class="minimal" @if(Input::old('audit') == \App\Models\Article::AUDIT_ENABLE) checked @endif value="{{ \App\Models\Article::AUDIT_ENABLE }}">
                                &nbsp;已审核&nbsp;&nbsp;&nbsp;&nbsp;
                            </label>
                            <label>
                                <input type="radio" name="audit" class="minimal" @if(Input::old('audit') == \App\Models\Article::AUDIT_DISABLED) checked @endif value="{{ \App\Models\Article::AUDIT_DISABLED }}">
                                &nbsp;未审核
                            </label>
                        </div>
                    </div>
            </div><!-- /.box-body -->
            <div class="box-footer with-border">
                <button class="btn btn-inline btn-sm btn-warning"><i class="fa fa-paper-plane"></i> 保存文章</button>
            </div>
        </form>
    </div>

@endsection

@section('script')
    <script>
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });
    </script>
@endsection
