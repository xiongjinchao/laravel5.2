<?php

namespace App\Http\Controllers\Api;

use Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function __construct()
    {

    }

    //验证签名
    public function validateSign()
    {

        //http://dev.laravel.com/api?method=ranger.user.get&params[uid]=6218&params[type]=H5&ip=192.168.1.1&timestamp=2015-06-21 17:18:09&key=9XNNXe66zOlSassjSKD5gry9BiN61IUEi8IpJmjBwvU07RXP0J3c4GnhZR3GKhMHa1A&sign=72624458773C56CDA8C5C2896F881011&chanel=IOS&format=json&version=1.0
        $query = Input::all();
        //用key字段获取秘钥
        $secret = '27e1be4fdcaa83d7f61c489994ff6ed6';

        $query['secret'] = $secret;
        $sign = $query['sign'];
        unset($query['sign']);

        ksort($query['params']);
        ksort($query);

        $query = http_build_query($query);
        return $sign === strtoupper(md5($query));
    }

    //生成签名的方法
    public function generateSign()
    {
        $query = [
            'method' => 'ranger.user.get',  //物料级参数
            'params' => [
                'uid' => '6218',
                'type'=> 'H5',
            ],                              //物料级参数
            'ip' => '192.168.1.1',
            'timestamp' => '2015-06-21 17:18:09',
            'key' => '9XNNXe66zOlSassjSKD5gry9BiN61IUEi8IpJmjBwvU07RXP0J3c4GnhZR3GKhMHa1A',
            'secret' => '27e1be4fdcaa83d7f61c489994ff6ed6',
            'chanel' => 'IOS',
            'format' => 'json',
            'version' => '1.0',
        ];
        ksort($query['params']);
        ksort($query);

        $query = http_build_query($query);
        $sign = md5($query);
        $sign = strtoupper($sign);
        return $sign;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!$this->validateSign()){
            $result = [
                'status' => 'error',
                'code' => '10001',
                'message' => '签名失败',
                'data' => [],
            ];
        }else{
            $method = explode('.',Input::get('method'));
            $params = Input::get('params');
            $class = ucfirst($method[1]);
            $result = call_user_func($class::$method[2],$params);
        }
        return \Response::json($result);
    }
}
