<?php

namespace App\Http\Controllers\Account;


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
            'title'=>'会员中心',
        ];
        $this->setSeo();
        return view('account.home.index');
    }
}
