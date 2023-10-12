@extends('layouts.login')

@section('content')
<p>ユーザープロフィール</p>
<div class="head-container">
  <img src="{{ asset('images/'. $user->images) }}" alt="User Icon" class="userIcon">
  <div class="profile">
    <p>name</p>
    <p>bio</p>
  </div>
  <div class="profile-content">
    <p class="profile-name">{{ $user->username }}</p>
    <p>{{ $user->bio }}</p>
    @if(auth()->user()->isFollowing($user))
      <form action="{{ route('unfollow', ['user' => $user->id]) }}" method="POST">
        @csrf
        <input type="submit" class="btn btn-danger pro-btn-danger" name="action" value="フォロー解除">
      </form>
    @else
      <form action="{{ route('follow', ['user' => $user->id]) }}" method="POST">
        @csrf
        <input type="submit" class="pro-follow-btn" name="action" value="フォローする">
      </form>
    @endif
  </div>
</div>
@if ($user->posts->count() > 0)
  <div class="user-profile">
    <img src="{{ asset('images/'. $user->images) }}" alt="User Icon" class="propost-Icon">
    <p class="propost-name">{{ $user->username }}</p>
    @foreach ($user->posts as $post)
      <p class="propost-post">{{ $post->post }}</p>
      <p class="propost-time">{{ $post->created_at->format('Y-m-d H:i') }}</p>
    @endforeach
  </div>
@endif
@endsection
