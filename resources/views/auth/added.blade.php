@extends('layouts.logout')

@section('content')
<section class="register" style="padding-top: 5em;">
  <div class="register-form">
    <div class="clear">
      <div class="welcome">
        <p style="margin-bottom: 5%;">{{ session('username') }}さん</p>
        <p>ようこそ！AtlasSNSへ！</p>
      </div>
      <div class="complete">
        <p style="margin-bottom: 5%;">ユーザー登録が完了しました。</p>
        <p>早速ログインをしてみましょう。</p>
      </div>
      <div class="welcome-btn"><a href="/login"
      style="color: #FFFFFF;
             font-size: 0.9em;">ログイン画面へ</a></div>
    </div>
  </div>
</section>
@endsection
