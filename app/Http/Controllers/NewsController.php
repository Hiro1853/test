<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;

// News Modelを使用宣言する
use App\News;
// Profile Modelを使用宣言する
use App\Profile;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;

        // $cond_title が空白ではない場合は、記事を検索して取得する
        if ($cond_title != ''){
            $posts = News::where('title', $cond_title).orderBy('updated_at',
            'desc')->get();
        } else {
            $posts = News::all()->sortByDesc('updated_at');
        }

        // $posts がある場合は、最新の記事を取得する
        if (count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $headline = null;
        }

        // news/index.blade.php ファイルを渡している
        // また View テンプレートに headline, posts, cond_title という変数を渡している
        return view('news.index', ['headline' => $headline, 'posts' => $posts,
        'cond_title' => $cond_title]);
    }


    public function profile(Request $request)
    {
      $cond_name = $request->cond_name;

      if ($cond_name !='') {
        // 検索結果を取得
        $posts = Profile::where('name', $cond_name).orderBy('updated_at',
        'desc')->get();
      } else {
        // それ以外全てのプロファイルを取得する
        $posts = Profile::all();
      }

      // $posts がある場合は、最新のプロファイルを取得する
      if (count($posts) > 0) {
          $headline = $posts->shift();
      } else {
          $headline = null;
      }

      // news/profile.blade.php ファイルを渡している
      // Viwe テンプレートに headline, posts, cond_name 変数を渡している
      return view('news.profile', ['headline' => $headline, 'posts' => $posts,
      'cond_name' => $cond_name]);
    }
}
