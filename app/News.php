<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    protected $guarded = array('id');

    // 入力フォームに条件を指定する
    public static $rules = array(
      'title' => 'required',
      'body' => 'required',
    );

    // Newsモデルに関連付けを行う
    public function histories ()
    {
      return $this->hasMany('App\History');
    }

}
