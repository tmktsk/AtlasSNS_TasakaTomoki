@extends('layouts.login')

@section('content')
<p>ユーザープロフィール</p>
<div class="head-container">
  @if(optional(Auth::user())->check)
    <img  src="{{ asset('storage/'. $user->images) }}" alt="User Icon" class="userIcon">
  @else
    <img  src="{{ asset('images/'. $user->images) }}" alt="User Icon" class="userIcon">
  @endif
  <div class="profile-content">
    <div class="profile">
      <p class="pro-item">name</p>
      <p class="pro-item">bio</p>
    </div>
    <div class="profile-sentence">
      <p class="profile-text">{{ $user->username }}</p>
      <p class="profile-text">{{ $user->bio }}</p>
    </div>
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
    @if(optional(Auth::user())->check)
      <img src="{{ asset('storage/'. $user->images) }}" alt="User Icon" class="propost-Icon">
    @else
      <img src="{{ asset('images/'. $user->images) }}" alt="User Icon" class="propost-Icon">
    @endif
    <p class="propost-name">{{ $user->username }}</p>
    @foreach ($user->posts as $post)
      <p class="propost-post">{{ $post->post }}</p>
      <p class="propost-time">{{ $post->created_at->format('Y-m-d H:i') }}</p>
    @endforeach
  </div>
@endif
@endsection
