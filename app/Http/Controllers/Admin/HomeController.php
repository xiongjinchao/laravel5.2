<?php

namespace App\Http\Controllers\Admin;

use Auth,Input,Request,Response;

class HomeController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->seo = [
            'title'=>'中控面板',
            'group'=>'',
        ];
        $this->setSeo();
        return view('admin.home.dashboard');
    }

    public function locker()
    {
        $this->seo = [
            'title'=>'锁屏',
            'group'=>'',
        ];
        $this->setSeo();
        return view('admin.home.locker');
    }

    public function unlock(Request $request)
    {
        if(!$request::isXmlHttpRequest()){
            abort(503);
        }
        if(!Auth::guard('admin')->check()){
            return Response::json(['status'=>false,'message'=>'解锁失败，请登录','data'=>url('admin/login')]);
        }

        if (Auth::guard('admin')->attempt(['email' => Auth::guard('admin')->user()->email, 'password' => Input::get('password')])) {
            return Response::json(['status'=>true,'message'=>'解锁成功','data'=>'']);
        }else{
            return Response::json(['status'=>false,'message'=>'解锁失败，密码错误','data'=>'']);
        }
    }
}
