<!DOCTYPE html>
<html>
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
@section('title', 'プロファイルの作成')

{{-- profile.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
      <div class="container">
        <div class="row">
          <div class="col-md-8 mx-auto">
            <h2>プロフィール</h2>
            <form action="{{ action('Admin\ProfileController@create') }}"
            method="post" enctype="multipart/form-data">

            @if (count($errors) > 0)
            <ul>
              @foreach ($errors->all() as $e)
              <li>{{ $e }}</li>
              @endforeach
            </ul>
            @endif
            <div class="form-group row">
              <label  class="col-md-2" for="name">氏名</label>
              <div class="col-md-10">
                <input type="text" name="name" class="form-control"
                value="{{ old('name') }}">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2" for="gender">性別</label>
              <div class="col-md-10">
                <input type="radio" name="gender" class="form-control"
                value="男性">男性
                <input type="radio" name="gender" class="form-control"
                value="女性">女性
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2" for="hobby">趣味</label>
              <div class="col-md-10">
                <textarea name="hobby" class="form-control" cols="" rows="10">
                  {{ old('hobby') }}
                </textarea>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-2" for="introduction">自己紹介</label>
              <div class="col-md-10">
                <textarea name="introduction" class="form-control" cols="" rows="20">
                  {{ old('introduction') }}
                </textarea>
              </div>
            </div>
            {{ csrf_field() }}
            <input type="submit" class="btn btn-primary" value="更新">
            </form>
          </div>
        </div>
      </div>
@endsection
    </body>
</html>
