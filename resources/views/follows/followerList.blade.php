@extends('layouts.login')

@section('content')
<p>フォロワーリスト</p>
<div class="head-container">
  <h1 class="list-title">Follower List</h1>
  <div class="fw-head">
    @foreach ($users as $user)
      {!! Form::open(['url' => route('user.profile', ['user' => $user->id]), 'method' => 'post']) !!}
        @if(optional(Auth::user())->check)
          <input type="image" src="{{ asset('storage/'. $user->images) }}" alt="{{ $user->username }}のアイコン" class="fw-Icon">
        @else
          <input type="image" src="{{ asset('images/' . $user->images) }}" alt="{{ $user->username }}のアイコン" class="fw-Icon">
        @endif
      {!! Form::close() !!}
    @endforeach
  </div>
</div>
  @foreach ($users as $user)
    @if($user->posts->count() > 0)
      <div class="fw-box">
        @if(optional(Auth::user())->check)
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
    @endif
  @endforeach
@endsection
