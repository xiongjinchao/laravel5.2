<?php

namespace App\Http\Controllers\Front;

use App\Http\Requests;

class HomeController extends BaseController
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('front.home.index');
    }
}
