<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// Profile2 Modelを使用宣言する
use App\Profile;
// History Modelを使用宣言する
use App\Historyprofile;
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
      $this->validate($request, Profile::$rules);

      // class Profileをインスタンス化させる
      $profile = new Profile;

      // 送信されてきたプロファイルデータを格納する
      $form = $request->all();

      // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);

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
        $posts = Profile::where('name', $cond_name)->get();
      } else {
        // それ以外全てのプロファイルを取得する
        $posts = Profile::all();
      }

      return view('admin.profile.index', ['posts'=> $posts,
      'cond_name'=> $cond_name]);
    }



    public function edit (Request $request)
    {
      // Profile Modelからデータを取得する
      $profile = Profile::find($request->id);

      return view('admin.profile.edit', ['profile_form' => $profile]);
    }



    public function update(Request $request)
    {
      // Varidationを行う
      $this->validate($request, Profile::$rules);

      // Profile Modelからデータを取得する
      $profile = Profile::find($request->id);
      
      // 送信されてきたプロファイルデータを格納する
      $profile_form = $request->all();

      // フォームから送信されてきた_tokenを削除する
      unset($profile_form['_token']);

      // データベースに保存する
      $profile->fill($profile_form);
      $profile->save();

      // 編集履歴の追加する
      $history = new Historyprofile;

      // profile2 modelからデータを取得する
      $history->profile_id = $profile->id;

      // 現在時刻の取得する
      $history->edited_at = Carbon::now();

      // データベースに保存する
      $history->save();

      return redirect('admin/profile/create');
    }



    public function delete(Request $request)
    {
     // Profile modelを取得
     $profile = Profile::find($request->id);

     // 削除する
     $profile->delete();

      return redirect('admin/profile/');
    }



}
