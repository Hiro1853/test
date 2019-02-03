<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
　   // テーブル名を指定する
　　 protected $table = 'news';

    protected $guarded = array('id');

    // 入力フォームに条件を指定する
    public static $rules = array(
      'title' => 'required',
      'body' => 'required',
    );

}
