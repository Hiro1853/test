<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile2 extends Model
{
    // テーブル名を指定する
    protected $table = 'profile2';
    //
    protected $guarded = array('id');

    // 入力フォームに条件を指定する
    public static $rules =array(
      'name' => 'required',
      'gender' => 'required',
      'hobby' => 'required',
      'introduction' => 'required',
    );

    // Profile2 modelに関連付けする
    
}
