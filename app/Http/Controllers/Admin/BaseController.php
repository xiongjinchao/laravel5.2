<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use View,Request;

class BaseController extends Controller
{
    public $callout = [];
    public $seo = [];
    public $controller = '';
    public $action = '';

    public function __construct()
    {
        //$this->authInitialize();
        $this->setPath();
        $this->setCallout();

    }

    public function setPath()
    {
        $action = \Route::currentRouteAction();
        $action = str_replace("App\\Http\\Controllers\\","",$action);
        list($controller, $method) = explode('@', $action);
        View::share('action', $action);
        View::share('controller', $controller);
        View::share('method', $method);
    }

    public function setSeo()
    {
        View::share('seo', $this->seo);
    }

    public function setCallout()
    {
        
        if(request()->session()->has('info'))
        {
            $this->callout['title'] = '提示';
            $this->callout['class'] = 'info';
            $this->callout['message'] = Request::session()->get('info');
        }
        if(request()->session()->has('success'))
        {
            $this->callout['title'] = '提示';
            $this->callout['class'] = 'success';
            $this->callout['message'] = Request::session()->get('success');

        }
        if(request()->session()->has('warning'))
        {
            $this->callout['title'] = '警告';
            $this->callout['class'] = 'warning';
            $this->callout['message'] = Request::session()->get('warning');

        }
        if(request()->session()->has('danger'))
        {
            $this->callout['title'] = '错误';
            $this->callout['class'] = 'danger';
            $this->callout['message'] = Request::session()->get('danger');
        }

        if(!empty($this->callout)) {
            View::share('callout', $this->callout);
        }
    }

    public function authInitialize()
    {
        $routes = [];
        foreach(\Route::getRoutes() as $route)
        {
            if($route->getPrefix() == '/admin' && !strstr($route->getActionName(),'Auth')) {
                $controllers = explode('@',$route->getActionName());
                $controller = new \ReflectionClass($controllers[0]);
                $action = $controller->getMethod($controllers[1]);
                if(!isset($routes[$controller->getShortName()])){
                    $routes[$controller->getShortName()] = [];
                }
                $routes[$controller->getShortName()][] = $action->getShortName();
            }
        }
        print_r($routes);exit;

    }
}
