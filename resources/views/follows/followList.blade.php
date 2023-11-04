@extends('layouts.login')

@section('content')
<p>フォローリスト</p>
<div class="head-container">
  <h1 class="list-title">Follow List</h1>
  <div class="fw-head">
    @foreach ($users as $user)
        {!! Form::open(['url' => route('user.profile', ['user' => $user->id]), 'method' => 'post', 'class' => 'fw-form']) !!}
        @if(optional(Auth::user())->check)
          <input type="image" src="{{ asset('storage/'. $user->images) }}" alt="{{ $user->username }}のアイコン" class="fw-Icon">
        @else
          <input type="image" src="{{ asset('images/' . $user->images) }}" alt="{{ $user->username }}のアイコン" class="fw-Icon">
        @endif
        {!! Form::close() !!}
    @endforeach
  </div>
</div>
    @if($user->posts->count() > 0)
      @foreach ($users as $user)
        <div class="fw-box">
          @if($user->check)
            <img  src="{{ asset('storage/'. $user->images) }}" alt="User Icon" class="fw-userIcon">
          @else
            <img  src="{{ asset('images/'. $user->images) }}" alt="User Icon" class="fw-userIcon">
          @endif
          <p class="fw-username">{{ $user->username }}</p>
          @foreach ($user->posts as $post)
            <p class="fw-timestamp">{{ $post->created_at->format('Y-m-d H:i') }}</p>
            <p class="fw-post">{{ $post->post }}</p>
          @endforeach
        </div>
      @endforeach
    @endif
@endsection
