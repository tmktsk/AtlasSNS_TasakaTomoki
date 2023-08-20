@extends('layouts.login')

@section('content')
<div class="container">
    {!! Form::open(['url' => '/create', 'method' => 'POST']) !!}
    <!-- <div class="form-group"> -->
        {{ Form::input('text', 'post', null, ['required', 'class' => 'post-form', 'placeholder' => '投稿内容を入力してください。']) }}
    <!-- </div> -->
    <input type="image" src="images/post.png" class="post-img">
{!! Form::close() !!} 
<img src="{{ asset('images/' . Auth::user()->images) }}" alt="User Icon" class="postIcon">

<div class="post-content">
    @if(session('postContent'))
        <div class="posted-content">
            {{ session('postContent') }}
        </div>
    @endif
</div>

@endsection