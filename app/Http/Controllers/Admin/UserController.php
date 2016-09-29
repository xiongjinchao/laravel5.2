<?php

namespace App\Http\Controllers\Admin;

use Input,Validator,Request,Redirect;
use App\Models\User;

class UserController extends BaseController
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
            'title'=>'系统用户',
            'group'=>'用户权限',
        ];
        $this->setSeo();

        $models = User::orderBy('id', 'desc')->paginate(3);
        return view('admin.user.index',['models'=>$models]);
    }

    /**
     * get create user form
     * @return mixed
     */
    public function create()
    {
        $this->seo = [
            'title'=>'创建系统用户',
            'group'=>'内容管理',
        ];
        $this->setSeo();

        $model = new User;
        return view('admin.user.create',['model'=>$model]);
    }

    /**
     * post create user save
     */
    public function store()
    {
        $validator = Validator::make(Input::all(), User::rules(), [], User::attributes());

        if ($validator->fails()) {
            return Redirect::action('Admin\UserController@create')->withErrors($validator)->withInput();
        }

        $model = new User;
        $model->title = Input::get('title');
        $model->content = Input::get('content');
        $model->audit = Input::get('audit');
        if($model->save()){
            Request::session()->flash('info', '系统用户创建成功！');
        }
        return Redirect::action('Admin\UserController@index');
    }

    /**
     * edit user
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $this->seo = [
            'title'=>'编辑系统用户',
            'group'=>'内容管理',
        ];
        $this->setSeo();

        $model = User::find($id);
        return view('admin.user.edit',['model'=>$model]);
    }

    /**
     * update user for edit
     * @param $id
     */
    public function update($id)
    {
        $validator = Validator::make(Input::all(), User::rules(), [], User::attributes());

        if ($validator->fails()) {
            return Redirect::to('/admin/user/'.$id.'/edit')
                ->withErrors($validator)
                ->withInput();
        }

        $model = User::find($id);
        $model->title = Input::get('title');
        $model->content = Input::get('content');
        $model->audit = Input::get('audit');
        if($model->save()){
            Request::session()->flash('info', '系统用户更新成功！');
        }
        return Redirect::action('Admin\UserController@index');
    }

    /**
     * show user detail
     */
    public function show($id)
    {
        $this->seo = [
            'title'=>'查看系统用户',

            'group'=>'内容管理',
        ];
        $this->setSeo();

        $model = User::find($id);
        return view('admin.user.show',['model'=>$model]);
    }

    public function destroy($id)
    {
        User::destroy($id);
        Request::session()->flash('info', '系统用户删除成功！');
        return Redirect::action('Admin\UserController@index');
    }
}
