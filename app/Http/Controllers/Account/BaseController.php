<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use View,Request;

class BaseController extends Controller
{
    public $seo = [];

    public function __construct()
    {

    }
    public function setSeo()
    {
        View::share('seo', $this->seo);
    }
}
