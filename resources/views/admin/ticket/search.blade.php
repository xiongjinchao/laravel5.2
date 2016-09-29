@extends('layouts.adminlte.main')

@section('css')
@endsection

@section('content')
    <h4>请求参数：</h4>
    <p><pre>{{$param}}</pre></p>

    <h4>返回结果：</h4>
    <p><pre>{{$result}}</pre></p>

@endsection

@section('script')
@endsection