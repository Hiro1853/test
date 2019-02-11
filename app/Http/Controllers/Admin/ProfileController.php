<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// Profile2 Modelを使用宣言する
use App\Profile2;
// History Modelを使用宣言する
use App\History;
// 現在時刻を使用宣言する
use Carbon\Carbon;

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

    public function index(Request $request)
    {
      $cond_name = $request->cond_name;
      if ($cond_name !='') {
        // 検索結果を取得
        $posts = Profile2::where('name', $cond_name)->get();
      } else {
        // それ以外全てのプロファイルを取得する
        $posts = Profile2::all();
      }
      return view('admin.profile.index', ['$posts'=> $posts,
      'cond_name'=> $cond_name]);
    }

    public function edit (Request $request)
    {
      $profile = Profile2::find($request->id);

      return view('admin.profile.edit', ['profile_form' => $profile]);
    }

    public function update(Request $request)
    {
      // Varidationを行う
      $this->validate($request, Profile2::$rules);

      // class Profileをインスタンス化させる
      $profile = new Profile2;
      // 送信されてきたプロファイルデータを格納する
      $profile_form = $request->all();

      // データベースに保存する
      $profile->fill($profile_form);
      $profile->save();

      // 編集履歴の追加する

      // profile2 modelからデータを取得する

      // 現在時刻の取得する
      
      // データベースに保存する



      return redirect('admin/profile/create');
    }

    public function delete(Request $request)
    {
     // Profile modelを取得
     $profile = Profile2::find($request->id);
     // 削除する
     $profile->delete();
      return redirect('admin/profile/');
    }

}
