@extends('layouts.profile')
@section('title', 'プロファイルの編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロファイル編集</h2>
                <form action="{{ action('Admin\ProfileController@update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="title">名前</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title"
                            value="{{ optional($profile_form)->name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="gender">性別</label>
                        <div class="col-md-10">
                          <input type="checkbox" name="gender" class="form-control"
                          value="{{ optional($profile_form)->gender}}">男性
                          <input type="checkbox" name="gender" class="form-control"
                          value="{{ optional($profile_form)->gender}}">女性
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="hobby">趣味</label>
                        <div class="col-md-10">
                          <textarea name="hobby" class="form-control" cols="" rows="10">
                            {{ optional($profile_form)->hobby }}
                          </textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-2" for="introduction">自己紹介</label>
                      <div class="col-md-10">
                        <textarea name="introduction" class="form-control" cols="" rows="20">
                          {{ optional($profile_form)->introduction }}
                        </textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id"
                            value="{{ optional($profile_form)->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
                <div class="row mt-5">
                  <div class="col-md-4 mx-auto">
                    <h2>編集履歴</h2>
                    <ul class="list-group">

                            <li class="list-group-item">

                            </li>
                          
                    </ul>
                  </div>
                </div>
            </div>
        </div>
    </div>
@endsection
