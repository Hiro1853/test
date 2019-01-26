<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;

class ProfileController extends Controller
{
    //以下を追記
    public function edit()
    {
      return view('admin.profile.edit');
    }

    public function update(Request $request)
    {
      // Varidationを行う
      $this->validate($requset, Profile::$rules);

      // class Profileをインスタンス化させる
      $profile = new Profile;
      $form = $request->all();

      // データベースに保存する
      $profile = fill($form);
      $profile = save();

      return redirect('admin/profile/edit');
    }
}
