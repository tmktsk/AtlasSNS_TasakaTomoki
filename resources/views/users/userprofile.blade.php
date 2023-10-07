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
    <p></p>
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
