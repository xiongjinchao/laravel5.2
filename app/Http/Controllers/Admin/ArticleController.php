<?php

namespace App\Http\Controllers\Admin;

use Input,Validator,Request,Redirect,Auth;
use App\Models\Article;

class ArticleController extends BaseController
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
            'title'=>'文章管理',
            'group'=>'内容管理',
        ];
        $this->setSeo();

        $models = Article::orderBy('id', 'desc')->paginate(3);
        return view('admin.article.index',['models'=>$models]);
    }

    /**
     * get create article form
     * @return mixed
     */
    public function create()
    {
        $this->seo = [
            'title'=>'创建文章',
            'group'=>'内容管理',
        ];
        $this->setSeo();

        $model = new Article;
        return view('admin.article.create',['model'=>$model]);
    }

    /**
     * post create article save
     */
    public function store()
    {
        $validator = Validator::make(Input::all(), Article::rules(), [], Article::attributes());

        if ($validator->fails()) {
            return Redirect::action('Admin\ArticleController@create')->withErrors($validator)->withInput();
        }

        $model = new Article;
        $model->title = Input::get('title');
        $model->content = Input::get('content');
        $model->audit = Input::get('audit');
        if($model->save()){
            Request::session()->flash('info', '文章创建成功！');
        }
        return Redirect::action('Admin\ArticleController@index');
    }

    /**
     * edit article
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $this->seo = [
            'title'=>'编辑文章',
            'group'=>'内容管理',
        ];
        $this->setSeo();

        $model = Article::find($id);
        return view('admin.article.edit',['model'=>$model]);
    }

    /**
     * update article for edit
     * @param $id
     */
    public function update($id)
    {
        $validator = Validator::make(Input::all(), Article::rules(), [], Article::attributes());

        if ($validator->fails()) {
            return Redirect::to('/admin/article/'.$id.'/edit')
                ->withErrors($validator)
                ->withInput();
        }

        $model = Article::find($id);
        $model->title = Input::get('title');
        $model->content = Input::get('content');
        $model->audit = Input::get('audit');
        if($model->save()){
            Request::session()->flash('info', '文章更新成功！');
        }
        return Redirect::action('Admin\ArticleController@index');
    }

    /**
     * show article detail
     */
    public function show($id)
    {
        $this->seo = [
            'title'=>'查看文章',

            'group'=>'内容管理',
        ];
        $this->setSeo();

        $model = Article::find($id);
        return view('admin.article.show',['model'=>$model]);
    }

    public function destroy($id)
    {
        Article::destroy($id);
        Request::session()->flash('info', '文章删除成功！');
        return Redirect::action('Admin\ArticleController@index');
    }
}
