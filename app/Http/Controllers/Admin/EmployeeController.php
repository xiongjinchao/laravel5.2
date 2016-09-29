<?php

namespace App\Http\Controllers\Admin;

use Input,Validator,Request,Redirect;
use App\Models\Employee;

class EmployeeController extends BaseController
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

        $models = Employee::orderBy('id', 'desc')->paginate(3);
        return view('admin.employee.index',['models'=>$models]);
    }

    /**
     * get create employee form
     * @return mixed
     */
    public function create()
    {
        $this->seo = [
            'title'=>'创建系统用户',
            'group'=>'内容管理',
        ];
        $this->setSeo();

        $model = new Employee;
        return view('admin.employee.create',['model'=>$model]);
    }

    /**
     * post create employee save
     */
    public function store()
    {
        $validator = Validator::make(Input::all(), Employee::rules(), [], Employee::attributes());

        if ($validator->fails()) {
            return Redirect::action('Admin\EmployeeController@create')->withErrors($validator)->withInput();
        }

        $model = new Employee;
        $model->title = Input::get('title');
        $model->content = Input::get('content');
        $model->audit = Input::get('audit');
        if($model->save()){
            Request::session()->flash('info', '系统用户创建成功！');
        }
        return Redirect::action('Admin\EmployeeController@index');
    }

    /**
     * edit employee
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

        $model = Employee::find($id);
        return view('admin.employee.edit',['model'=>$model]);
    }

    /**
     * update employee for edit
     * @param $id
     */
    public function update($id)
    {
        $validator = Validator::make(Input::all(), Employee::rules(), [], Employee::attributes());

        if ($validator->fails()) {
            return Redirect::to('/admin/employee/'.$id.'/edit')
                ->withErrors($validator)
                ->withInput();
        }

        $model = Employee::find($id);
        $model->title = Input::get('title');
        $model->content = Input::get('content');
        $model->audit = Input::get('audit');
        if($model->save()){
            Request::session()->flash('info', '系统用户更新成功！');
        }
        return Redirect::action('Admin\EmployeeController@index');
    }

    /**
     * show employee detail
     */
    public function show($id)
    {
        $this->seo = [
            'title'=>'查看系统用户',

            'group'=>'内容管理',
        ];
        $this->setSeo();

        $model = Employee::find($id);
        return view('admin.employee.show',['model'=>$model]);
    }

    public function destroy($id)
    {
        Employee::destroy($id);
        Request::session()->flash('info', '系统用户删除成功！');
        return Redirect::action('Admin\EmployeeController@index');
    }
}
