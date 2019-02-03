<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile2;

class ProfileController extends Controller
{
    //以下を追記
    public function add()
    {
      return view('admin.profile.create');
    }

    public function create(Request $request)
    {
      // Varidationを行う
      $this->validate($request, Profile2::$rules);

      // class Profileをインスタンス化させる
      $profile = new Profile2;
      // 送信されてきたプロファイルデータを格納する
      $form = $request->all();

      // データベースに保存する
      $profile->fill($form);
      $profile->save();

      return redirect('admin/profile/create');
    }

    public function edit (Request $request)
    {
      return view('admin.profile.edit', ['profile_form' => $profile]);
    }

    public function update(Request $request)
    {
      // Varidationを行う
      $this->validate($request, Profile2::$rules);

      // class Profileをインスタンス化させる
      $profile = new Profile2;
      // 送信されてきたプロファイルデータを格納する
      $form = $request->all();

      // データベースに保存する
      $profile->fill($form);
      $profile->save();

      return redirect('admin/profile/create');
    }

}
