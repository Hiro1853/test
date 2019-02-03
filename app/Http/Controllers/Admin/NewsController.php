<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// 以下を追記することでNews Modelが使えるようになる
use App\News;

class NewsController extends Controller
{
    // 以下を追記
    public function add()
    {
      return view('admin.news.create');
    }

    public function create(Request $request)
    {
      // 以下を追記
      // Varidationを行う
      $this->validate($request, News::$rules);

      // class Newsをインスタンス化させる
      $news = new News;
      // 送信されてきたフォームデータを格納する
      $form = $request->all();

      // フォームから画像が送信されてきたら保存して、$news->image_path に画像のパスを保存する
      if (isset($form['image'])) {
        $path = $request->file('image')->store('public/image');
        $news->image_path = basename($path);
      } else {
        $news->image_path = null;
      }

      // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);
      // フォームから送信されてきたimageを削除する
      unset($form['image']);

      //データベースに保存する
      $news->fill($form);
      $news->save();

      // admin/news/createにリダイレクトする
      return redirect('admin/news/create');
    }

    // 以下を追記
    public function index(Request $request)
    {
      $cond_title = $request->cond_title;
      if ($cond_title != '') {
        // 検索されたら検索結果を習得する
        $posts = News::where('title', $cond_title)->get();
      } else {
        // それ以外は全てのニュースを取得する
        $posts = News::all();
      }
      return view('admin.news.index', ['posts'=> $posts, 'cond_title'=>
      $cond_title]);
    }

    // 以下を追加
    public function edit(Request $request)
    {
      // News Modelからデータを取得する
      $news = News::find($request->id);

      return view('admin.news.edit', ['news_form' => $news]);
    }


    public function update(Request $request)
  {
      $this->validate($request, News::$rules);
      $news = News::find($request->id);
      $news_form = $request->all();
      if (isset($news_form['image'])) {
        $path = $request->file('image')->store('public/image');
        $news->image_path = basename($path);
      } else {
          $news->image_path = null;
      }
      // \Debugbar::info(isset($news_form['image']));
      unset($news_form['_token']);
      unset($news_form['image']);

      $news->fill($news_form)->save();
      return redirect('/admin/news/');
  }

  public function delete(Request $request)
  {
    // 該当するNews Modelを取得
    $news = News::find($request->id);
    // 削除する
    $news->delete();
     return redirect('admin/news/');
  }
}
