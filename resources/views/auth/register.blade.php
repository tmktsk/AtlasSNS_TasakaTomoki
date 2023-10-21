@extends('layouts.logout')

@section('content')
<section class="register">
    <div class="register-form">
        <!-- 適切なURLを入力してください -->
        {!! Form::open(['url' => '/register', 'class' => 'logout-block']) !!}

        <h2 class="logout-text">新規ユーザー登録</h2>

        {{ Form::label('username', 'user name', ['class' => 'label']) }}
        {{ Form::input('text','username', null, ['class' => 'logout-form']) }}

        {{ Form::label('mail', 'mail adress', ['class' => 'label']) }}
        {{ Form::text('mail',null,['class' => 'logout-form']) }}

        {{ Form::label('password', 'password', ['class' => 'label']) }}
        {{ Form::text('password',null,['class' => 'logout-form']) }}

        {{ Form::label('password_confirm', 'password confirm', ['class' => 'label']) }}
        {{ Form::text('password_confirm',null,['class' => 'logout-form']) }}

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{ Form::submit('REGISTER', ['class' => 'first-btn']) }}

        <p class="logout-text"><a href="/login" style="color: #FFFFFF;">ログイン画面へ戻る</a></p>

        {!! Form::close() !!}
    </div>
</section>
@endsection
