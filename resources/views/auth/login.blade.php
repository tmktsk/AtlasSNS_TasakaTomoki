@extends('layouts.logout')

@section('content')
<section class="register" style="padding-top: 3em;">
  <div class="register-form">
    <!-- 適切なURLを入力してください -->
    {!! Form::open(['url' => '/login', 'class' => 'logout-block']) !!}
      @csrf
      <p class="logout-text">AtlasSNSへようこそ</p>

      {{ Form::label('mail', 'mail adress', ['class' => 'label']) }}
      {{ Form::text('mail',null,['class' => 'logout-form']) }}
      {{ Form::label('password', 'password', ['class' => 'label']) }}
      {{ Form::password('password',['class' => 'logout-form']) }}

      {{ Form::submit('LOGIN', ['class' => 'first-btn']) }}

      <p class="logout-text"><a href="/register" style="color: #FFFFFF;">新規ユーザーの方はこちら</a></p>

    {!! Form::close() !!}
  </div>
</section>
@endsection
