<?php

namespace App\Models;
use Request;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    public $timestamps = true;


    public static function rules()
    {
        $rules = [
            'name' => 'required|unique:users|max:255',
            'email' => 'required|unique:users|max:255',
            'password' => 'required',
        ];

        if(Request::method() === "PUT"){
            $rules['name'] = 'required|max:255';
            $rules['email'] = 'required|max:255';
        }

        return $rules;
    }
    
    public static function attributes()
    {
        return [
            'name' => '用户姓名',
            'email' => '邮箱',
            'password' => '密码',
        ];
    }
}
