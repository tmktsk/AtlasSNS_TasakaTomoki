@extends('layouts.login')

@section('content')
<div class="myprofile">
  @if(optional(Auth::user())->check)
    <img src="{{ asset('storage/'. Auth::user()->images) }}" alt="User Icon" class="proIcon">
  @else
    <img src="{{ asset('images/'. Auth::user()->images) }}" alt="User Icon" class="proIcon">
  @endif
  <div class="myform">
    {!! Form::open(['url' => '/setting', 'files' => true, 'class' => 'my-form']) !!}
      @csrf
      <div class="form">
        {{ Form::label('username', 'user name') }}
        {{ Form::text('username', Auth::user()->username, ['class' => 'myinput none', 'placeholder' => Auth::user()->username]) }}
      </div>
      <div class="form">
        {{ Form::label('mail adress') }}
        {{ Form::text('mail', Auth::user()->mail, ['class' => 'myinput none', 'placeholder' => Auth::user()->mail]) }}
      </div>
      <div class="form">
        {{ Form::label('password') }}
        <input type="password" name="password" class="myinput">
      </div>
      <div class="form">
        {{ Form::label('password confirm') }}
        <input type="password" name="password_confirm" class="myinput">
      </div>
      <div class="form">
        {{ Form::label('bio') }}
        {{ Form::text('bio', Auth::user()->bio, ['class' => 'myinput']) }}
      </div>
      <div class="form">
        {{ Form::label('icon image') }}
        {{ Form::file('images', ['class' => 'myinput']) }}
      </div>
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
