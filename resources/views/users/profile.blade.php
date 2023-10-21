@extends('layouts.login')

@section('content')
<p>プロフィール</p>
<div class="myprofile">
    <img  src="{{ asset(Auth::user()->images) }}" alt="User Icon" class="myuserIcon">
  <div class="myprofile-item">
    <p>user name</p>
    <p>mail address</p>
    <p>password</p>
    <p>password confirm</p>
    <p>bio</p>
    <p>icon image</p>
  </div>
  <div class="myform">
    {!! Form::open(['url' => '/setting', 'files' => true, 'class' => 'my-form']) !!}
      @csrf
    {{ Form::text('username', Auth::user()->username, ['class' => 'myinput none', 'placeholder' => Auth::user()->username]) }}
    {{ Form::text('mail', Auth::user()->mail, ['class' => 'myinput none', 'placeholder' => Auth::user()->mail]) }}
    <input type="password" name="password" class="myinput">
    <input type="password" name="password_confirm" class="myinput">
    {{ Form::text('bio', Auth::user()->bio, ['class' => 'myinput']) }}
    {{ Form::file('images', ['class' => 'myinput']) }}

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    {{ Form::submit('更新', ['class' => 'btn btn-danger myupdate']) }}
    {!! Form::close() !!}
  </div>
</div>
@endsection
