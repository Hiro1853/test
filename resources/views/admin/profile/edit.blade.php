<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>profile</title>
    </head>
    <body>
      <h1></h1>
      {{-- layouts/profile.blade.phpを読み込む --}}
@extends('layouts.profile')


{{-- profile.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', 'ニュースの新規作成')

{{-- profile.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
      <div class="container">
        <div class="row">
          <div class="col-md-8 mx-auto">
            <h2>My profile</h2>
          </div>
        </div>
      </div>
@endsection
    </body>
</html>
