<?php

namespace App\Models;
use Request;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    const AUDIT_ENABLE = 1;
    const AUDIT_DISABLED = 0;
    protected $table = 'articles';
    public $timestamps = true;


    public static function rules()
    {
        $rules = [
            'title' => 'required|unique:articles|max:255',
            'content' => 'required',
        ];

        if(Request::method() === "PUT"){
            $rules['title'] = 'required|max:255';
        }

        return $rules;
    }
    
    public static function attributes()
    {
        return [
            'title' => '文章标题',
            'content' => '文章内容',
        ];
    }
}
